<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;

class Responded extends Component
{
    const GRAVTAR_COUNT = 3;
    public $event;
    public $respondees;
    public $showModal = FALSE;
    public $hosts = [];


    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateResponse',
        ];
    }


    public function getGravatarCountProperty(): int
    {
        return $this->event->respondees->count() - SELF::GRAVTAR_COUNT;
    }


    public function updateResponse()
    {
        $this->event = $this->event->refresh();
        $this->respondees = $this->event->respondees;
    }


    public function render()
    {
        $event = $this->event->refresh();
        $this->respondees = $this->event->respondees;
        // dd($this->respondees);
        $this->hosts = $this->event->respondees->where('is_host', 1)->pluck('user_id');

        return view('livewire.events.responded', compact('event'));
    }
}
