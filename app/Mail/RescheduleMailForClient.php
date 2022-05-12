<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Model\Service;
use App\Model\LiveSiteStyle;
use App\Model\LiveSiteToken;


class RescheduleMailForClient extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $client_schedule;
    public $business_info;
    public $conversation;
    public $staff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $client_schedule, $business_info, $conversation, $staff)
    {
        $this->client = $client;
        $this->client_schedule = $client_schedule;
        $this->business_info = $business_info;
        $this->conversation = $conversation;
        $this->staff = $staff;
    }




    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $client = $this->client;
        $client_schedule = $this->client_schedule;
        $business_info = $this->business_info;
        $service = Service::where('business_id', $client->business_id)->first();
        $LiveSiteStyle = LiveSiteStyle::where('business_id', $client->business_id)->first();
        $staff = $this->staff;

    /*
      Generate Token
    */
        $len        = 20;    
        $token      =  substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),1,$len);
        
        $live_site_token                = new LiveSiteToken;
        $live_site_token->business_id   = $business_info->id;
        $live_site_token->client_id     = $client->id;
        $live_site_token->business_login = 'no';
        $live_site_token->token         = $token;
        $live_site_token->save();
                    
        return $this->from('no-reply@miyn.net', $client->firstname.' '.$client->lastname)
                    ->subject('Re-Schedule by '.$business_info->business_name)
                    ->view('emails.re_schedule_by_business_admin', compact('client', 'business_info', 'service', 'LiveSiteStyle', 'live_site_token', 'staff'));
    }
}
