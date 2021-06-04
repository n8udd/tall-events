<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserInvited implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int    $user_id;
    public Event  $event;
    public $test = "fred";


    public function __construct(Event $event, int $user_id)
    {
        $this->event     = $event;
        $this->user_id   = $user_id;
    }
    public function broadcastOn()
    {
        return new Channel('event-' . $this->event->id . '.invited');
    }
}
