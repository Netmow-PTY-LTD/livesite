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

class TopAdminBooking extends Mailable
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
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client_schedule->business_id)->first();
        $business = Business::where('id', $client_schedule->business_id)->first();
        $country  = Country::where('id', $inbox->inbox_country_id)->first();
        
        $booking_timezone = Country::where('id', $client_schedule->time_zone_id)->first();
        $b_country = Country::where('id', $business->b_country_id)->first();
        
        $multiple_email = array();
        $salitse_email = array();
        
        $multiple_email = ['maksud.netmow@gmail.com', 'shobuj.netmow@gmail.com'];
        

          
        foreach ($multiple_email as $key => $value) {
           if(filter_var(trim($value), FILTER_VALIDATE_EMAIL)) {
              //  echo 'Valid :'.$value.'<br/>';
                array_push($salitse_email, $value);
            } else {
            	//echo 'InValid :'.$value.'<br/>';
            }
      	}
            
       $no_reply = \Config::get('app.no_reply');
       
        try {
            return $this->from($no_reply, ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                ->subject('MIYN > Booking > '.$business->business_name.' > From : '.ucfirst($inbox->inbox_firstname)." ".ucfirst($inbox->inbox_lastname))
                //->view('emails.booking_proposal_for_business_admin', compact('service', 'business'));
                ->view('emails.booking_proposal_for_business_admin_new', compact('service', 'business', 'country', 'b_country', 'booking_timezone', 'LiveSiteStyle', 'staff'));
        } catch (\Exception $e) {
           $email_send_message = $e;
        }
       
    }
}
