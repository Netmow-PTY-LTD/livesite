<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendClientLiveSiteUrl extends Mailable
{
    
    use Queueable, SerializesModels;
    
    public $client;
    public $business;
    public $live_site_token;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $live_site_token, $business)
    {
        $this->business = $business;
        $this->client   = $client;
        $this->live_site_token   = $live_site_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $client = $this->client;
        $business = $this->business;
        
        $no_reply = \Config::get('app.no_reply');
        
        return $this->from($no_reply, ucfirst($business->business_name))
                    ->subject('Please confirm your email '.ucfirst($client->firstname).' '.ucfirst($client->lastname))
                    ->view('emails.send_live_url');
    }
}
