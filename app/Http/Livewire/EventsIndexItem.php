<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EventsIndexItem extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function getRespondedProperty(): bool
    {
        return $this->event->respondees->contains(Auth::user());
    }

    public function render()
    {
        return view('livewire.events-index-item');
    }
}
