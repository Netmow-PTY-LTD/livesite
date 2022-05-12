<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Model\Business;
use App\Model\Client as Cl;
use App\Model\ClientSchedule;
use App\Model\Service;
use App\Model\Inbox;
use App\Model\Conversation;
use App\Model\LiveSiteStyle;
use App\Model\Country;
use App\Model\Staff;
use App\Model\LiveSiteToken;
use App\Model\ClientSecondParty;

use App\Helpers\PackageSubscriptionCheck;

use App\Mail\BookingProposalEmail;
use App\Mail\BookingProposalEmailForBusinessAdmin;
use App\Mail\BookingLimitExceedToBusinessAdminEmail;
use App\Mail\MyTestMail;
use App\Mail\TopAdminBooking;

use App\Events\AllEvent;

use Mail;

use Carbon\Carbon;
use DB;

use Twilio\Rest\Client;

use App\Helpers\SpamFilter;

use App\Model\FilterWord;

use App\Events\NewLeadForAdmin;



class BookingController extends Controller
{
    public function booking(Request $request){
        
        //return response()->json($request->all());
        
        //$business = Business::where('id', $request->b_id)->first();
        
        /*return response()->json([
            'business' => $business,
            'b_email' => $business->b_email,
            'email' => $request->c_email
        ]);*/

        
        
        \Artisan::call('cache:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');

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
        $business_all_schedule  = ClientSchedule::where('business_id', $businessid)->get()->count();
        
        $staff = Staff::where('id', $request->staffid)->first();
        
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
            $should_b_id = $businessid;
            if($business_info->id == 1) {
                $should_b_id = 0;  
            }
        } else {
            $should_b_id = 1;  
        }

        //new subscription rule
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
        
        
        /*return response()->json([
            'from' =>$from,
            'to' => $to,
            'inbox_count' => $inbox_count,
            'clients' => $clients,
            'schedule' => $schedule,
            'is_subscription_ok' => $is_subscription_ok,
            'should_b_id' => $should_b_id,
            'scope'=>$scope,
            'schopeShcedule'=>$schopeShcedule,
            'scopeClient'=>$scopeClient
            ]);*/
        
        
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
            $client->middlename  = $request->c_middle_name;
            $client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->email      = $request->c_email;
            $client->password   = Hash::make('12345678');
            $client->note       = $str;
            $client->status     = 'Customer'; 
            $client->created_at = now();
            if($should_b_id == 1){
                $client->limit_exceed_status = 'yes';
            }
            $client->save();
        }else{
            $client->country_id = $request->client_country_id;
            //$client->firstname  = $request->c_first_name;
            //$client->lastname   = $request->c_last_name;
            $client->phone      = $phone;
            $client->password   = Hash::make('12345678');
            $client->updated_at = now();
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
            $client->save();
            
        } catch (\Exception $e) {
            \Log::info('error find when route detials obtain');
        }
        
        
        $client_schedule = new ClientSchedule;
        $client_schedule->business_id       = $businessid;
        //$client_schedule->business_id       = $should_b_id;
        $client_schedule->client_id         = $client->id;
        $client_schedule->staff_id          = $request->staffid;
        $client_schedule->schedule_note     = $str;
        $client_schedule->schedule_dates    = $request->dateWiseTimes;
        $client_schedule->service_id        = $request->widghtid;
        
        $service = Service::where('id', $request->widghtid)->first();
        
        $client_schedule->service_name    = $service->service_name;
        $client_schedule->service_info    = $service->service_description;
        $client_schedule->service_price    = $service->service_price;
        $client_schedule->service_currency    = $service->service_currency;
        
        $client_schedule->time_zone_id  = $request->timezone;
        $client_schedule->timezone_name = $request->timezonename ?? 'Australia/Brisbane';
        $client_schedule->save();
        
        /*return response()->json([
            'client' => $client_schedule
            ]);*/
        
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
        $inbox->staff_id            = $request->staffid;
        $inbox->client_schedule_id  = $client_schedule->id;
        $inbox->sender_type         = 'client';
        $inbox->icon                = 'fa fa-calendar';
        $inbox->sender_id           = $client->id;
        $inbox->redirect_to         = 'conversations';
        $inbox->information_details = $str;
        $inbox->subject             = $service->service_name;
        $inbox->inbox_type          = 'inbox';
        $inbox->conversation_type   = 'schedule';
        $inbox->conversation_type_id = $client_schedule->id;
        $inbox->totalduration       = $request->totalduration;
        if($should_b_id == 1){
            $inbox->limit_exceed_status     = 1;
            $inbox->business_reffered_from  = $businessid;
        }
        $inbox->user_ip = request()->ip();
        $inbox->save();
        
        // inbox id save on client schedule table
        $client_schedule->inbox_id = $inbox->id;
        $client_schedule->save();
        
        
       
        $b_country = Country::where('id', $business_info->b_country_id)->first();
        // new Added
        $request_selected_dates = '';
        $client_selected_dates = '';
        
        $str_arr = explode (",",  $request->dateWiseTimes); 
        $lastKey = array_keys($str_arr);
  
           foreach($str_arr as $key => $value) {
                $time = strtotime($value);
                $db_date = date("Y-m-d H:i:s",$time);
                
                $datess = date_create($value);
                $client_selected_dates .= date_format($datess,"D M d, Y h:i A");

                if($key != $lastKey) {
                    $client_selected_dates .= ",";
                }
                
                $oldTZ = new \DateTimeZone($request->timezonename);
                $newTZ = new \DateTimeZone($b_country->timezone_name);
                $date = new \DateTime( $db_date, $oldTZ );
                $date->setTimezone( $newTZ );
                //echo $date->format('Y-m-d H:i:s P');
                $business_new_date = $date->format('D M d, Y h:i A');
                
                $request_selected_dates .=   $business_new_date;
                
                if($key != $lastKey) {
                    $request_selected_dates .= ",";
                }
                                                        
            }
            
            $schedule_details = '<div class="new-reschedules"><div>Admin Time : '.$request_selected_dates.'('.$b_country->timezone_name.')</div><div>Client Time : '.$client_selected_dates.'('.$request->timezonename.')</div><p>'.$str.'</p></div>';
            
        
        $length = 11;    
        $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
        
        $conversation = new Conversation;
        $conversation->conv_uid         = $conv_uid;
        $conversation->business_id      = $businessid;
        //$conversation->business_id    = $should_b_id;
        $conversation->inbox_id         = $inbox->id;
        $conversation->conv_subject     = "<h2>Appointment Request : </h2>".$service->service_name;
        $conversation->conv_messages    = $schedule_details;
        $conversation->others_value     = $request_selected_dates;
        //$conversation->conv_messages    = $request->c_note;
        //$conversation->conv_ref_info  = $requtmest->b_id;
        $conversation->sender_type      = 'client';
        $conversation->save();
        
        //$business = Business::where('id', $request->b_id)->first();
        //$business = Business::where('id', $should_b_id)->first();
        
        $client_second_party    = '';
        $phone = '';
        

        
        if(($request->c_first_name_two !="") && ($request->c_last_name_two !="")) {
        
            $length = 15;    
            $clp_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
            if($request->client_country_id_two != ''){
                $country = Country::where('id', $request->client_country_id_two)->first();
                $phone = '+'.$country->country_code.''.$request->c_phone_two;
            }
            
            $client_second_party = new ClientSecondParty;
            $client_second_party->clp_uid = $clp_uid;
            $client_second_party->business_id= $businessid;
            $client_second_party->c_first_name_two = $request->c_first_name_two;
            $client_second_party->c_middle_name_two = $request->c_middle_name_two ?? '';
            $client_second_party->c_last_name_two = $request->c_last_name_two;
            $client_second_party->c_email_two = $request->c_email_two ?? '';
            $client_second_party->client_country_id_two = $request->client_country_id_two ?? '';
            $client_second_party->c_phone_two = $phone ?? '';
            $client_second_party->inbox_id = $inbox->id;
            $client_second_party->save();
        
        }
        
        $len        = 20;    
        $token      =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
        
        $live_site_token                = new LiveSiteToken;
        $live_site_token->business_id   = $businessid;
        $live_site_token->client_id     = $client->id;
        $live_site_token->business_login = 'yes';
        $live_site_token->token         = $token;
        $live_site_token->save();
        
        
        $email_send_message = ''; 
        $email_send_message2 = '';
        $email_send_message3 = '';

        $clfname = $request->c_first_name;

        //if($business_info->nickname == 'eng-maksudul-haque') {
            event(new AllEvent($business_info->uid, $clfname, 1, 'booking'));
            event(new NewLeadForAdmin($business_info->uid, 1, "new-lead-staff", $staff->staff_uid ));
        //}
                
        
        if($is_subscription_ok) {

            // Email to client
            try {
                Mail::to(trim($client->email))->send(new BookingProposalEmail($client, $inbox, $client_schedule, $live_site_token, $staff));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }

            
            
            // Email to business admin 
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingProposalEmailForBusinessAdmin($client, $inbox, $client_schedule, $live_site_token,  $staff));
            } catch (\Exception $e) {
                $email_send_message2 = $e;
            }
        } else {

            // Email to client
            try {
                Mail::to(trim($client->email))->send(new BookingProposalEmail($client, $inbox, $client_schedule, $live_site_token, $staff));
            } catch (\Exception $e) {
                $email_send_message = $e;
            }

            // Email to business admin
            try {
                Mail::to(trim($business_info->b_email))->send(new BookingLimitExceedToBusinessAdminEmail($client, $inbox, $service));
            } catch (\Exception $e) {
                $email_send_message3 = $e;
            }  
        }


         // Admin Email
        $top_admin = '';
        $top_admin = \Config::get('app.top_admin');


        try {
            Mail::to($top_admin)->send(new TopAdminBooking($client, $inbox, $client_schedule, $live_site_token, $staff));
        } catch (\Exception $e) {
            $email_send_message3 = $e;
        } 
        


        // Test Email for new Design
       // $details = "This is test email";
        /* try {
            Mail::to($top_admin)->send(new MyTestMail($client, $inbox, $client_schedule, $live_site_token, $staff));
        } catch (\Exception $e) {
            //$email_send_message3 = $e;
        }
        */


        
        /*$account_sid    = getenv("TWILIO_SID");
        $auth_token     = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number  = getenv("TWILIO_NUMBER");
        $client         = new Client($account_sid, $auth_token);*/
        
        
        //first client sms start
        /*try{
            $client_message = 'Dear '.ucfirst($request->c_first_name).' '.ucfirst($request->c_middle_name).' '.ucfirst($request->c_last_name).', Your appointment request has been received. We are currently checking our schedule and will revert with confirmation ASAP';
            $client_phone           = '+'.$country->country_code.''.$request->c_phone;
            
            $data = $client->messages->create(
                           $client_phone, array(
                               'from' => $twilio_number,
                               'body' => $client_message,
                            )
                    );
        }catch(\Exception $e){
            \Log::info('Client sms sending error....');
        }
        
        //client sms end
        
        //business sms start
        try{
            $business_message       = 'Hi, '.ucfirst($business_info->business_name).'. A new appointment request has been submitted, please confirm ASAP.';
            $country = Country::where('id', $business_info->b_country_id)->first();
            $business_admin_phone = '+'.$country->country_code.''.$business_info->b_phone;
    
            $data = $client->messages->create(
                           $business_admin_phone, array(
                               'from' => $twilio_number,
                               'body' => $business_message,
                            )
                    );
        }catch(\Exception $e){
            \Log::info('Business admin sms sending error....');
        }*/
        
        //business sms end
        
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data send success.',
            'client' => $client,
            'client_second_party' => $client_second_party,
            'client_schedule' => $client_schedule,
            'inbox' => $inbox,
            'staff' => $staff,
            'value' => $request->all(),
            'email_send_message' => $email_send_message,
            'email_send_message2' => $email_send_message2
            ]);
    }
}