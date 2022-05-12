<?php

namespace App\Http\Controllers;

use Mail;
use Validator;
use App\Model\Inbox;
use App\Model\Quote;
use App\Model\Staff;
use App\Model\Client;
use App\Model\Country;
use App\Model\Service;
use App\Model\Business;
use App\Model\Timezone;
use App\Model\LiveSiteSeo;
use App\Model\Conversation;
use App\Model\FilterWord;
use App\Model\SpamFilter;


use Illuminate\Support\Str;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteToken;
use Illuminate\Http\Request;
use App\Model\LiveSiteAction;
use App\Model\CustomFormValue;
use App\Mail\CustomFormClientEmail;
use Illuminate\Support\Facades\Hash;
use App\Mail\CustomFormBusinessEmail;
use App\Mail\CustomFormEmailSendToUser;
use Illuminate\Support\Facades\Session;
use App\Helpers\PackageSubscriptionCheck;
use App\Mail\CustomFormEmailSendToBusinessAdmin;
use App\Mail\BookingLimitExceedToBusinessAdminEmail;
use App\Mail\BookingLimitExceedToCustomBusinessAdminEmail;
use App\Mail\TopAdminCutomForm;


use App\Events\AllEvent;


class CustomFormController extends Controller
{
    
    public function customFormWithUid($uid){
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        $country = Country::all();
        
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
        return view('customform.customform', compact('response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        
    }
    
    public function customForm(Request $request){
        
        //return response()->json($request->all());
        
        $business_info = Business::where('uid', $request->business_uid)->first();
        $staff = Staff::where('business_id', $business_info->id)->first();
        $client = Client::where('email', $request->custom_email)->where('business_id', $business_info->id)->first();
        
        //return response()->json($staff);


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
        



        
        if(empty($client)){
            $length = 15;    
            $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            $client->country_id = '207';
            $client->firstname  = $request->custom_first_name;
            $client->lastname   = $request->custom_last_name;
            $client->phone      = $request->custom_phone;
            $client->email      = $request->custom_email;
            $client->note       = $request->custom_before_contact_details;
            $client->status     = 'Customer';
            $client->created_at = now();
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
        
        
        
        $custom_form = new CustomFormValue;
        $custom_form->client_id                     = $client->id;
        $custom_form->business_id                   = $business_info->id;
        $custom_form->custom_first_name             = $request->custom_first_name;
        $custom_form->custom_last_name              = $request->custom_last_name;
        $custom_form->custom_phone                  = $request->custom_phone;
        $custom_form->custom_email                  = $request->custom_email;
        $custom_form->customform_date               = $request->customform_date;
        $custom_form->custom_no_of_guests           = $request->custom_no_of_guests;
        $custom_form->custom_wedding                = $request->custom_wedding;
        $custom_form->custom_event                  = $request->custom_event;
        $custom_form->custom_other                  = $request->custom_other;
        $custom_form->custom_event_wedding_vanue    = $request->custom_event_wedding_vanue;
        $custom_form->custom_before_contact_details = $request->custom_before_contact_details;
        //$custom_form->custom_check_capctha       = $request->custom_check_capctha;
        $custom_form->save();
        
        $length2 = 10;    
        $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        if($custom_form->custom_wedding == 'true' && $custom_form->custom_event == 'true' && $custom_form->custom_other == 'true'){
            $function_Type = 'Wedding, Event, Other';
        }
        elseif($custom_form->custom_wedding == 'true' && $custom_form->custom_event == 'true'){
            $function_Type = 'Wedding, Event';
        }
        elseif($custom_form->custom_wedding == 'true' && $custom_form->custom_other == 'true'){
            $function_Type = 'Wedding, Other';
        }
        elseif($custom_form->custom_event == 'true' && $custom_form->custom_other == 'true'){
            $function_Type = 'Event, Other';
        }
        elseif($custom_form->custom_wedding == 'true'){
            $function_Type =  'Wedding';
        }
        elseif($custom_form->custom_event == 'true'){
            $function_Type =  'Event';
        }
        else{
            $function_Type =  'Other';
        }
        
        
        
        $customer_details = '<b>Customer Details here:</b><br> <b>Full Name: </b>'.$request->custom_first_name.' '. $request->custom_last_name.'<br><b> Email: </b>'.$request->custom_email.'<br><b> Phone: </b>'.$request->custom_phone;
        $event_details = '<b>Event Details here:</b><br> <b>Function Date:</b> '.$request->customform_date.'<br><b> No. Of Guest:</b> '.$request->custom_no_of_guests.'<br><b> Function Type:</b> '.$function_Type.'<br><b> What is the venue of your event or wedding:</b><br> '.$request->custom_event_wedding_vanue.'<br><br><b> Any other details you want us to know before we contact you:</b><br> '.$request->custom_before_contact_details;

        $all_detials = $customer_details.'<br><br>'.$event_details;
        
        $customer_details = 'Customer Details: Full Name: '.$request->custom_first_name.' '. $request->custom_last_name.', Email: '.$request->custom_email.', Phone: '.$request->custom_phone;
        $event_details = ', Event Details : Function Date: '.$request->customform_date.', No. Of Guest:  '.$request->custom_no_of_guests.', Function Type:  '.$function_Type.', What is the venue of your event or wedding: '.$request->custom_event_wedding_vanue.', Any other details you want us to know before we contact you: '.$request->custom_before_contact_details;

        $information_details = $customer_details.', '.$event_details;
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->custom_first_name;
        $inbox->inbox_lastname      = $request->custom_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $request->custom_phone;
        $inbox->business_id         = $business_info->id;
        $inbox->staff_id            = $staff->id;
        $inbox->custom_form_value_id = $custom_form->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        //$inbox->information_details = $request->custom_before_contact_details;
        $inbox->information_details = $information_details;
        //$inbox->subject             = 'Wedding Events ';
        $inbox->subject             = $function_Type;
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'get_a_quote';
        $inbox->conversation_type_id = $custom_form->id;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from  = $business_info->id;
        }
        $inbox->user_ip = request()->ip();
        $inbox->save();
    
        
        
        $length = 11;    
        $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
        
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $business_info->id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = $function_Type;
        $conversation->conv_messages    = $all_detials;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        $email_send_message = '';
        
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $business_info->id)->first();


         $clfname = $request->custom_first_name;

        //if($business_info->nickname == 'eng-maksudul-haque') {
            event(new AllEvent($business_info->uid, $clfname, 1, 'lead'));
        //}


        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new CustomFormEmailSendToUser($client, $custom_form, $inbox, $conversation, $business_info));
            } catch (\Exception $e) {

            }
            

            try {
                Mail::to($business_info->b_email)->send(new CustomFormEmailSendToBusinessAdmin($client, $custom_form, $inbox, $conversation, $business_info));
            } catch (\Exception $e) {

            }
        } else {
            try {
                Mail::to($client->email)->send(new CustomFormEmailSendToUser($client, $custom_form, $inbox, $conversation, $business_info));
            } catch (\Exception $e) {

            }
            try {

                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToCustomBusinessAdminEmail($client, $custom_form, $inbox, $LiveSiteStyle, $business_info));
            } catch (\Exception $e) {

            }   
        }


         // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');


        try {
            Mail::to($top_admin)->send(new TopAdminCutomForm($client, $custom_form, $inbox, $conversation, $business_info));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        }
        
        
        
        
        //Mail::to($client->email)->send(new CustomFormEmailSendToUser($client, $custom_form, $inbox, $conversation, $business_info));
        //Mail::to($business_info->b_email)->send(new CustomFormEmailSendToBusinessAdmin($client, $custom_form, $inbox, $conversation, $business_info));
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success',
            'client'        => $client,
            'greeting'      => $custom_form,
            'inbox'         => $inbox,
            'conversation'  => $conversation,
        ]);
            
    }
    
    //custom function for strata business
    
    public function strataCustomFormWithUid($uid){





        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        $country = Country::all();
        
        //dd($businessinfo);
        
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
        return view('customform.strata_form', compact('response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        
    }


    public function strataCustomForm(Request $request){



        $old_business_info = Business::where('uid', $request->business_uid)->first();;

        $businessid = $old_business_info->b_id;
        //$str = $request->c_note;

        $collect = []; // empty array for collect customised inputs
        $information_details = "";
        $customer_details = 'User Details: <br>';

        $data = $request->except(['_token','form_uid', 'form_title', 'business_uid']);

        foreach($data as $input_key => $input_value){ 
                $collect[] = array(
                    $input_key => $input_value,
                );

                $input_key = str_replace("_", " ", $input_key);
                $input_key = Str::replaceFirst('custom', 'User ', $input_key);
                $input_key = Str::ucfirst($input_key);

                $customer_details .= $input_key. " = ".$input_value."<br>";

        }

        $result = json_encode($collect); //convert to json
        $str = $result;


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



        $business_info = Business::where('uid', $request->business_uid)->first();
        $staff = Staff::where('business_id', $business_info->id)->first();
        $client = Client::where('email', $request->custom_email)->where('business_id', $business_info->id)->first();
        
        //return response()->json($staff);

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
        
        
        if(empty($client)){
            $length = 15;    
            $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            $client = new Client;
            $client->cl_uid     = $client_uid;
            $client->business_id= $business_info->id;
            $client->country_id = '207';
            $client->firstname  = $request->custom_first_name;
            $client->lastname   = $request->custom_last_name;
            $client->phone      = $request->custom_phone;
            $client->email      = $request->custom_email;
            $client->note       = 'note for cleint';
            $client->status     = 'Customer';
            $client->created_at = now();
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
        

        

        /*return response()->json([
            'result' => $result,
            'customer_details' => $customer_details,
            'status' => 'success',
            'message' => 'Data send success',
        ]);*/

        
        
        $custom_form = new CustomFormValue;
        $custom_form->client_id                     = $client->id;
        $custom_form->business_id                   = $business_info->id;
        $custom_form->custom_first_name             = $request->custom_first_name;
        $custom_form->custom_last_name              = $request->custom_last_name;
        $custom_form->custom_phone                  = $request->custom_phone;
        $custom_form->custom_email                  = $request->custom_email;

        $custom_form->form_uid                      = $request->form_uid;
        $custom_form->form_title                    = $request->form_title;
        $custom_form->form_details                  = $result;

        $custom_form->save();
        
        
        
        
        /*$customer_details = '<b>Customer Details here:</b><br> <b>Full Name: </b>'.$request->custom_first_name.' '. $request->custom_last_name.'<br><b> Email: </b>'.$request->custom_email.'<br><b> Phone: </b>'.$request->custom_phone;
        $event_details = '<b>Event Details here:</b><br> <b>Function Date:</b> '.$request->customform_date.'<br><b> No. Of Guest:</b> '.$request->custom_no_of_guests.'<br><b> Function Type:</b> '.$function_Type.'<br><b> What is the venue of your event or wedding:</b><br> '.$request->custom_event_wedding_vanue.'<br><br><b> Any other details you want us to know before we contact you:</b><br> '.$request->custom_before_contact_details;
        $all_detials = $customer_details.'<br><br>'.$event_details;
        
        $customer_details = 'Customer Details: Full Name: '.$request->custom_first_name.' '. $request->custom_last_name.', Email: '.$request->custom_email.', Phone: '.$request->custom_phone;
        $event_details = ', Event Details : Function Date: '.$request->customform_date.', No. Of Guest:  '.$request->custom_no_of_guests.', Function Type:  '.$function_Type.', What is the venue of your event or wedding: '.$request->custom_event_wedding_vanue.', Any other details you want us to know before we contact you: '.$request->custom_before_contact_details;
        $information_details = $customer_details.', '.$event_details;*/

        $length2 = 10;    
        $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
        
        $inbox = new Inbox;
        $inbox->inb_uid             = $inbox_uid;
        $inbox->inbox_firstname     = $request->custom_first_name;
        $inbox->inbox_lastname      = $request->custom_last_name;
        $inbox->inbox_country_id    = $request->client_country_id;
        $inbox->inbox_phone         = $request->custom_phone;
        $inbox->business_id         = $business_info->id;
        $inbox->staff_id            = $staff->id;
        $inbox->custom_form_value_id = $custom_form->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-file';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        //$inbox->information_details = $request->custom_before_contact_details;
        $inbox->information_details = $customer_details;
        //$inbox->subject             = 'Wedding Events ';
        $inbox->subject             = $business_info->business_name.' has a new Quote';
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'get_a_quote';
        $inbox->conversation_type_id = $custom_form->id;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from  = $business_info->id;
        }
        $inbox->user_ip = request()->ip();
        $inbox->save();
    
        
        
        $length = 11;    
        $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
        
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $business_info->id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = $business_info->business_name.' has a new Quote';
        $conversation->conv_messages    = $customer_details;
        //$conversation->conv_ref_info  = $request->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();

        $len                   = 20;    
        $live_token       =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
        
        $live_site_token            = new LiveSiteToken;
        $live_site_token->business_id = $request->b_id;
        $live_site_token->client_id = $client->id;
        $live_site_token->token     = $live_token;
        $live_site_token->business_login = 'yes';
        $live_site_token->save();
        
        
        
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $business_info->id)->first();


         $clfname = $request->custom_first_name;

        //if($business_info->nickname == 'eng-maksudul-haque') {
            event(new AllEvent($business_info->uid, $clfname, 1, 'lead'));
        //}


        if($is_subscription_ok) {
            try {
                Mail::to($client->email)->send(new CustomFormClientEmail($client, $custom_form, $inbox, $conversation, $business_info, $live_site_token));
            } catch (\Exception $e) {
            }
            
            //$email_send_message2 = '';
            try {
                Mail::to(trim($business_info->b_email))->send(new CustomFormBusinessEmail($client, $custom_form, $inbox, $conversation, $business_info, $live_site_token));
            } catch (\Exception $e) {
            } 
        } else {
            try {
                Mail::to($client->email)->send(new CustomFormClientEmail($client, $custom_form, $inbox, $conversation, $business_info, $live_site_token));
            } catch (\Exception $e) {
            }
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToCustomBusinessAdminEmail($client, $custom_form, $inbox, $LiveSiteStyle, $business_info));
            } catch (\Exception $e) {

            }  
        }

        // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');


        try {
            Mail::to($top_admin)->send(new TopAdminCutomForm($client, $custom_form, $inbox, $conversation, $business_info));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        }
        
        
               
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success',
            'client'        => $client,
            'greeting'      => $custom_form,
            'inbox'         => $inbox,
            'conversation'  => $conversation,
            'result' => $result,
            'customer_details' => $customer_details,
        ]);

        
    }
    
}