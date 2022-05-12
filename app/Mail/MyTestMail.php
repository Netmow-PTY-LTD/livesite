<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



use App\Model\Business;
use App\Model\Service;
use App\Model\Country;
use App\Model\LiveSiteStyle;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $inbox;
    public $client_schedule;
    public $live_site_token;
    public $staff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $inbox, $client_schedule, $live_site_token, $staff)
    {
        $this->client = $client;
        $this->inbox = $inbox;
        $this->client_schedule = $client_schedule;
        $this->live_site_token = $live_site_token;
        $this->staff = $staff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $client = $this->client;
        $inbox = $this->inbox;
        $client_schedule = $this->client_schedule;
        $staff = $this->staff;
        
        $service = Service::where('business_id', $client_schedule->business_id)->first();
        
        $business = Business::where('id', $client_schedule->business_id)->first();
        $country  = Country::where('id', $inbox->inbox_country_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client_schedule->business_id)->first();
        
        $multiple_email = array();

        $multiple_email = "";
        if($business->multiple_email !="") {
            $multiple_email = explode(",", $business->multiple_email);
        } else {
            $multiple_email = [];
        }
         $no_reply = \Config::get('app.no_reply');


        /*return $this->from($no_reply)
                ->view('emails.myTestMail');*/ 

 

        return $this->from($no_reply, ucfirst($business->business_name))
                ->subject('Test :: Appointment request received by '.$business->business_name)
                ->view('emails.myTestMail', compact('service', 'business', 'country', 'LiveSiteStyle', 'staff'));
        
        
       
        
    }

}