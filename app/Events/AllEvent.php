<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AllEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $business_uid;

    public $notify_id;

    public $message;

    public $notify_type;

    public $clientname;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($business_uid, $clientname, $notify_id, $notify_type)
    {
        $this->business_uid = $business_uid;

        $this->notify_id = $notify_id;

        $this->notify_type = $notify_type;

        $this->clientname = $clientname;

        $this->message  = "You have new {$notify_type} from ";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['status-liked'];
    }

    
}
