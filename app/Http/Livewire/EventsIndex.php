<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class EventsIndex extends Component
{
    // use WithPagination;

    public function render()
    {
        $levels = Level::get()->pluck('id', 'name')->toArray();

        $events = Event::with(['level', 'type', 'respondees'])
            ->where('start_dt', '>', now())
            ->when(request()->level && request()->level !== 'all', function ($query) use ($levels) {
                return $query->where('level_id', $levels[request()->level]);
            })
            ->orderBy('start_dt')
            ->simplePaginate(3);

        return view('livewire.events-index', ['events' => $events]);
    }
}
