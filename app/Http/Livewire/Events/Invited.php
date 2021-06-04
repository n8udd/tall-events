<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;

class Invited extends Component
{
    public $event;
    public $attending = [];
    public $showModal = FALSE;

    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateResponse',
            'echo:event-' . $this->event->id . '.invited,UserInvited' => 'updateInvited',
        ];
    }

    public function updateResponse()
    {
        $this->event = $this->event->refresh();
        $this->respondees = $this->event->respondees->pluck('id')->toArray();
    }

    public function updateInvited()
    {
        $this->event = $this->event->refresh();
    }

    public function render()
    {
        $this->attending = $this->event->respondees->pluck('id')->toArray();
        return view('livewire.events.invited');
    }
}
