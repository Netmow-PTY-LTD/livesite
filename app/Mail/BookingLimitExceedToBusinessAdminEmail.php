<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Service;
use App\Model\Business;
use App\Model\Country;
use App\Model\LiveSiteStyle;

class BookingLimitExceedToBusinessAdminEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $inbox;
    public $service;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($service, $client, $inbox)
    {
        $this->client = $client;
        $this->inbox  = $inbox;
        $this->service  = $service;
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

        //$service = Service::where('business_id', $inbox->business_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $inbox->business_id)->first();
        $business = Business::where('id', $inbox->business_id)->first();
        $country  = Country::where('id', $inbox->inbox_country_id)->first();

        $multiple_email = array();
        $salitse_email = array();
        if($business->multiple_email !="") {
            $multiple_email = explode(",", $business->multiple_email);
        } else {
            $multiple_email = [];
        }

          
        foreach ($multiple_email as $key => $value) {
           if(filter_var(trim($value), FILTER_VALIDATE_EMAIL)) {
              //  echo 'Valid :'.$value.'<br/>';
                array_push($salitse_email, $value);
            } else {
                //echo 'InValid :'.$value.'<br/>';
            }
        }
        

        
        $no_reply = \Config::get('app.no_reply');
        
        return $this->cc($salitse_email)
                    ->from($no_reply, '*** ***')
                    ->subject($inbox->subject.' From, *** ***')
                    ->view('emails.booking_limit_exceed_for_business_admin', compact('business', 'country', 'LiveSiteStyle'));
                
    }
}