<?php

namespace App\Http\Livewire\Event;

use App\Models\Invite;
use Livewire\Component;
use App\Events\UserInvited;

class InviteItem extends Component
{
    public $user;
    public $event;
    public $invited;
    public $attending;
    public $test = TRUE;

    public function getListeners()
    {
        return [
            'echo:event-' . $this->event->id . '.invited,UserInvited' => 'updateInvited',
        ];
    }

    public function mount()
    {
    }

    public function invite($user_id)
    {
        Invite::create([
            'event_id' => $this->event->id,
            'to_user_id' => $user_id,
            'from_user_id' => auth()->id(),

        ]);

        $event = $this->event->refresh();
        broadcast(new UserInvited($event, $user_id));
    }

    public function updateInvited()
    {
        $this->event = $this->event->refresh();
        $this->invited = $this->event->invitees->contains($this->user);
    }



    public function render()
    {
        $this->invited = $this->event->invitees->contains($this->user);
        $this->attending = $this->event->respondees->contains($this->user);

        return view('livewire.event.invite-item');
    }
}
