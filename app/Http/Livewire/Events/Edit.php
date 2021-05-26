<?php

namespace App\Http\Livewire\Events;

use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;

class Edit extends Component
{
    public $event;
    public $types;
    public $levels;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->types = Type::all();
        $this->levels = Level::all();
    }

    public function render()
    {
        return view('livewire.events.edit');
    }

    public function cancelEdit()
    {
        return redirect(route('events.show', $this->event));
    }
}
