<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;

class EventFilters extends Component
{
    public $events;
    public $levels;
    public $types;

    public function mount()
    {
        $this->events = Event::where('start_dt', '>', now())->with(['level', 'type', 'respondees'])->get();
        $this->levels = Level::get()->pluck('id', 'name')->toArray();
        $this->types  = Type::get()->pluck('id', 'name')->toArray();
    }

    public function render()
    {
        return view('livewire.event-filters', ['events' => $this->events, 'levels' => $this->levels, 'types' => $this->types]);
    }
}
