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
use App\Model\LiveSiteToken;

class ClientSendFileEmail extends Mailable
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
        $this->business         = $business;
        $this->live_site_token  = $live_site_token;
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

        //try {
            return $this->from($no_reply, ucfirst($business->business_name))
                    ->subject('Thank you for sharing a document, '.ucfirst($inbox->inbox_firstname).' '.ucfirst($inbox->inbox_lastname))
                    ->view('emails.client_file_send', compact('service', 'business', 'country', 'LiveSiteStyle',  'client', 'live_site_token'));
                /*->attach('https://live.miyn.net/images/client_document/'.$client_document->client_file, [
                    'as' => 'document.pdf',
                    'mime' => 'application/pdf',
                ]);*/
        /*} catch (\Exception $e) {
           $email_send_message = $e;
        }*/
    }




}
