<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;

    public $notify_id;

    public $message;

    public $notify_type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $notify_id, $notify_type)
    {
        $this->user_id = $user_id;
        $this->notify_id = $notify_id;
        $this->notify_type = $notify_type;
        $this->message  = "{$user_id} you have new {$notify_type}";
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
