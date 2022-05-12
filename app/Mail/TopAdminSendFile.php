<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Business;
use App\Model\Country;
use App\Model\Service;
use App\Model\LiveSiteStyle;

class TopAdminSendFile extends Mailable
{
    use Queueable, SerializesModels;
    public $client_document;
    public $conversation;
    public $inbox;
    public $client;
    public $business;
    public $live_site_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $client_document, $inbox, $conversation, $business, $live_site_token)
    {
        $this->client           = $client;
        $this->client_document  = $client_document;
        $this->inbox            = $inbox;
        $this->conversation     = $conversation;
        $this->business     = $business;
        $this->live_site_token     = $live_site_token;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $client         = $this->client;
        $business       = $this->business;
        $inbox          = $this->inbox;
        
        $service = Service::where('business_id', $client->business_id)->first();
        $country  = Country::where('id', $inbox->inbox_country_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client->business_id)->first();
        
        $multiple_email = array();
        $salitse_email = array();
        

        $multiple_email = ['mail@miyn.app'];
       

          
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
                ->subject('MIYN > Share File > '.$business->business_name.' > From : '.ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                ->view('emails.client_file_send_to_admin', compact('service', 'country', 'LiveSiteStyle'));
                /*->attach('https://live.miyn.net/images/client_document/'.$client_document->client_file, [
                    'as' => 'document.pdf',
                    'mime' => 'application/pdf',
                ]);*/
        } catch (\Exception $e) {
           $email_send_message = $e;
        }
    }
}
