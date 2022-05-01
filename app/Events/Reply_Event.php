<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Reply_Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $owner_id;
    public $auth_type;

    public function __construct($data=[])
    {
        $this->owner_id=$data['owner_id'];
        $this->auth_type = $data['auth_type'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if($this->auth_type == 'lawyer') {
            return new Channel('lawyer-reply-'.$this->owner_id);
        } else {
            return new Channel('user-reply-'.$this->owner_id);
        }
    }
}
