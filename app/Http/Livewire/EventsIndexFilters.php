<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EventsIndexFilters extends Component
{
    public $level = 'all';

    protected $queryString = ['level'];

    public function render()
    {
        $events = Event::where('start_dt', '>', now())->with(['level', 'type', 'respondees'])->get();

        $levelCounts = $events->sortBy('level.id')->pluck('level.name')->countBy();
        $levelCounts->put('all', $events->count());

        $colours = $events->pluck('level.color', 'level.name')->toArray();
        $colours["all"] = "gray";

        return view('livewire.events-index-filters', ['levelCounts' => $levelCounts, 'colours' => $colours]);
    }

    public function setLevel($newLevel)
    {
        $this->level = $newLevel;

        return redirect()->route('events.index', [
            'level' => $this->level,
        ]);
    }
}
