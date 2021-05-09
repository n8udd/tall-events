<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class EventsIndex extends Component
{
    use WithPagination;

    public $type = 'all';
    public $level = 'all';
    public $types;
    public $levels;

    protected $queryString = ['level', 'type'];

    protected $listeners = ['queryStringUpdatedLevel', 'queryStringUpdatedType'];

    public function mount()
    {
        $this->levels = Level::get()->pluck('id', 'name')->toArray();
        $this->types  = Type::get()->pluck('id', 'name')->toArray();
        // trying to set the correct filters on page refresh
        $this->emit('queryStringUpdatedType', $this->type);
        $this->emit('queryStringUpdatedLevel', $this->level);
    }

    public function render()
    {
        $levels = $this->levels;
        $types  = $this->types;

        $events = Event::with(['level', 'type', 'respondees'])
            ->where('start_dt', '>', now())
            ->when($this->level && $this->level !== 'all', function ($query) use ($levels) {
                return $query->where('level_id', $levels[$this->level]);
            })
            ->when($this->type && $this->type !== 'all', function ($query) use ($types) {
                return $query->where('type_id', $types[$this->type]);
            })
            ->orderBy('start_dt')
            ->paginate(5);

        return view('livewire.events-index', ['events' => $events, 'levels' => $levels, 'types' => $types]);
    }

    public function queryStringUpdatedLevel($newLevel)
    {
        $this->level = $newLevel;
    }

    public function queryStringUpdatedType($newType)
    {
        $this->type = $newType;
    }
}
