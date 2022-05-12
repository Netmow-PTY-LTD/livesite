<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Client as Cl;
use App\Model\MfltpAppointmentList;
use App\Model\Business;
use App\Model\Country;
use App\Model\ClientSchedule;
use App\Model\Service;
use App\Model\Inbox;
use App\Model\Conversation;



class ScheduleTest extends Controller
{
    
    
    
    public function shedule_test(){
        
        //$test_list = MfltpAppointmentList::all();
        
        $business_info  = Business::where('id', 27)->first();
        
        $rows = MfltpAppointmentList::all();
        foreach($rows as $row) {
            
            $newarra = array();
            
            $client = Cl::where('email', $row->email)->where('business_id', $business_info->id)->first();
            $country = Country::where('id', 207)->first();
            $phone = $country->country_code.''.$row->phone;
            
            if(empty($client)){
                $length = 15;    
        	    $client_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
                $client = new Cl;
                $client->cl_uid     = $client_uid;
                $client->business_id= $business_info->id;
                //$client->business_id= $should_b_id;
                $client->country_id = $country->id;
                $client->firstname  = $row->first_name;
                $client->lastname   = $row->last_name;
                $client->phone      = $phone;
                $client->email      = $row->email;
                $client->note       = trim($row->message);
                $client->status     = 'Customer';
                $client->created_at = $row->created_at;
                $client->updated_at = $row->created_at;
                //$client->save();
            }
            
            
            $newarra['client'] = $client->toArray();
           // echo '<pre>';
           // print_r($client->toArray());
           // echo '</pre>';
            
            
            
            $client_schedule = new ClientSchedule;
            $client_schedule->business_id       = $business_info->id;
            //$client_schedule->business_id       = $should_b_id;
            $client_schedule->client_id         = $client->id;
            $client_schedule->staff_id          = 61;
            $client_schedule->schedule_note     = trim($row->message);
            $client_schedule->schedule_dates    = $row->appointment_time;
            $client_schedule->service_id        = $row->app_id;
            
            $service = Service::where('id', $row->app_id)->first();
            
            $client_schedule->service_name      = $service->service_name;
            $client_schedule->service_info      = $service->service_description;
            $client_schedule->service_price     = $service->service_price;
            $client_schedule->service_currency  = $service->service_currency;
            $client_schedule->time_zone_id      = $country->default_offset;
            $client_schedule->created_at        = $row->created_at;
            $client_schedule->updated_at        = $row->created_at;
            //$client_schedule->save();
            
            $newarra['schedule'] = $client_schedule->toArray();
            
            
            
            $length2 = 10;    
    	    $inbox_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length2);
            
            $inbox = new Inbox;
            $inbox->inb_uid             = $inbox_uid;
            $inbox->inbox_firstname     = $row->first_name;
            $inbox->inbox_lastname      = $row->last_name;
            $inbox->inbox_country_id    = $country->id;
            $inbox->inbox_phone         = $phone;
            $inbox->business_id         = $business_info->id;
            //$inbox->business_id         = $should_b_id;
            $inbox->staff_id            = 61;
            $inbox->client_schedule_id  = $client_schedule->id;
            $inbox->sender_type         = 'client';
            $inbox->icon                = 'fa fa-calendar';
            $inbox->sender_id           = $client->id;
            $inbox->redirect_to         = 'conversations';
            $inbox->information_details = trim($row->message);
            $inbox->subject             = $service->service_name;
            $inbox->inbox_type          = 'inbox';
            $inbox->conversation_type   = 'schedule';
            $inbox->conversation_type_id    = $client_schedule->id;
            $inbox->created_at              = $row->created_at;
            $inbox->updated_at              = $row->created_at;
            //$inbox->save();
            
            $newarra['inbox'] = $inbox->toArray();
            
            
            $length = 11;    
    	    $conv_uid =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$length);
    	    
            $conversation = new Conversation;
            $conversation->conv_uid         = $conv_uid;
            $conversation->business_id      = $business_info->id;
            //$conversation->business_id      = $should_b_id;
            $conversation->inbox_id         = $inbox->id;
            $conversation->conv_subject     = $service->service_name;
            $conversation->conv_messages    = trim($row->message);
            //$conversation->conv_ref_info  = $request->b_id;
            $conversation->sender_type      = 'client';
            $conversation->created_at       = $row->created_at;
            $conversation->updated_at       = $row->created_at;
            //$conversation->save();
            
            $newarra['conversation'] = $conversation->toArray();
            
            echo '<pre>';
            print_r($newarra);
            echo '</pre>';
            
      
        }
           
        //dd($business_info->toArray());
        // return response()->json($business_info); 
        //return view('message.message-form', compact('allbusinessinfo'));

        
    }
    
    
}