<?php

namespace App\Http\Livewire\Events\Show;

use App\Models\Event;
use Livewire\Component;
use App\Events\UserResponded;
use Illuminate\Support\Facades\Auth;

class Respond extends Component
{
    public $button_disabled = FALSE;
    public $event;
    public $response;


    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateResponse',
        ];
    }


    public function toggleResponse($user_id)
    {
        if (Auth::guest()) {
            return redirect(route('login'));
        }

        $this->button_disabled = TRUE;
        $this->response = $this->event->toggleResponse($user_id);
        $event = $this->event->refresh();

        broadcast(new UserResponded($event, $user_id));
    }


    public function updateResponse()
    {
        $this->button_disabled  = FALSE;
        $this->event = $this->event->refresh();
    }


    public function render()
    {
        $event = $this->event->refresh();
        $this->response = $this->event->respondees->contains(Auth::user());

        return view('livewire.events.show.respond', compact('event'));
    }
}
