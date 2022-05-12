<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Greeting;
use App\Model\Client;
use App\Model\Staff;
use App\Model\Inbox;
use App\Model\Conversation;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteSeo;
use App\Model\LiveSiteAction;
use App\Model\Country;

use App\Mail\GreetingEmailFromClient;
use App\Mail\GreetingEmailToBusinessAdmin;
use App\Mail\BookingLimitExceedToBusinessAdminEmail;
use Mail;
use Validator;

use App\Helpers\PackageSubscriptionCheck;
use Carbon\Carbon;
use DB;


class MsgController extends Controller
{
    public function index()
    {

        return view('greeting.msg');
        
    }
    
    public function greeting($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name')->get();
        
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
    
        return view('greeting.greeting-form', compact('client_live_info', 'allbusinessinfo', 'uid', 'country'));
        
    }
    
    public function addGreetingData(Request $request){
        
        //return response()->json($request->all());
        
        $business_info          = Business::where('uid', $request->business_uid)->first();
        $business_all_clients   = Client::where('business_id', $business_info->id)->get()->count();
        $business_all_greeting  = Greeting::where('business_id', $business_info->id)->get()->count();
        
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
        $schedule = $data->schedule;
        
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
        
        if(($clients == '-1') || ($schedule == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {

             $scope = 'Others';
             
            if(($schedule > $inbox_count) && ($business_all_clients < $clients)) {
                $schopeShcedule = '$schedule';
                $is_subscription_ok = true;
            } else {
               $schopeShcedule = '$inbox_count';
                $is_subscription_ok = false;
            }
            

                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = $business_info->id;
        } else {
            $should_b_id = 1;  
        }
        
        /*
            Subscription check end
        */
        
        
        //$business_info = Business::where('uid', $request->business_uid)->first();
        $client = Client::where('email', $request->c_email)->where('business_id', $business_info->id)->first();
        
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);
        
        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            //$client->business_id= $should_b_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->status     = 'Customer';
            $client->created_at = now();
            $client->save();
        }
        
        try {
            $routeName = \Request::route()->getName();
            $routeInfo = \Route::current()->url;
            $client->route_controller  = 'Route name : '.$routeName.' route info '.$routeInfo;
            $client->save();
        } catch (\Exception $e) {
            \Log::info('error find when route detials obtain');
        }
        
        $greeting = new Greeting;
        $greeting->client_id        = $client->id;
        $greeting->business_id      = $business_info->id;
        //$greeting->business_id      = $should_b_id;
        $greeting->c_subject        = $request->c_subject;
        $greeting->c_message        = $request->c_message;
        $greeting->timezone_name    = $request->timezonename;
        $greeting->save();
        
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
        $inbox->greeting_id         = $greeting->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        $inbox->information_details = $request->c_message;
        $inbox->subject             = 'Client Greetings ';
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'greetings';
        $inbox->conversation_type_id = $greeting->id;
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
        $conversation->conv_messages    = $request->c_message;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save(); 
        
        
        $email_send_message = '';
        $email_send_message2= '';
        $email_send_message3 = '';
        
        
        if($is_subscription_ok) {
            try {
                $email_send_message = Mail::to($client->email)->send(new GreetingEmailFromClient($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            $email_send_message2 = '';
            
            try {
                $email_send_message = Mail::to($business_info->b_email)->send(new GreetingEmailToBusinessAdmin($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
            try {
                $email_send_message = Mail::to($client->email)->send(new GreetingEmailFromClient($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }
        
        return response()->json([
                'status' => 'success',
                'message' => 'Data send success',
                'client'        => $client,
                'greeting'      => $greeting,
                'inbox'         => $inbox,
                'conversation'  => $conversation,
                'email_send' => $email_send_message,
                'email_send2' => $email_send_message2,
                'all_data' => $request->all()
            ]);
    }
    
    public function new_greeting($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo        = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
        
        $country = Country::orderBy('country_name')->get();
        
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        
        $allbusinessinfo = $arr;
        //dd($arr);
    
        return view('greeting.new-greeting-form', compact('client_live_info', 'allbusinessinfo', 'uid', 'country'));
        
    }
    
    public function addNewGreetingData(Request $request){
        
        
        //return response()->json($request->all());
        
        $business_info          = Business::where('uid', $request->business_uid)->first();
        $business_all_clients   = Client::where('business_id', $business_info->id)->get()->count();
        $business_all_greeting  = Greeting::where('business_id', $business_info->id)->get()->count();
        
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
        $schedule = $data->schedule;
        
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
        
        if(($clients == '-1') || ($schedule == '-1')) {
            $scope = 'Unlimited';
            $is_subscription_ok = true;
            
        } else {

             $scope = 'Others';
             
            if(($schedule > $inbox_count) && ($business_all_clients < $clients)) {
                $schopeShcedule = '$schedule';
                $is_subscription_ok = true;
            } else {
               $schopeShcedule = '$inbox_count';
                $is_subscription_ok = false;
            }
            

                
        } 
        
        if($is_subscription_ok) {
            $should_b_id = $business_info->id;
        } else {
            $should_b_id = 1;  
        }
        
        /*
            Subscription check end
        */
        
        
        //$business_info = Business::where('uid', $request->business_uid)->first();
        $client = Client::where('email', $request->c_email)->where('business_id', $business_info->id)->first();
        
        $country = Country::where('id', $request->client_country_id)->first();
        $phone = '+'.$country->country_code.''.$request->c_phone;
        //return response()->json($phone);
        
        if(empty($client)){
            $length = 15;    
    	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            $client->country_id = $request->client_country_id;
            //$client->business_id= $should_b_id;
            $client->firstname  = $request->c_first_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
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
        
        $greeting = new Greeting;
        $greeting->client_id        = $client->id;
        $greeting->business_id      = $business_info->id;
        //$greeting->business_id      = $should_b_id;
        $greeting->c_subject        = $request->c_subject;
        $greeting->c_message        = $request->c_message;
        $greeting->timezone_name    = $request->timezonename;
        $greeting->save();
        
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
        $inbox->greeting_id         = $greeting->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        $inbox->information_details = $request->c_message;
        $inbox->subject             = 'Client Greetings ';
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'greetings';
        $inbox->conversation_type_id = $greeting->id;
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
        $conversation->conv_subject     = $client->firstname.' '.$client->lastname.' shared a message.';
        $conversation->conv_messages    = $request->c_message;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save(); 
        
        
        $email_send_message = '';
        $email_send_message2= '';
        $email_send_message3 = '';
        
        
        if($is_subscription_ok) {
            try {
                $email_send_message = Mail::to($client->email)->send(new GreetingEmailFromClient($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            $email_send_message2 = '';
            
            try {
                $email_send_message = Mail::to($business_info->b_email)->send(new GreetingEmailToBusinessAdmin($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {
            try {
                $email_send_message = Mail::to($client->email)->send(new GreetingEmailFromClient($client, $greeting, $inbox, $conversation,$business_info));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }
            
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }
        }
        
        return response()->json([
                'status'        => 'success',
                'message'       => 'Data send success',
                'client'        => $client,
                'greeting'      => $greeting,
                'inbox'         => $inbox,
                'conversation'  => $conversation,
                'value'         => $request->all(),
                'email_send'    => $email_send_message,
                'email_send2'   => $email_send_message2
            ]);
    
    }
    
   
}
