<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Validator;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteAction;

use App\Model\Client;
use App\Model\Staff;
use App\Model\ClientSchedule;
use App\Model\Service;
use App\Model\Inbox;
use App\Model\Conversation;
use App\Model\ClientShareDocument;
use App\Model\LiveSiteToken;
use App\Model\Country;

use App\Mail\ClientSendFileEmail;
use App\Mail\ClientSendFileToBusinessAdmin;
use App\Mail\BookingLimitExceedToBusinessAdminEmail;
use App\Mail\TopAdminSendFile;


use Mail;

use App\Helpers\PackageSubscriptionCheck;
use Carbon\Carbon;
use DB;

use App\Events\AllEvent;

use App\Helpers\SpamFilter;
use App\Model\FilterWord;


class SendFileController extends Controller
{
    
    public function send_file($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }

        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
        
        //$country = Country::all();
        $country = Country::orderBy('country_name')->get();
        
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
    
        return view('sharedocument.share-document', compact('client_live_info', 'allbusinessinfo', 'uid', 'country'));
        
    }
    
    public function addShareDocumentFile(Request $request){
        
        //return response()->json($request->all());
        
        $business_info          = Business::where('uid', $request->business_uid)->first();
        $business_all_clients   = Client::where('business_id', $business_info->id)->get()->count();
        $business_all_share_document  = ClientShareDocument::where('business_id', $business_info->id)->get()->count();
        
        $total_inbox_this_month = DB::table('inboxes')
                ->whereMonth('created_at', Carbon::now()->month)
                ->where('business_id', $business_info->id)
                ->count();
        //return response()->json($total_inbox_this_month);
        
        $business_all_inbox = Inbox::where('business_id', $business_info->id)->get()->count();
        
        $package_check = new PackageSubscriptionCheck;
        
        $result_data = $package_check->packageData($business_info->uid);
        $package_rule = $result_data->package_rules;
        
        
        $data = json_decode($package_rule);
        $clients = $data->clients;
        $inbox = $data->inbox;
        
         /*
            Subscription check
        */
        $should_b_id = 1;
        $is_subscription_ok = false;
   
        $from   = strtotime($business_info->package_start_date);
        $from = date('Y-m-d H:i:s', $from);
        
        $to     = strtotime($business_info->package_end_date);
        $to = date('Y-m-d H:i:s', $to);
        
        $inbox_count = Inbox::whereBetween('created_at', [$from, $to])->where('business_id', $business_info->id)->count();
        
        $scope = '';
        
        if(($clients == '-1') || ($inbox == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {
             $scope = 'Others';             
            if(($inbox > $inbox_count) && ($business_all_clients < $clients)) {
                $is_subscription_ok = true;
            } else {
                $is_subscription_ok = false;
            }
            

                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = 0;
            if($business_info->id == 1) {
                $should_b_id = 0;  
            }
        } else {
            $should_b_id = 1;  
        }

                
        /*
            Subscription check end
        */

        //new subscription rule start

        $package_end   = strtotime($business_info->package_end_date);
        $today = strtotime(date('Y-m-d H:i:s'));

        if($today > $package_end){
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }else{
            $should_b_id = 0;  
            $is_subscription_ok = true;
        }

        if($is_subscription_ok) {
            if($inbox == '-1'){
                $scope = 'Unlimited';
                $is_subscription_ok = true;
            }else{
                $scope = 'Others';
             
                if($inbox > $inbox_count) {
                    $schopeShcedule = $inbox;
                    $is_subscription_ok = true;
                } else {
                   $schopeShcedule = $inbox_count;
                    $is_subscription_ok = false;
                }
            }
        } else {
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }

        //new subscription rule end
        
        //$business_info = Business::where('uid', $request->business_uid)->first();
        //$staff = Staff::where('business_id', $business_info->business_id)->first();
        $client = Client::where('email', $request->c_email)->where('business_id', $business_info->id)->first();
        
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);
        //return response()->json($client);
        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            //$client->business_id= $should_b_id;
            $client->country_id = $request->client_country_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->password   = Hash::make('12345678');
            //$client->note       = $request->c_note;
            $client->status     = 'Customer';
            $client->created_at = now();
            $client->route_controller = $request->url();
            $client->save();


        }

        try {
            $url = $request->url();
            $routeName = \Route::currentRouteName();

            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);

            $client->route_controller  = 'Controller Action : '.$controllerAction.' URL '.$url;
            $client->save();
            
        } catch (\Exception $e) {
            \Log::info('error find when route detials obtain');
        }
        
        $client_document = new ClientShareDocument;
        $client_document->client_id = $client->id;
        $client_document->business_id = $business_info->id;
        //$client_document->business_id = $should_b_id;
        
        if ($request->hasFile('client_file')) {
            $image = $request->file('client_file');
            $image_origin_name = $image->getClientOriginalName();
            $file_name = pathinfo($image_origin_name, PATHINFO_FILENAME); // file
            $new_name = uniqid(time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/client_document'), $new_name);
            
            $client_document->client_file       = $new_name;
            
        }
        
        
        $client_document->client_document   = $request->client_document;
        $client_document->client_message    = $request->client_message;
        $client_document->created_at        = now();
        $client_document->save();
        
       
        
        
        
        $length2 = 10;    
	    $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->c_first_name;
        $inbox->inbox_lastname      = $request->c_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $phone;
        $inbox->business_id         = $business_info->id;
        //$inbox->business_id         = $should_b_id;
        //$inbox->staff_id            = $staff->id;
        $inbox->client_document_id  = $client_document->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        //$inbox->information_details = $request->c_note;
        $inbox->subject             = 'Client Share ';
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'share_document';
        $inbox->conversation_type_id = $client_document->id;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from  = $request->b_id;
        }
        $inbox->save();
    
        
        
        $length = 11;    
	    $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
	    
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $business_info->id;
        //$conversation->business_id      = $should_b_id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = $client->firstname.' '.$client->lastname.' shared a document.';
        $conversation->conv_messages    = $request->client_message;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        
        $email_send_message = '';
        $email_send_message2 = '';
        $email_send_message3 = '';
        
        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new ClientSendFileEmail($client, $client_document, $inbox, $conversation));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            
            try {
                Mail::to($business_info->b_email)->send(new ClientSendFileToBusinessAdmin($client, $client_document, $inbox, $conversation, $business_info));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
           try {
                Mail::to($client->email)->send(new ClientSendFileEmail($client, $client_document, $inbox, $conversation));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox, $client_document));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }
        
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success.',
            'client' => $client,
            'client_document' => $client_document,
            'conversation' => $conversation,
            'inbox' => $inbox,
            'value' => $request->all(),
            'email_send_message' => $email_send_message
        ]);
    }
    
    public function new_send_file($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }

        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
        
        $country = Country::orderBy('country_name')->get();
        
        $arr = array();
        
        $arr                = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions']     = $livesiteactionsinfo;
        $arr['seo']         = $livesiteseoinfo;
        $arr['livestyle']   = $livesitestyleinfo;
        
        $allbusinessinfo    = $arr;
        //dd($arr);
        
        return view('sharedocument.new-share-document', compact('client_live_info', 'allbusinessinfo', 'uid', 'country'));
        
    }
    
    public function addNewShareDoc(Request $request){
        
        
        //return response()->json($request->all());



        $old_business_info = Business::where('uid', $request->business_uid)->first();;


        $businessuid = $request->business_uid;
        $str = $request->client_message;


        /* ----------------------
            * Spam Protection Start
            ---------------------
        */
        //$words = array('SEO', 'Search', 'Engine', 'Optimization'); 
        $filterwords = FilterWord::select('word')->get();

        $words = array();
        foreach ($filterwords  as $key => $value) {
            //echo $value['word'];
            array_push($words, $value['word']);
        }


        $ifmatching_atleast_word_count = 2; 
        //filter($str, $words, $ifmatching_atleast_word_count);
        $SpamFilter = new SpamFilter;
        if($SpamFilter->filter($str, $words, $ifmatching_atleast_word_count)){
            $businessid = 125;
            $admin_business_info = Business::where('id', $businessid)->first();;
            $businessuid = $admin_business_info->uid;

            $str = $str.'<br/><h2> Spaming for '.$old_business_info->business_name.'</h2>';
        }

        /* ----------------------
            * Spam Protection End
            ---------------------
        */




        
        $business_info          = Business::where('uid', $businessuid)->first();
        $business_all_clients   = Client::where('business_id', $business_info->id)->get()->count();
        $business_all_share_document  = ClientShareDocument::where('business_id', $business_info->id)->get()->count();
        
        
        $business_all_inbox = Inbox::where('business_id', $business_info->id)->get()->count();
        
        $package_check = new PackageSubscriptionCheck;
        
        $result_data = $package_check->packageData($business_info->uid);
        $package_rule = $result_data->package_rules;
        
        
        $data = json_decode($package_rule);
        $clients = $data->clients;
        $inbox = $data->inbox;
        
         /*
            Subscription check
        */
        $should_b_id = 1;
        $is_subscription_ok = false;
   
        $from   = strtotime($business_info->package_start_date);
        $from = date('Y-m-d H:i:s', $from);
        
        $to     = strtotime($business_info->package_end_date);
        $to = date('Y-m-d H:i:s', $to);
        
        $inbox_count = Inbox::whereBetween('created_at', [$from, $to])->where('business_id', $business_info->id)->count();
        
        $scope = '';
        
        if(($clients == '-1') || ($inbox == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {

             $scope = 'Others';
             
            if(($inbox > $inbox_count) && ($business_all_clients < $clients)) {
                $is_subscription_ok = true;
            } else {
                $is_subscription_ok = false;
            }
            

                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = 0;
            if($business_info->id == 1) {
                $should_b_id = 0;  
            }
        } else {
            $should_b_id = 1;  
        }


        //new subscription rule start
        $package_end   = strtotime($business_info->package_end_date);
        $today = strtotime(date('Y-m-d H:i:s'));

        if($today > $package_end){
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }else{
            $should_b_id = 0;  
            $is_subscription_ok = true;
        }

        if($is_subscription_ok) {
            if($inbox == '-1'){
                $scope = 'Unlimited';
                $is_subscription_ok = true;
            }else{
                $scope = 'Others';
             
                if($inbox > $inbox_count) {
                    $schopeShcedule = $inbox;
                    $is_subscription_ok = true;
                } else {
                   $schopeShcedule = $inbox_count;
                    $is_subscription_ok = false;
                }
            }
        } else {
            $should_b_id = 1;  
            $is_subscription_ok = false;
        }

        //new subscription rule end
        
        /*
            Subscription check end
        */
        
        //$business_info = Business::where('uid', $request->business_uid)->first();
        //$staff = Staff::where('business_id', $business_info->business_id)->first();
        $client = Client::where('email', $request->c_email)->where('business_id', $business_info->id)->first();
        
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);
        //return response()->json($client);
        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            //$client->business_id= $should_b_id;
            $client->country_id = $request->client_country_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->password   = Hash::make('12345678');
            //$client->note       = $request->c_note;
            $client->status     = 'Customer';
            $client->created_at = now();
            $client->route_controller = $request->url();
            if($should_b_id == 1){
                $client->limit_exceed_status = 'yes';
            }
            $client->save();
        }
        
        try {
            $url = $request->url();
            $routeName = \Route::currentRouteName();

            $routeArray = app('request')->route()->getAction();
            $controllerAction = class_basename($routeArray['controller']);

            $client->route_controller  = 'Controller Action : '.$controllerAction.' URL '.$url;
            if($should_b_id == 1){
                $client->limit_exceed_status = 'yes';
            }
            $client->save();
            
        } catch (\Exception $e) {
            \Log::info('error find when route detials obtain');
        }

        $client_document = new ClientShareDocument;
        $client_document->client_id = $client->id;
        $client_document->business_id = $business_info->id;
        //$client_document->business_id = $should_b_id;
        
        if ($request->hasFile('client_file')) {
            $image = $request->file('client_file');
            $image_origin_name = $image->getClientOriginalName();
            $file_name = pathinfo($image_origin_name, PATHINFO_FILENAME); // file
            $new_name = uniqid(time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/client_document'), $new_name);
            
            $client_document->client_file       = $new_name;
            
        }
        
        
        $client_document->client_document   = $request->client_document;
        $client_document->client_message    = $str;
        $client_document->timezone_name     = $request->timezone_name;
        $client_document->created_at        = now();
        $client_document->save();
        
       
        $staff = Staff::where('business_id', $business_info->id)->where('staff_type', 'admin')->first();
        
        
        $length2 = 10;    
	    $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->c_first_name;
        $inbox->inbox_lastname      = $request->c_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $phone;
        $inbox->business_id         = $business_info->id;
        //$inbox->business_id         = $should_b_id;
        $inbox->staff_id            = $staff->id;
        $inbox->client_document_id  = $client_document->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        //$inbox->information_details = $request->c_note;
        $inbox->subject             = 'Client Share ';
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'share_document';
        $inbox->conversation_type_id = $client_document->id;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from  = $request->b_id;
        }
        $inbox->user_ip = request()->ip();
        $inbox->save();
    
        
        
        $length = 11;    
	    $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
	    
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $business_info->id;
        //$conversation->business_id      = $should_b_id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = "<h2>Document Received : </h2>".$client->firstname.' '.$client->lastname.' shared a document.<br>';
        $conversation->conv_messages    = $str;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        $len                   = 20;    
    	$live_token       =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
    	
        $live_site_token            = new LiveSiteToken;
        $live_site_token->business_id = $business_info->id;
        $live_site_token->business_login = 'yes';
        $live_site_token->client_id = $client->id;
        $live_site_token->token     = $live_token;
        $live_site_token->save();
        
        $email_send_message = '';
        $email_send_message2 = '';
        $email_send_message3 = '';


        $clfname = $request->c_first_name;

        //if($business_info->nickname == 'eng-maksudul-haque') {
            event(new AllEvent($business_info->uid, $clfname, 1, 'file'));
        //}

        
        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new ClientSendFileEmail($client, $client_document, $inbox, $conversation, $business_info, $live_site_token));

            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            
            try {
                Mail::to($business_info->b_email)->send(new ClientSendFileToBusinessAdmin($client, $client_document, $inbox, $conversation, $business_info, $live_site_token));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
           try {
                Mail::to($client->email)->send(new ClientSendFileEmail($client, $client_document, $inbox, $conversation, $business_info, $live_site_token));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox, $client_document));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }
        

        // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');


        try {
            Mail::to($top_admin)->send(new TopAdminSendFile($client, $client_document, $inbox, $conversation, $business_info, $live_site_token));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        }
        
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success.',
            'client' => $client,
            'client_document' => $client_document,
            'conversation' => $conversation,
            'inbox' => $inbox,
            'value' => $request->all(),
            'email_send_message' => $email_send_message
        ]);
    
    }
    
    
}