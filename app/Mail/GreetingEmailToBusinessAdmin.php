<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Service;
use App\Model\Country;
use App\Model\LiveSiteStyle;

class GreetingEmailToBusinessAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $greeting;
    public $inbox;
    public $conversation;
    public $business;
    public $live_site_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $greeting, $inbox, $conversation, $business, $live_site_token)
    {
        $this->client = $client;
        $this->greeting = $greeting;
        $this->inbox = $inbox;
        $this->conversation = $conversation;
        $this->business = $business;
        $this->live_site_token = $live_site_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $client     = $this->client;
        $business   = $this->business;
        $inbox      = $this->inbox;
        
        $service = Service::where('business_id', $client->business_id)->first();
        $country  = Country::where('id', $inbox->inbox_country_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client->business_id)->first();
        
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

        try {
            return $this->cc($salitse_email)
                ->from($no_reply, ucfirst($inbox->inbox_firstname)." ".ucfirst($inbox->inbox_lastname))
                ->subject('New message send from '.ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                ->view('emails.greeting_to_business_admin', compact('service', 'country', 'LiveSiteStyle'));
        } catch (\Exception $e) {
           $email_send_message = $e;
        }
    }
}
