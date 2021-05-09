<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;

class EventFilters extends Component
{
    public $level = 'all';
    public $type = 'all';

    protected $listeners = ['queryStringUpdatedLevel', 'queryStringUpdatedType'];

    public function mount($level, $type)
    {
        $this->level = $level;
        $this->type = $type;
    }

    public function render()
    {
        $events = Event::where('start_dt', '>', now())->with(['level', 'type', 'respondees'])->get();
        $levels = Level::get()->pluck('id', 'name')->toArray();
        $types  = Type::get()->pluck('id', 'name')->toArray();
        $level = $this->level;
        $type = $this->type;

        $counts = $events
            ->when($level !== 'all', function ($query) use ($levels, $level) {
                return $query->where('level_id', $levels[$level]);
            })
            ->when($type !== 'all', function ($query) use ($types, $type) {
                return $query->where('type_id', $types[$type]);
            });

        $typeCounts = $counts
            ->sortBy('level.id')
            ->pluck('type.name')
            ->countBy();

        $levelCounts = $counts
            ->sortBy('level.id')
            ->pluck('level.name')
            ->countBy();

        $colours = $events->pluck('level.color', 'level.name')->toArray();

        return view('livewire.event-filters', [
            'events' => $events,
            'levels' => $levels,
            'types' => $types,
            'typeCounts' => $typeCounts,
            'levelCounts' => $levelCounts,
            'colours' => $colours
        ]);
    }

    public function toggleType($newType)
    {
        $setType = null;
        if ($newType == $this->type) {
            $setType = 'all';
        } else {
            $setType = $newType;
        }
        $this->type = $setType;
        $this->emit('queryStringUpdatedType', $this->type);
    }

    public function queryStringUpdatedType($newType)
    {
        $this->type = $newType;
    }

    public function toggleLevel($newLevel)
    {
        $setLevel = null;
        if ($newLevel == $this->level) {
            $setLevel = 'all';
        } else {
            $setLevel = $newLevel;
        }
        $this->level = $setLevel;
        $this->emit('queryStringUpdatedLevel', $this->level);
    }

    public function queryStringUpdatedLevel($newLevel)
    {
        $this->level = $newLevel;
    }
}
