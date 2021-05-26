<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class IndexItem extends Component
{
    public $event;
    public $attending;

    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateAttending',
        ];
    }

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->attending = $event->respondees->contains(Auth::user());
    }

    public function updateAttending($response)
    {
        $this->attending = $response["attending"];
    }

    public function render()
    {
        return view('livewire.events.index-item');
    }
}
