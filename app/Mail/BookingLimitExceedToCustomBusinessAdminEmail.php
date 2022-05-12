<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Business;


class BookingLimitExceedToCustomBusinessAdminEmail extends Mailable
{
    public $client; 
    public $inbox; 
    public $custom_form;
    public $LiveSiteStyle;
    public $business_info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $custom_form, $inbox, $LiveSiteStyle, $business_info)
    {
        $this->client           = $client;
        $this->custom_form      = $custom_form;
        $this->inbox            = $inbox;
        $this->LiveSiteStyle    = $LiveSiteStyle;
        $this->business_info    = $business_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $client = $this->client;
        
        $business = Business::where('id', $client->business_id)->first();
        
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
        
        $client     = $this->client;
        $business   = $this->business_info;
        
        $no_reply = \Config::get('app.no_reply');
        
        return $this->cc($salitse_email)
                    ->from($no_reply, '*** ***')
                    ->subject($this->inbox->subject.' From, *** ***')
                    ->view('emails.booking_limit_exceed_for_business_admin', compact('business'));
                
    }
}
