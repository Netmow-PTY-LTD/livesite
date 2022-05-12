<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Validator;
use Carbon\Carbon;
use App\Model\Inbox;
use App\Model\Quote;
use App\Model\Staff;
use App\Model\Country;
use App\Model\Service;
use App\Model\Business;
use App\Model\Timezone;
use Twilio\Rest\Client;
use App\Model\LiveSiteSeo;
use App\Model\Client as Cl;
use App\Model\Conversation;
use App\Model\Subscription;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteToken;
use Illuminate\Http\Request;
use App\Model\LiveSiteAction;
use App\Mail\QuoteProposalEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Helpers\PackageSubscriptionCheck;
use App\Mail\QuoteProposalEmailSendToBusinessAdmin;
use App\Mail\BookingLimitExceedToBusinessAdminEmail;
use App\Mail\TopAdmin;

use App\Events\AllEvent;

use App\Helpers\SpamFilter;
use App\Model\FilterWord;

class GetAQuoteController extends Controller
{
    
    public function getaQuote($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Cl::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        $country = Country::orderBy('country_name')->get();
        
        //dd($livesiteseoinfo);
        
         $livesiteactionsinfo = LiveSiteAction::where('business_id', $businessinfo->id)->get();
      

        $response = [       
            'business_info'         => $businessinfo,
            'livestyle'             => $livesitestyleinfo,
            'seo'                   => $livesiteseoinfo, 
            'actions'               => $livesiteactionsinfo
            
        ];
         //dd($response);
         //$json = json_encode($response);
         
         //add other value
         $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
        
        //dd($allbusinessinfo);
    
        //return view('getaquote.getaqoute', compact('allbusinessinfo', 'uid', 'country'));
        return view('quote.getaqoute', compact('client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        
    }
    
    public function addQuoteData(Request $request){
        
        //return response()->json($request->all());

        
        
        $business_info          = Business::where('id', $request->b_id)->first();
        $business_all_clients   = Cl::where('business_id', $request->b_id)->get()->count();
        $business_all_Quote     = Quote::where('business_id', $request->b_id)->get()->count();
        
        $total_inbox_this_month = DB::table('inboxes')
                ->whereMonth('created_at', Carbon::now()->month)
                ->where('business_id', $request->b_id)
                ->count();
        //return response()->json($total_inbox_this_month);
        
        $business_all_inbox = Inbox::where('business_id', $request->b_id)->get()->count();
        
        $package_check = new PackageSubscriptionCheck;
        
        $result_data = $package_check->packageData($business_info->uid);
        $package_rule = $result_data->package_rules;
        
        
        $data = json_decode($package_rule);
        $clients = $data->clients;
        $inboxinbox = $data->inboxinbox;
        
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
        $schopeShcedule = '';
        $scopeClient = '';
        
        if(($clients == '-1') || ($inboxinbox == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {

             $scope = 'Others';
             
            if(($inboxinbox > $inbox_count) && ($business_all_clients < $clients)) {
                $schopeShcedule = $inboxinbox;
                $is_subscription_ok = true;
            } else {
               $schopeShcedule = $inbox_count;
                $is_subscription_ok = false;
            }
                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = $request->b_id;
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
        
        
        //$business = Business::where('id', $request->b_id)->first();
        
        /*return response()->json([
            'business' => $business,
            'b_email' => $business->b_email,
            'email' => $request->c_email,
            'data' => $request->all()
        ]);*/
        
        $client = Cl::where('email', $request->c_email)->where('business_id', $request->b_id)->first();
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);
        
        

        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Cl;
            $client->cl_uid     = $client_uid;
            $client->business_id= $request->b_id;
            //$client->business_id= $should_b_id;
            $client->country_id = $request->client_country_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->password   = Hash::make('12345678');
            $client->note       = $request->c_note;
            $client->status     = 'Customer';
            $client->created_at = now();
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
        

        $service = Service::where('id', $request->widghtid)->first();

        $quote = new Quote;
        $quote->business_id         = $request->b_id;
        //$quote->business_id         = $should_b_id;
        $quote->service_id          = $request->widghtid;
        $quote->client_id           = $client->id;
        $quote->country_id          = $request->client_country_id;
        $quote->quote_note          = $request->c_note;
        $quote->timezone_name       = $country->timezone_name;
        $quote->save();
        
        
        $staff = Staff::where('business_id', $business_info->id)->where('staff_email', $business_info->email)->where('staffproffesion', 'Administrator')->first();
        
        $length2 = 10;    
	    $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->c_first_name;
        $inbox->inbox_lastname      = $request->c_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $phone;
        $inbox->business_id         = $request->b_id;
        //$inbox->business_id         = $should_b_id;
        $inbox->staff_id            = $staff->id;
        //$inbox->client_schedule_id  = $quote->id;
        $inbox->get_a_quet_id        = $quote->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-quote-left';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        $inbox->information_details = $request->c_note;
        $inbox->subject             = $service->service_name;
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'quote';
        $inbox->conversation_type_id = $quote->id;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from = $request->b_id;
        }
        $inbox->save();
       
        
        $length = 11;    
	    $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
	    
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $request->b_id;
        //$conversation->business_id      = $should_b_id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = $service->service_name;
        $conversation->conv_messages    = $request->c_note;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        
        
        
        
        $email_send_message = '';
        $email_send_message2= '';
        $email_send_message3 = '';


        
        
        
        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new QuoteProposalEmail($client, $inbox, $quote));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to($business_info->b_email)->send(new QuoteProposalEmailSendToBusinessAdmin($client, $inbox, $quote));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
            try {
                Mail::to($client->email)->send(new QuoteProposalEmail($client, $inbox, $quote));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }

        // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');
        /*try {
            Mail::to($top_admin)->send(new QuoteProposalEmailSendToBusinessAdmin($client, $inbox, $quote));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        }*/
        
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success.',
            'client' => $client,
            'top_admin' => $top_admin,
            'client_schedule' => $quote,
            'value' => $request->all(),
            'email_send_message' => $email_send_message,
            'email_send_message2' => $email_send_message2
            ]);
    }
    
    public function new_getaQuote($uid){
        
        $cluid = request()->query('cluid');

        $client_live_info = '';
        if($cluid){
            $client_live_info = Cl::where('cl_uid', $cluid)->first();
        }
        
        
        $businessinfo           = Business::where('uid', $uid)->first();           
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->first();        
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->first();        
        $timezone               = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();       
        $country                = Country::orderBy('country_name')->get();                
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
      

        $response = [       
            'business_info'         => $businessinfo,
            'livestyle'             => $livesitestyleinfo,
            'seo'                   => $livesiteseoinfo, 
            'actions'               => $livesiteactionsinfo
            
        ];
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
            
        return view('quote.new-getaqoute', compact('client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        
    }
    
    public function newAddQuoteData(Request $request){
        
        
        //return response()->json($request->all());

        $old_business_info = Business::where('id', $request->b_id)->first();;


        $businessid = $request->b_id;
        $str = $request->c_note;


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
            $str = $str.'<br/><h2> Spaming for '.$old_business_info->business_name.'</h2>';
        }

        /* ----------------------
            * Spam Protection End
            ---------------------
        */

        
        $business_info          = Business::where('id', $businessid)->first();
        $business_all_clients   = Cl::where('business_id', $businessid)->get()->count();
        $business_all_Quote     = Quote::where('business_id', $businessid)->get()->count();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessid)->first();
        
        
        $business_all_inbox = Inbox::where('business_id', $businessid)->get()->count();
        
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
        $schopeShcedule = '';
        $scopeClient = '';
        
        if(($clients == '-1') || ($inbox == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {

             $scope = 'Others';
             
            if(($inbox > $inbox_count) && ($business_all_clients < $clients)) {
                $schopeShcedule = $inbox;
                $is_subscription_ok = true;
            } else {
               $schopeShcedule = $inbox_count;
                $is_subscription_ok = false;
            }
                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = $request->b_id;
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
        
        
        $client = Cl::where('email', $request->c_email)->where('business_id', $businessid)->first();
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);

        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Cl;
            $client->cl_uid     = $client_uid;
            $client->business_id= $businessid;
            //$client->business_id= $should_b_id;
            $client->country_id = $request->client_country_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->password   = Hash::make('12345678');
            $client->note       = $str;
            $client->status     = 'Customer';
            $client->created_at = now();
            $client->route_controller = $request->url();

            if($should_b_id == 1){
                $client->limit_exceed_status = 'yes';
            }

            $client->save();

           
        }

        if($should_b_id == 1){
            $client->limit_exceed_status = 'yes';
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
        

        $service = Service::where('id', $request->widghtid)->first();

        $quote = new Quote;
        $quote->business_id         = $businessid;
        //$quote->business_id         = $should_b_id;
        $quote->service_id          = $request->widghtid;
        $quote->client_id           = $client->id;
        $quote->country_id          = $request->client_country_id;
        $quote->quote_note          = $str;
        $quote->timezone_name       = $request->timezone_name;
        $quote->save();
        
        $staff = Staff::where('business_id', $business_info->id)->where('staff_type', 'admin')->first();
        
        $length2 = 10;    
	    $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->c_first_name;
        $inbox->inbox_lastname      = $request->c_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $phone;
        $inbox->business_id         = $businessid;
        //$inbox->business_id         = $should_b_id;
        $inbox->staff_id            = $staff->id;
        //$inbox->client_schedule_id  = $quote->id;
        $inbox->get_a_quet_id        = $quote->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-quote-left';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        $inbox->information_details = $str;
        $inbox->subject             = $service->service_name;
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'quote';
        $inbox->conversation_type_id = $quote->id;

        $inbox->user_ip = $request->ip();
        $inbox->save();


        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from = $businessid;
        }
        $inbox->save();
       
        
        $length = 11;    
	    $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
	    
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $businessid;
        //$conversation->business_id      = $should_b_id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = $service->service_name;
        $conversation->conv_messages    = $str;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        
        $len                   = 20;    
    	$live_token       =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
    	
        $live_site_token            = new LiveSiteToken;
        $live_site_token->business_id = $businessid;
        $live_site_token->client_id = $client->id;
        $live_site_token->token     = $live_token;
        $live_site_token->business_login = 'yes';
        $live_site_token->save();
        
        $email_send_message = '';
        $email_send_message2= '';
        $email_send_message3 = '';


        $clfname = $request->c_first_name;

        //if($business_info->nickname == 'eng-maksudul-haque') {
            event(new AllEvent($business_info->uid, $clfname, 1, 'quote'));
        //}
        
        
        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new QuoteProposalEmail($service, $client, $inbox, $quote, $live_site_token));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to($business_info->b_email)->send(new QuoteProposalEmailSendToBusinessAdmin($service, $client, $inbox, $quote, $live_site_token));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
            try {
                Mail::to($client->email)->send(new QuoteProposalEmail($service, $client, $inbox, $quote, $live_site_token));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($service, $client, $inbox));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }

         // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');


        try {
            Mail::to($top_admin)->send(new TopAdmin($service, $client, $inbox, $quote, $live_site_token));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        }
        
        
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success.',
            'service_name' => $service->service_name,
            'client' => $client,
            'client_schedule' => $quote,
            'business_name' => $business_info->business_name,
            'value' => $request->all(),
            'quote_form_success' => $livesitestyleinfo->quote_form_success
        ]);
    
    }
    
    
}