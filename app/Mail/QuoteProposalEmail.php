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
use App\Model\LiveSiteToken;

class QuoteProposalEmail extends Mailable
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
    public function __construct($service, $client, $inbox, $quote, $live_site_token)
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
        
        //$service        = Service::where('business_id', $quote->business_id)->first();
        $business       = Business::where('id', $client->business_id)->first();
        $country        = Country::where('id', $inbox->inbox_country_id)->first();
        $LiveSiteStyle  = LiveSiteStyle::where('business_id', $quote->business_id)->first();

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

        
        
        $no_reply = \Config::get('app.no_reply');
                    
        return $this->from($no_reply, ucfirst($business->business_name))
                    ->subject($LiveSiteStyle->quote_email_subject)
                    ->view('emails.quote_proposal_new', compact('client', 'business', 'country', 'LiveSiteStyle', 'live_site_token'));
                    //->view('emails.getaqoute2', compact('service'));
    }
}
