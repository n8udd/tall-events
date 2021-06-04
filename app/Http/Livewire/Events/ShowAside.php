<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class ShowAside extends Component
{
    public Event $event;

    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateResponse',
        ];
    }

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function toggleCancelled()
    {
        $this->event->toggleCancelled();
        return redirect(route('events.show', $this->event));
    }

    public function toggleDeleted()
    {
        $this->event->toggleDeleted();
        session()->flash('status', 'Event Deleted!');
        return redirect(route('events.index'));
    }

    public function updateResponse()
    {
    }

    public function render()
    {
        $event = $this->event->refresh();
        return view('livewire.events.show-aside', compact('event'));
    }
}
