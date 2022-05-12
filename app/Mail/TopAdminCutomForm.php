<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Business;
use App\Model\LiveSiteStyle;

class TopAdminCustomForm extends Mailable
{
    use Queueable, SerializesModels;
    public $client; 
    public $inbox; 
    public $custom_form;
    public $conversation;
    public $business_info;
    public $live_site_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $custom_form, $inbox, $conversation, $business_info, $live_site_token)
    {
        $this->client = $client;
        $this->custom_form = $custom_form;
        $this->inbox = $inbox;
        $this->conversation = $conversation;
        $this->business_info = $business_info;
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
        
        $business = Business::where('id', $client->business_id)->first();
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
        
        return $this->from($no_reply, $client->firstname.' '.$client->lastname)
                    ->subject('MIYN > Custom Form > '.$business->business_name.' > From : '.ucfirst($inbox->inbox_firstname)." ".ucfirst($inbox->inbox_lastname))
                    ->view('emails.custom_dynamic_business_email', compact('LiveSiteStyle'));
    }
}
