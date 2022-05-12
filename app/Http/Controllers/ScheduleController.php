<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Event;
use Carbon\Carbon;
use App\Model\Inbox;
use App\Model\Staff;
use App\Model\Client;
use App\GoogleAccount;
use App\Model\Country;
use App\Model\Service;
use App\Model\Business;
use App\Model\Timezone;
use App\Model\LiveSiteSeo;
use App\Model\Conversation;

use App\Model\LiveSiteStyle;
use Illuminate\Http\Request;
use App\Model\ClientSchedule;
use App\Model\LiveSiteAction;
use App\Model\ServiceCategory;
use App\Model\StaffWeekWorkDay;
use Illuminate\Support\Facades\Hash;
use App\Mail\RescheduleMailForClient;
use Illuminate\Support\Facades\Session;
use App\Helpers\PackageSubscriptionCheck;


use App\Events\MessageEvent;

class ScheduleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function shedulenow($uid){
        
        
        
        $cluid          = request()->query('cluid');
        $type           = request()->query('type');
        $schedule_from  = request()->query('schedule_from');
        $inbox_uid      = request()->query('inbox_uid');
        
        //dd($inbox_uid);
        
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name', 'asc')->get();

        
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
        
        
        
        
        
        $business = Business::where('uid', $uid)->first();
        
        $service_category = ServiceCategory::where('business_id', $business->id)->get();
        //ddd($service_category);
        $arr        = array();
        $arr        =   $service_category;
        
        $service    = array();
        foreach($service_category as $keys => $datas){

            $arr[$keys]['service'] = Service::where('service_category_id', $datas->id)->get();
            
            //dd($arr[$keys]['service']);
            
            foreach($arr[$keys]['service'] as $key => $data){
 
                $arr[$keys]['service'][$key]['serviceid'] = $data->id;
                
              //dd($arr);
              
                $arr[$keys]['service'][$key]['staffs'] = $this->service_wise_staffs($data->id, $uid);
                $new_staff_array = array();
                $new_staff_array = $arr[$keys]['service'][$key]['staffs'];
                foreach($new_staff_array as $keystaff => $datastaff){
                   //$arr[$key]['staffs'][$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['country_details'] = Country::where('id', $datastaff->country_id)->first();
                }
                
               
                foreach($new_staff_array as $keyswork => $datasworkdays){
                  //  $new_staff_array[$keystaff]['staffidworkid'] = $datasworkdays->id;
                    $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datasworkdays->id)->where('status', 1)->get();
                   $new_staff_array[$keyswork]['weekworkday']  =  $StaffWeekWorkDay;   
                   
                }
                //dd($arr);
               
            }
            
           
        }
        

        /*$response = [
            $arr
        ];

        return response()->json($arr, 200);*/

        
        //dd($allbusinessinfo);
        
        $b_services = $arr;
        
        $service_info = $this->newScheduleBoxServiceInfo($uid);
        
        $google_events_all_day_off = Event::where('allday', 1)->where('business_id', $business->id)->get();
        $same_date = "";
        $z = 0;
        foreach($google_events_all_day_off as $data){
            
            $z++;
            
            if($data->fulldate == $data->fulldate_end){
                //array_push($same_date, $data->fulldate);
                $same_date .= '"'.$data->fulldate.'"';
            } else {

                // Use strtotime function 
                $Variable1 = strtotime($data->fulldate); 
                $Variable_ = strtotime($data->fulldate_end);
                $Variable2 = strtotime("-1 day", $Variable_); 
                
                if( $Variable1 == $Variable2)  {
                    $same_date .= '"'.$data->fulldate.'"';
                } else {
                    // Use for loop to store dates into array 
                    // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                    for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                        $store = date('Y-m-d', $currentDate); 
                        //$same_date[] = $store;
                        //array_push($same_date, $store);
                        $same_date .= '"'.$store.'"';
                        if($Variable2 != $currentDate) {
                           $same_date .= ',';
                        }
                    } 
                }
                
            }
            
            if($z < count($google_events_all_day_off)){
                $same_date .= ',';
            }
            
        }
        
        $google_events_slot = Event::where('allday', 0)->where('business_id', $business->id)->get();
        $disable_timeslots = '';
        
        
        
        return view('schedule.newshedule',  compact('same_date', 'disable_timeslots', 'google_events_all_day_off', 'b_services', 'service_info', 'client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        //return view('live.site')->with('json', $json);
        
        
    
        
        
    }
    
    public function newshedulenow($uid){
        
        $cluid          = request()->query('cluid');
        $type           = request()->query('type');
        $schedule_from  = request()->query('schedule_from');
        $inbox_uid      = request()->query('inbox_uid');
        
        //dd($inbox_uid);
        
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name', 'asc')->get();

        
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
        
        
        
        
        
        $business = Business::where('uid', $uid)->first();
        
        $service_category = ServiceCategory::where('business_id', $business->id)->get();
        //ddd($service_category);
        $arr        = array();
        $arr        =   $service_category;
        
        $service    = array();
        foreach($service_category as $keys => $datas){

            $arr[$keys]['service'] = Service::where('service_category_id', $datas->id)->get();
            
            //dd($arr[$keys]['service']);
            
            foreach($arr[$keys]['service'] as $key => $data){
 
                $arr[$keys]['service'][$key]['serviceid'] = $data->id;
                
              //dd($arr);
              
                $arr[$keys]['service'][$key]['staffs'] = $this->service_wise_staffs($data->id, $uid);
                $new_staff_array = array();
                $new_staff_array = $arr[$keys]['service'][$key]['staffs'];
                foreach($new_staff_array as $keystaff => $datastaff){
                   //$arr[$key]['staffs'][$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['country_details'] = Country::where('id', $datastaff->country_id)->first();
                }
                
               
                foreach($new_staff_array as $keyswork => $datasworkdays){
                  //  $new_staff_array[$keystaff]['staffidworkid'] = $datasworkdays->id;
                    $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datasworkdays->id)->where('status', 1)->get();
                   $new_staff_array[$keyswork]['weekworkday']  =  $StaffWeekWorkDay;   
                   
                }
                //dd($arr);
               
            }
            
           
        }
        

        /*$response = [
            $arr
        ];

        return response()->json($arr, 200);*/

        
        //dd($allbusinessinfo);
        
        $b_services = $arr;
        
        $service_info = $this->newScheduleBoxServiceInfo($uid);
        
        $google_events_all_day_off = Event::where('allday', 1)->where('business_id', $business->id)->get();
        $same_date = "";
        $z = 0;
        foreach($google_events_all_day_off as $data){
            
            $z++;
            
            if($data->fulldate == $data->fulldate_end){
                //array_push($same_date, $data->fulldate);
                $same_date .= '"'.$data->fulldate.'"';
            } else {

                // Use strtotime function 
                $Variable1 = strtotime($data->fulldate);
                $Variable_ = strtotime($data->fulldate_end);
                $Variable2 = strtotime("-1 day", $Variable_); 
                
                if( $Variable1 == $Variable2)  {
                    $same_date .= '"'.$data->fulldate.'"';
                } else {
                  
                    // Use for loop to store dates into array 
                    // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                    for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                        $store = date('Y-m-d', $currentDate); 
                        //$same_date[] = $store;
                        //array_push($same_date, $store);
                        $same_date .= '"'.$store.'"';
                        if($Variable2 != $currentDate) {
                           $same_date .= ',';
                        }
                    }
                }
            }
            
            if($z < count($google_events_all_day_off)){
                $same_date .= ',';
            }
            
        }
        
        $google_events_slot = Event::where('allday', 0)->where('business_id', $business->id)->get();
        $disable_timeslots = '';
        
        
        
        return view('schedule.newshedule',  compact('same_date', 'disable_timeslots', 'google_events_all_day_off', 'b_services', 'service_info', 'client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        //return view('live.site')->with('json', $json);
        
        
    }
    
    
    
    
    public function online_newschedule_box($uid){
        
        
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name', 'asc')->get();

        
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
 
        $business = Business::where('uid', $uid)->first();
        
        $service_category = ServiceCategory::where('business_id', $business->id)->get();
        //ddd($service_category);
        $arr        = array();
        $arr        =   $service_category;
        
        $service    = array();
        foreach($service_category as $keys => $datas){

            $arr[$keys]['service'] = Service::where('service_category_id', $datas->id)->get();
            
            //dd($arr[$keys]['service']);
            
            foreach($arr[$keys]['service'] as $key => $data){
 
                $arr[$keys]['service'][$key]['serviceid'] = $data->id;
                
              //dd($arr);
              
                $arr[$keys]['service'][$key]['staffs'] = $this->service_wise_staffs($data->id, $uid);
                $new_staff_array = array();
                $new_staff_array = $arr[$keys]['service'][$key]['staffs'];
                foreach($new_staff_array as $keystaff => $datastaff){
                   //$arr[$key]['staffs'][$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['country_details'] = Country::where('id', $datastaff->country_id)->first();
                }
                
               
                foreach($new_staff_array as $keyswork => $datasworkdays){
                  //  $new_staff_array[$keystaff]['staffidworkid'] = $datasworkdays->id;
                    $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datasworkdays->id)->where('status', 1)->get();
                   $new_staff_array[$keyswork]['weekworkday']  =  $StaffWeekWorkDay;   
                   
                }
                //dd($arr);
               
            }
            
           
        }
        

        /*$response = [
            $arr
        ];

        return response()->json($arr, 200);*/

        
        //dd($allbusinessinfo);
        
        $b_services = $arr;
        
        //dd($b_services);
        
        $service_info = $this->newScheduleBoxServiceInfo($uid);
        
        
        
        
        $google_events_all_day_off = Event::where('allday', 1)->where('business_id', $business->id)->get();
        $same_date = "";
        $z = 0;
        foreach($google_events_all_day_off as $data){
            
            $z++;
            
            if($data->fulldate == $data->fulldate_end){
                //array_push($same_date, $data->fulldate);
                $same_date .= '"'.$data->fulldate.'"';
            } else {

                // Use strtotime function 
                $Variable1 = strtotime($data->fulldate); 
                $Variable2 = strtotime($data->fulldate_end); 
                  
                // Use for loop to store dates into array 
                // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                    $store = date('Y-m-d', $currentDate); 
                    //$same_date[] = $store;
                    //array_push($same_date, $store);
                    $same_date .= '"'.$store.'"';
                    if($Variable2 != $currentDate) {
                       $same_date .= ',';
                    }
                }
            }
            
            if($z < count($google_events_all_day_off)){
                $same_date .= ',';
            }
            
        }
        
        $google_events_slot = Event::where('allday', 0)->where('business_id', $business->id)->get();
        $disable_timeslots = '';
        
    
        return view('schedule.newschedule_box',  compact('same_date', 'disable_timeslots', 'google_events_all_day_off', 'b_services', 'service_info', 'client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        //return view('live.site')->with('json', $json);
        
        
    }
    
    private function newScheduleBoxServiceInfo($uid)
    {
        //dd($uid);
        $business = Business::where('uid', $uid)->first();
        
        $service_category = ServiceCategory::where('business_id', $business->id)->get();
        //ddd($service_category);
        $arr        = array();
        $arr        =   $service_category;
        
        
        $service    = array();
        foreach($service_category as $keys => $datas){

            $arr[$keys]['service'] = Service::where('service_category_id', $datas->id)->get();
            
            //dd($arr[$keys]['service']);
            
            foreach($arr[$keys]['service'] as $key => $data){
 
                $arr[$keys]['service'][$key]['serviceid'] = $data->id;
                
              //dd($arr);
              
                $arr[$keys]['service'][$key]['staffs'] = $this->service_wise_staffs($data->id, $uid);
                $new_staff_array = array();
                $new_staff_array = $arr[$keys]['service'][$key]['staffs'];
                foreach($new_staff_array as $keystaff => $datastaff){
                   //$arr[$key]['staffs'][$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['country_details'] = Country::where('id', $datastaff->country_id)->first();
                }
                
               
                foreach($new_staff_array as $keyswork => $datasworkdays){
                  //  $new_staff_array[$keystaff]['staffidworkid'] = $datasworkdays->id;
                    $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datasworkdays->id)->where('status', 1)->get();
                   $new_staff_array[$keyswork]['weekworkday']  =  $StaffWeekWorkDay;   
                   
                }
                //dd($arr);
               
            }
            
           
        }
        

        
          //echo '<pre>';
          //print_r($arr);
          //echo '</pre>';
    

     //  dd($arr);

        /*$response = [
            $arr
        ];*/

        return $arr;
    }
    
    private function service_wise_staffs($serviceid, $uid) {
        
        $final_staff_array = array();
        
        $business = Business::where('uid', $uid)->first();
        $staffes = Staff::where('business_id', $business->id)->get();
        
       foreach($staffes as $keys => $datas){
            
            $string =  $datas['services'];
            $str_arr = explode (",", $string);
                
            $arr_staff_service[$keys] = $str_arr;
            
            if(in_array($serviceid, $arr_staff_service[$keys]))  { 
                
               // $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datas->id)->get();
               // $arr[$key]['staffs'][$keys]['weekworkday']  =  $StaffWeekWorkDay;  
                $final_staff_array[$keys] = $datas;
                
            }  
  
        }
        
        
       // $final_staff_array = $staffes;
        
        return $final_staff_array;
        
    
    }
    
    
    public function shedulenow2($uid){
        
        $cluid = request()->query('cluid');
        $client_live_info = '';
        if($cluid){
            $client_live_info = Client::where('cl_uid', $cluid)->first();
        }
        //dd($client_live_info);
        
        $businessinfo = Business::where('uid', $uid)->first();
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name', 'asc')->get();

        
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
    
        return view('schedule.shedulewidget2',  compact('client_live_info', 'response', 'allbusinessinfo', 'uid' ,'timezone', 'country'));
        //return view('live.site')->with('json', $json);
        
        
    }
    
    
    
    
    
    /*
    
    used business nickname
    
    */
    public function booking($nickname){
        
        
        $businessinfo = Business::where('nickname', $nickname)->first();
        
        $admin_staff = Staff::where('business_id', $businessinfo->id)->where('staff_type', 'admin')->first();
        
        
           
        $livesitestyleinfo = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        
        $livesiteseoinfo = LiveSiteSeo::where('business_id', $businessinfo->id)->first();
        
        $timezone = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        
        //$country = Country::all();
        
        $country = Country::orderBy('country_name', 'asc')->get();

        
        // dd($admin_staff);
        
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
         //$businessinfo = Business::where('uid', $uid)->first();
           
        $livesiteactionsinfo    = LiveSiteAction::where('business_id', $businessinfo->id)->get();
        $livesiteseoinfo        = LiveSiteSeo::where('business_id', $businessinfo->id)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->get();
         
        $arr = array();
        
        $arr = $businessinfo;
        $arr['business_id'] = $businessinfo->id;
        $arr['actions'] = $livesiteactionsinfo;
        $arr['seo'] = $livesiteseoinfo;
        $arr['livestyle'] = $livesitestyleinfo;
        $arr['service'] = array();
        $allbusinessinfo = $arr;

        //$service_category = ServiceCategory::where('business_id', $businessinfo->id)->get();

        $service    = array();
        $service = explode(',', $admin_staff->services);
        // dd($service);
            $arb =  array();
            foreach($service as $key => $data){

                $staff = Service::where('id', $data)->first();
                if(gettype($staff) == 'object') {
                    $arb[$key] = Service::where('id', $data)->first();
                }
            }
            
            $arr['service'] = $arb;
            
            $arr['staff_country_details']   = Country::where('id', $admin_staff->country_id)->first();
            $arr['staff_weekworkday']       = StaffWeekWorkDay::where('staff_id', $admin_staff->id)->where('status', 1)->get();


        /*$response = [
            $arr
        ];

        return response()->json($arr, 200);*/


        $b_services = $arr;
        
       // dd($b_services);
        
       // $service_info = $this->ScheduleBoxServiceInfoBooking($nickname);
        //dd($admin_staff);
        
        $uid = $businessinfo->uid;
        
       // dd($uid);
        
        return view('schedule.booking_to_admin',  compact('admin_staff', 'b_services',  'allbusinessinfo', 'uid' ,'timezone', 'country'));
        //return view('live.site')->with('json', $json);
        
        
    }
    
    private function service_wise_staff_booking($serviceid, $nickname) {
        
        $final_staff_array = array();
        
        $business = Business::where('nickname', $nickname)->first();
        $staffes = Staff::where('business_id', $business->id)->get();
        
       foreach($staffes as $keys => $datas){
            
            $string =  $datas['services'];
            $str_arr = explode (",", $string);
                
            $arr_staff_service[$keys] = $str_arr;
            
            if(in_array($serviceid, $arr_staff_service[$keys]))  { 
                
               // $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datas->id)->get();
               // $arr[$key]['staffs'][$keys]['weekworkday']  =  $StaffWeekWorkDay;  
                $final_staff_array[$keys] = $datas;
                
            }  
  
        }
        
        
       // $final_staff_array = $staffes;
        
        return $final_staff_array;
        
    
    }
    
    private function ScheduleBoxServiceInfoBooking($nickname)
    {
        //dd($uid);
        $business = Business::where('nickname', $nickname)->first();
        
        $service_category = ServiceCategory::where('business_id', $business->id)->get();
        //ddd($service_category);
        $arr        = array();
        $arr        =   $service_category;
        
        
        $service    = array();
        foreach($service_category as $keys => $datas){

            $arr[$keys]['service'] = Service::where('service_category_id', $datas->id)->get();
            
            //dd($arr[$keys]['service']);
            
            foreach($arr[$keys]['service'] as $key => $data){
 
                $arr[$keys]['service'][$key]['serviceid'] = $data->id;
                
              //dd($arr);
              
                $arr[$keys]['service'][$key]['staffs'] = $this->service_wise_staff_booking($data->id, $nickname);
                $new_staff_array = array();
                $new_staff_array = $arr[$keys]['service'][$key]['staffs'];
                foreach($new_staff_array as $keystaff => $datastaff){
                   //$arr[$key]['staffs'][$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['staffid'] = $datastaff->id;
                    $new_staff_array[$keystaff]['country_details'] = Country::where('id', $datastaff->country_id)->first();
                }
                
               
                foreach($new_staff_array as $keyswork => $datasworkdays){
                  //  $new_staff_array[$keystaff]['staffidworkid'] = $datasworkdays->id;
                    $StaffWeekWorkDay =  StaffWeekWorkDay::where('staff_id', $datasworkdays->id)->where('status', 1)->get();
                   $new_staff_array[$keyswork]['weekworkday']  =  $StaffWeekWorkDay;   
                   
                }
                //dd($arr);
               
            }
            
           
        }
        

        
          //echo '<pre>';
          //print_r($arr);
          //echo '</pre>';
    

     //  dd($arr);

        /*$response = [
            $arr
        ];*/

        return $arr;
    }
    
    public function newReschedule($uid, $inboxuid){
        
        $businessinfo           = Business::where('uid', $uid)->first();
        $inbox_info             = Inbox::where('inb_uid', $inboxuid)->first();
        $staff_info             = Staff::where('id', $inbox_info->staff_id)->first();
        $staff_week_work_days   = StaffWeekWorkDay::where('staff_id', $inbox_info->staff_id)->where('status', 1)->get();
        $livesitestyleinfo      = LiveSiteStyle::where('business_id', $businessinfo->id)->first();
        $timezone               = Timezone::select('id', 'city_name', 'timezone_name', 'timezone_gmt', 'timezone_offset')->get();
        $staff_country          = Country::where('id', $staff_info->country_id)->first();
        $country                = Country::orderBy('country_name', 'asc')->get();
        $client_schedule        = ClientSchedule::where('inbox_id', $inbox_info->id)->first();
        $client                 = Client::where('id', $client_schedule->client_id)->first();
        
        $client_schedule_offset = Country::select('default_offset')->where('id', $client->country_id)->first();
        //dd($client_schedule_offset);
        $service                = Service::where('id', $client_schedule->service_id)->first();
        
        //dd($service);
        $response = [       
            'business_info'         => $businessinfo,
            'inbox_info'            => $inbox_info,
            'staff_info'            => $staff_info, 
            'staff_week_work_days'  => $staff_week_work_days,
            'livesitestyleinfo'     => $livesitestyleinfo,
            'timezone'              => $timezone,
            'staff_country'         => $staff_country,
            'country'               => $country,
            'client_schedule'       => $client_schedule,
            'client_schedule_offset'=> $client_schedule_offset->default_offset,
            'service_info'          => $service
        ];
        
       // dd($response);

        return view('schedule.reschedule',  compact('response'));
    
    }
    
    public function saveReschedule(Request $request){
        
        $sender_type = request()->query('sender_type');
        //return response()->json($sender_type);
      
        $business_info          = Business::where('id', $request->b_id)->first();
        $b_country              = Country::where('id', $business_info->b_country_id)->first();
        $business_all_clients   = Client::where('business_id', $request->b_id)->get()->count();
        $business_all_schedule  = ClientSchedule::where('business_id', $request->b_id)->get()->count();
        
        $staff          = Staff::where('id', $request->staffid)->first();
        
        $inbox_info     = Inbox::where('inb_uid', $request->inb_uid)->first();
        $inbox          = Inbox::where('inb_uid', $request->inb_uid)->first();
        $client         = Client::where('id', $inbox_info->sender_id)->first();
        $client_country = Country::where('id', $client->country_id)->first();
        $package_check  = new PackageSubscriptionCheck;
        
        $result_data    = $package_check->packageData($business_info->uid);
        $package_rule   = $result_data->package_rules;
        
        $data       = json_decode($package_rule);
        $clients    = $data->clients;
        $schedule   = $data->schedule;
        
        /*
            Subscription check
        */
        $should_b_id        = 1;
        $is_subscription_ok = false;
   
        $from   = strtotime($business_info->package_start_date);
        $from   = date('Y-m-d H:i:s', $from);
        
        $to     = strtotime($business_info->package_end_date);
        $to     = date('Y-m-d H:i:s', $to);
        
        $inbox_count = Inbox::whereBetween('created_at', [$from, $to])->where('business_id', $business_info->id)->count();
        
        $scope          = '';
        $schopeShcedule = '';
        $scopeClient    = '';
        
        if(($clients == '-1') || ($schedule == '-1')) {
            $scope                  = 'Unlimited';
            $is_subscription_ok     = true;
        } else {
            $scope = 'Others';
            if(($schedule > $inbox_count) && ($business_all_clients < $clients)) {
                $schopeShcedule         = $schedule;
                $is_subscription_ok     = true;
            } else {
               $schopeShcedule          = $inbox_count;
                $is_subscription_ok     = false;
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

        /*$package_end   = strtotime($business_info->package_end_date);
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
        }*/

        //new subscription rule end
        
        /*
            Subscription check end
        */
        
                                /*$client_schedule                     = ClientSchedule::where('inbox_id', $inbox_info->id)->first();
                                //$client_schedule->schedule_note    = $request->c_note;
                                $client_schedule->schedule_dates     = $request->dateWiseTimes;
                                $client_schedule->old_schedule_dates = $client_schedule->schedule_dates;
                                $client_schedule->timezone_name      = $request->timezonename;
                                $client_schedule->save(); */
        
        //update inbox table
        if($should_b_id == 1){
            $inbox_info->limit_exceed_status     = 1;
            $inbox_info->business_reffered_from  = $request->b_id;
        }
        $inbox_info->save();

        $length     = 11;    
	    $conv_uid   =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
	    
	    $reschedule_details = '';
	    $client_selected_dates = '';
	    $admin_selected_dates = '';
	    
	    if($sender_type == 'admin'){
    	    
    	    //$b_country = Country::where('id', $business_info->b_country_id)->first();
    	    /*
            $new_date = $date->format('D M d, Y h:i A');*/
            
            $date               = date_create($request->dateWiseTimes);
            $new_date           = date_format($date,"D M d, Y h:i A");
    	    //$reschedule_details = '<div class="new-reschedules"><div>'.'When : '.$new_date.'</div><p>'.$request->reschedule_details.'</p></div>';
    	    
    	    //new message format start
    	    
    	    $time = strtotime($request->dateWiseTimes);
            $db_date = date("Y-m-d H:i:s",$time);
                
    	    $datess = date_create($request->dateWiseTimes);
            $admin_selected_dates .= date_format($datess,"D M d, Y h:i A");
    
           
            
            $oldTZ = new \DateTimeZone($b_country->timezone_name);
            $newTZ = new \DateTimeZone($client_country->timezone_name);   // Should be client timezone
            $date = new \DateTime( $db_date, $oldTZ );
            $date->setTimezone( $newTZ );
            //echo $date->format('Y-m-d H:i:s P');
            $request_selected_dates = $date->format('D M d, Y h:i A');
            $request_selected_dates_dataformate = $date->format('Y-m-d H:i:s');
            
            
            
                        $client_schedule                     = ClientSchedule::where('inbox_id', $inbox_info->id)->first();
                        //$client_schedule->schedule_note    = $request->c_note;
                        $client_schedule->schedule_dates     = $request_selected_dates_dataformate;
                        $client_schedule->old_schedule_dates = $client_schedule->schedule_dates;
                        //$client_schedule->timezone_name      = $client_schedule->timezonename;
                        $client_schedule->save(); 
    			    
    	    $reschedule_details = '<div class="new-reschedules"><div>Admin Time : '.$admin_selected_dates.'('.$b_country->timezone_name.')</div><div>Client Time : '.$request_selected_dates.'('.$client_schedule->timezone_name.')</div><p>'.$request->reschedule_details.'</p></div>';
    	    //new message format end
	    } else {
	        //$b_country = Country::where('id', $business_info->b_country_id)->first();
    	    /*
            $new_date = $date->format('D M d, Y h:i A');*/
            
            $date               = date_create($request->dateWiseTimes);
            $new_date           = date_format($date,"D M d, Y h:i A");
    	    //$reschedule_details = '<div class="new-reschedules"><div>'.'When : '.$new_date.'</div><p>'.$request->reschedule_details.'</p></div>';
    	    
    	    //new message format start
    	    
    	    $time = strtotime($request->dateWiseTimes);
            $db_date = date("Y-m-d H:i:s",$time);
                
    	    $datess = date_create($request->dateWiseTimes);
            $client_selected_dates .= date_format($datess,"D M d, Y h:i A");
    
           
            
            $oldTZ = new \DateTimeZone($request->timezonename);
            $newTZ = new \DateTimeZone($b_country->timezone_name);
            $date = new \DateTime( $db_date, $oldTZ );
            $date->setTimezone( $newTZ );
            //echo $date->format('Y-m-d H:i:s P');
            $request_selected_dates = $date->format('D M d, Y h:i A');
            
                $client_schedule                     = ClientSchedule::where('inbox_id', $inbox_info->id)->first();
                //$client_schedule->schedule_note    = $request->c_note;
                $client_schedule->schedule_dates     = $request->dateWiseTimes;
                $client_schedule->old_schedule_dates = $client_schedule->schedule_dates;
                //$client_schedule->timezone_name      = $request->timezonename;
                $client_schedule->save(); 
                                
    			    
    	    $reschedule_details = '<div class="new-reschedules"><div>Admin Time : '.$request_selected_dates.'('.$b_country->timezone_name.')</div><div>Client Time : '.$client_selected_dates.'('.$client_country->timezone_name.')</div><p>'.$request->reschedule_details.'</p></div>';
    	    //new message format end
	    }  
	    
	    /*
	    $b_country = Country::where('id', $business_info->b_country_id)->first();
        // new Added
        $time = strtotime($request->dateWiseTimes);
        $db_date = date("Y-m-d H:i:s",$time);
        
        $oldTZ = new \DateTimeZone($request->timezonename);
        $newTZ = new \DateTimeZone($b_country->timezone_name);
        $date = new \DateTime( $db_date, $oldTZ );
        $date->setTimezone( $newTZ );
        //echo $date->format('Y-m-d H:i:s P');
        $business_new_date = $date->format('D M d, Y h:i A');
        
        $schedule_details = '<div class="new-reschedules"><div>Admin Time : '.$business_new_date.'('.$b_country->timezone_name.')</div><div>Client Time : '.$request->dateWiseTimes.'('.$request->timezonename.')</div><p>'.$request->c_note.'</p></div>';                        
        */
	    
	    try{
            $conversations = Conversation::where('inbox_id', $inbox_info->id)->get();
            foreach($conversations as $data){
                $conv = Conversation::where('id', $data->id)->first();
                $conv->confirm_button      = 'no';
                $conv->save();
            }
        }
        catch(\Exception $e){
            
        }
        
            $conversation                       = new Conversation;
            $conversation->conv_uid             = $conv_uid;
            $conversation->business_id          = $request->b_id;
            $conversation->inbox_id             = $inbox_info->id;
            $conversation->conv_subject         = '<h2>Appointment Reschedule</h2>';
            $conversation->conv_messages        = $reschedule_details;
            $conversation->reschedule_messages  = $request->reschedule_details;
            $conversation->others_value         = $new_date;
            $conversation->msg_type             = 'reschedule';
            $conversation->confirm_button       = 'yes';
            $conversation->sender_type          = $sender_type;
            $conversation->save();
        
        $email = '';
        try {
            Mail::to(trim($client->email))->send(new RescheduleMailForClient($client, $client_schedule, $business_info, $conversation, $staff));
        } catch (\Exception $e) {
            $email = $e;
        }

        event(new MessageEvent($business_info->uid, $inbox->id, $client->cl_uid , 1, 'staff-client', $staff->staff_uid, $inbox->inb_uid, $conversation,$staff));
        
        return response()->json([
            'status'            => 'success',
            'message'           => 'Data send success.',
            'client_schedule'   => $client_schedule,
            'inbox'             => $inbox_info,
            'conversation'      => $conversation,
            'email'             => $email,
            'value'             => $request->all()
        ]);
    
    }
    
    public function templateOne(){
        return view('schedule.templateOne');
    }
    
}


