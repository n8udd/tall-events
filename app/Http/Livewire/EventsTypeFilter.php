<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventsTypeFilter extends Component
{
    public $level = 'all';
    public $type = 'all';
    public $types;
    public $levels;
    public $events;

    protected $listeners = ['queryStringUpdatedLevel'];

    public function mount($events, $types, $levels)
    {
        $this->events = $events;
        $this->types = $types;
        $this->levels = $levels;
    }

    public function render()
    {
        $levels = $this->levels;
        $types  = $this->types;
        $level = $this->level;
        $type = $this->type;

        $typeCounts = $this->events
            ->when($this->level !== 'all', function ($query) use ($levels, $level) {
                return $query->where('level_id', $levels[$level]);
            })
            ->when($this->type !== 'all', function ($query) use ($types, $type) {
                return $query->where('type_id', $types[$type]);
            })
            ->sortBy('level.id')
            ->pluck('type.name')
            ->countBy();

        return view('livewire.events-type-filter', ['typeCounts' => $typeCounts]);
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

    public function queryStringUpdatedLevel($newLevel)
    {
        $this->level = $newLevel;
    }
}
