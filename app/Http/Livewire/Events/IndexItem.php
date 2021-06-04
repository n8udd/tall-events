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
    }

    public function updateAttending($response)
    {
        // $this->attending = $response["attending"];
    }

    public function render()
    {
        $this->attending = $this->event->respondees->contains(Auth::user());
        return view('livewire.events.index-item');
    }
}
