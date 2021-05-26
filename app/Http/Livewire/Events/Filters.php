<?php

namespace App\Http\Livewire\Events;

use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;

class Filters extends Component
{
    public $level = 'all';
    public $type = 'all';
    public $search = '';
    public $leaderLed;
    public $me = FALSE;
    public $gender = NULL;
    public $events;
    public $count;

    protected $listeners = [
        'queryStringUpdatedLevel',
        'queryStringUpdatedType',
        'queryStringUpdatedLeaderLed',
        'queryStringUpdatedGender',
        'queryStringUpdatedMe',
        'updatedCount',
    ];

    public function mount($level, $type, $search, $leaderLed, $count, $gender, $me)
    {
        $this->gender = $gender;
        $this->level = $level;
        $this->type = $type;
        $this->search = $search;
        $this->leaderLed = $leaderLed;
        $this->me = $me;
        $this->count = $count;
    }

    public function render()
    {
        return view('livewire.events.filters', [
            'types' => Type::get(),
            'levels' => Level::get(),
            'event_count' => $this->count,
        ]);
    }

    public function updatedCount($count)
    {
        $this->count = $count;
    }

    public function updatedSearch($search_string)
    {
        if ($search_string > 3) {
            $this->emit('queryStringUpdatedSearch', $search_string);
        } else {
            $this->emit('queryStringUpdatedSearch', '');
        }
    }

    public function toggleType($newType)
    {
        $setType = null;
        if ($newType == $this->type) {
            $setType = 'all';
        } else {
            $setType = $newType;
        }
        $this->emit('queryStringUpdatedType', $setType);
    }

    public function toggleMe(bool $newMe)
    {
        $this->emit('queryStringUpdatedMe', $newMe);
    }


    public function toggleLevel($newLevel)
    {
        $setLevel = null;
        if ($newLevel == $this->level) {
            $setLevel = 'all';
        } else {
            $setLevel = $newLevel;
        }
        $this->emit('queryStringUpdatedLevel', $setLevel);
    }

    public function toggleLeaderLed($leaderLed = NULL)
    {
        $toSet = isset($leaderLed) ? (bool) $leaderLed : NULL;
        $this->emit('queryStringUpdatedLeaderLed', $toSet);
    }

    public function toggleGender($gender = NULL)
    {
        // dd($gender);
        if (in_array($gender, ['mixed', 'gents', 'ladies'])) {
            $setGender = $gender;
        } else {
            $setGender = NULL;
        }
        $this->gender = $setGender;
        $this->emit('queryStringUpdatedGender', $setGender);
    }

    public function queryStringUpdatedType($newType)
    {
        $this->type = $newType;
    }

    public function queryStringUpdatedLevel($newLevel)
    {
        $this->level = $newLevel;
    }

    public function queryStringUpdatedSearch($newSearch)
    {
        $this->search = $newSearch;
    }

    public function queryStringUpdatedLeaderLed($newLeaderLed)
    {
        $this->leaderLed = $newLeaderLed;
    }

    public function queryStringUpdatedGender($gender)
    {
        $this->gender = $gender;
    }

    public function queryStringUpdatedMe($me)
    {
        $this->me = $me;
    }

    public function resetFilters()
    {
        $this->level = 'all';
        $this->type = 'all';
        $this->search = '';
        $this->leaderLed = NULL;
        $this->gender = NULL;
        $this->me = FALSE;
        $this->emit('queryStringUpdatedLevel', $this->level);
        $this->emit('queryStringUpdatedType', $this->type);
        $this->emit('queryStringUpdatedSearch', $this->search);
        $this->emit('queryStringUpdatedLeaderLed', $this->leaderLed);
        $this->emit('queryStringUpdatedGender', $this->gender);
        $this->emit('queryStringUpdatedMe', $this->me);
    }
}
