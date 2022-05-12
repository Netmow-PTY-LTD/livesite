<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewLeadForAdmin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $business_uid;

    public $notify_id;

    public $message;

    public $notify_type;

    public $staff_uid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($business_uid, $notify_id, $notify_type, $staff_uid)
    {
        $this->business_uid     = $business_uid;
        $this->notify_id        = $notify_id;
        $this->notify_type      = $notify_type;
        $this->staff_uid        = $staff_uid;
        $this->message          = "{$business_uid} you have new {$notify_type}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['new-lead-for-staff'];
    }

    
}
