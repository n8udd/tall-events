<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventsLevelFilter extends component
{
    public $level = 'all';
    public $type = 'all';
    public $types;
    public $levels;
    public $events;

    protected $listeners = ['queryStringUpdatedType'];

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

        $levelCounts = $this->events
            ->when($this->level !== 'all', function ($query) use ($levels, $level) {
                return $query->where('level_id', $levels[$level]);
            })
            ->when($this->type !== 'all', function ($query) use ($types, $type) {
                return $query->where('type_id', $types[$type]);
            })
            ->sortBy('level.id')
            ->pluck('level.name')
            ->countBy();

        $colours = $this->events->pluck('level.color', 'level.name')->toArray();

        return view('livewire.events-level-filter', ['levelCounts' => $levelCounts, 'colours' => $colours]);
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

    public function queryStringUpdatedType($newType)
    {
        $this->type = $newType;
    }
}
