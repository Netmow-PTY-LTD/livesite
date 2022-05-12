<?php

namespace App\Mail;

use App\Model\Business;
use App\Model\LiveSiteStyle;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomFormClientEmail extends Mailable
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
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client->business_id)->first();
        
        //$business = Business::where('id', $client->business_id)->first();
        
        //$multiple_email = explode(",", $business->multiple_email);
        //->cc($multiple_email)
        
        $no_reply = \Config::get('app.no_reply');
        
        return $this->from($no_reply, $client->firstname.' '.$client->lastname)
                    ->subject('Let\'s Start Talking.... '.$this->business_info->business_name)
                    ->view('emails.custom_dynamic_client_email', compact('LiveSiteStyle'));
    }
}
