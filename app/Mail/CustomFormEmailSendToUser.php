<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Business;

class CustomFormEmailSendToUser extends Mailable
{
    use Queueable, SerializesModels;
    public $client; 
    public $inbox; 
    public $custom_form;
    public $conversation;
    public $business_info;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $custom_form, $inbox, $conversation, $business_info)
    {
        $this->client = $client;
        $this->custom_form = $custom_form;
        $this->inbox = $inbox;
        $this->conversation = $conversation;
        $this->business_info = $business_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    
    public function build()
    {
        $client = $this->client;
        
        //$business = Business::where('id', $client->business_id)->first();
        
        //$multiple_email = explode(",", $business->multiple_email);
        //->cc($multiple_email)
        
        $no_reply = \Config::get('app.no_reply');
        
        return $this->from($no_reply, $client->firstname.' '.$client->lastname)
                    ->subject('Let\'s Start Planning.... First Class Functions')
                    ->view('emails.custom_user_email');
    }
}
