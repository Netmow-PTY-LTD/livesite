<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Service;
use App\Model\Country;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteToken;

class GreetingEmailFromClient extends Mailable
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


    /* 
     * Token generation 
     */
        $len                   = 20;    
        $token       =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
        
        $live_site_token            = new LiveSiteToken;
        $live_site_token->business_id = $business->id;
        $live_site_token->client_id = $client->id;
        $live_site_token->token     = $token;
        $live_site_token->save();
        

        $multiple_email = "";
        if($business->multiple_email !="") {
            $multiple_email = explode(",", $business->multiple_email);
        } else {
            $multiple_email = [];
        }

        $no_reply = \Config::get('app.no_reply');
        
        return $this//->cc($multiple_email)
                    ->from($no_reply, ucfirst($business->business_name))
                    ->subject('Thank you for your message')
                    ->view('emails.greeting', compact('client', 'LiveSiteStyle', 'country', 'service', 'live_site_token'));
    }
}
