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

class QuoteProposalEmailSendToBusinessAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $quote;
    public $inbox;
    public $service;
    public $live_site_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($service,$client, $inbox, $quote, $live_site_token)
    {
        $this->client = $client;
        $this->quote = $quote;
        $this->inbox = $inbox;
        $this->service = $service;
        $this->live_site_token = $live_site_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $client = $this->client;
        $quote = $this->quote;
        $inbox = $this->inbox;
        
        //$service = Service::where('business_id', $quote->business_id)->first();
        $business = Business::where('id', $quote->business_id)->first();
        $country        = Country::where('id', $inbox->inbox_country_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $quote->business_id)->first();
        
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
                ->from($no_reply, ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                ->subject($LiveSiteStyle->quote_email_subject.' '.ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                ->view('emails.quote_proposal_send_to_business_admin_new', compact('business', 'country', 'LiveSiteStyle'));
                    
        } catch (\Exception $e) {
           $email_send_message = $e;
        }
                    
       
    }
}
