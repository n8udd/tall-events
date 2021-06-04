<?php

namespace App\Http\Livewire\Events;

use App\Http\Livewire\Events\traits\QueryString;
use App\Models\Type;
use App\Models\Level;
use Livewire\Component;

class Filters extends Component
{
    use QueryString;

    public $count;
    const GENDERS = ['mixed', 'ladies', 'gents'];

    protected $listeners = [
        'countUpdated',
        'queryStringUpdated',
    ];

    public function render()
    {
        return view('livewire.events.filters', [
            'types' => Type::get(),
            'levels' => Level::get(),
            'event_count' => $this->count,
        ]);
    }

    public function countUpdated($count)
    {
        $this->count = $count;
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 3) {
            $this->emit('queryStringUpdated', [
                'key' => 'search',
                'value' => $this->search
            ]);
        }
        // else {
        //     $this->emit('queryStringUpdated', [
        //         'key' => 'search',
        //         'value' => ''
        //     ]);
        // }
    }

    public function toggleType($newType)
    {
        $setType = null;
        if ($newType == $this->type) {
            $setType = 'all';
        } else {
            $setType = $newType;
        }

        $this->emit('queryStringUpdated', [
            'key' => 'type',
            'value' => $setType
        ]);
    }

    public function toggleMe(bool $newMe)
    {
        $this->emit('queryStringUpdated', [
            'key' => 'me',
            'value' => $newMe
        ]);
    }


    public function toggleLevel($newLevel)
    {
        $setLevel = null;
        if ($newLevel == $this->level) {
            $setLevel = 'all';
        } else {
            $setLevel = $newLevel;
        }
        $this->emit('queryStringUpdated', [
            'key' => 'level',
            'value' => $setLevel
        ]);
    }

    public function toggleLeaderLed($leaderLed = NULL)
    {
        $toSet = isset($leaderLed) ? (bool) $leaderLed : NULL;

        $this->emit('queryStringUpdated', [
            'key' => 'leaderLed',
            'value' => $toSet
        ]);
    }

    public function toggleGender($gender = NULL)
    {
        $setGender = in_array($gender, SELF::GENDERS) ? $gender : NULL;

        $this->gender = $setGender;
        $this->emit('queryStringUpdated', [
            'key' => 'gender',
            'value' => $setGender
        ]);
    }

    public function resetFilters()
    {
        $filters = [
            [
                'key' => 'level',
                'value' => 'all'
            ],
            [
                'key' => 'type',
                'value' => 'all'
            ],
            [
                'key' => 'search',
                'value' => ''
            ],
            [
                'key' => 'leaderLed',
                'value' => NULL
            ],
            [
                'key' => 'gender',
                'value' => NULL
            ],
            [
                'key' => 'me',
                'value' => FALSE
            ],
        ];

        foreach ($filters as $filter) {
            $key = $filter['key'];
            $value = $filter['value'];

            $this->$key = $value;

            $this->emit('queryStringUpdated', [
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
