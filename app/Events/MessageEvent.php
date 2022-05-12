<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $business_uid;
    public $inboxid;
    public $clientuid;
    public $notify_id;
    public $notify_type;
    public $staff_uid;
    public $inb_uid;
    public $conversation;
    public $staff_info;
    public $message;
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($business_uid, $inboxid, $clientuid, $notify_id, $notify_type, $staff_uid, $inb_uid,$conversation, $staff_info)
    {
        $this->business_uid = $business_uid;

        $this->clientuid = $clientuid;

        $this->notify_id = $notify_id;

        $this->notify_type = $notify_type;

        $this->staff_uid = $staff_uid;

        $this->inboxid = $inboxid;
        
        $this->inb_uid = $inb_uid;

        $this->conversation = $conversation;
        
        $this->staff_info = $staff_info;

        $this->message  = "You have new message from {$staff_info->staffname}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['channel-client-staff-conversation'];
    }

    /*public function broadcastAs()
      {
          return 'event-client-staff-conversation';
      }*/

    
}
