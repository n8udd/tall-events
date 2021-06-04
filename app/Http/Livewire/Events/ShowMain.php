<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class ShowMain extends Component
{
    public Event $event;

    public function render()
    {
        return view('livewire.events.show-main');
    }
}
