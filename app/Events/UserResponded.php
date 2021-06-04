<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserResponded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int    $user_id;
    public Event  $event;


    public function __construct(Event $event, int $user_id)
    {
        $this->user_id   = $user_id;
        $this->event     = $event;
    }

    public function broadcastOn()
    {
        return new Channel('event.' . $this->event->id);
    }
}
