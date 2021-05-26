<?php

namespace App\Http\Livewire\Events;

use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use App\Events\UserResponded;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    const GRAVTAR_COUNT = 3;

    public Event    $event;
    public bool     $response;
    public          $respondees;

    public function getListeners()
    {
        return [
            'echo:event.' . $this->event->id . ',UserResponded' => 'updateResponse',
        ];
    }

    public function mount(Event $event)
    {
        $this->event = Event::with(['creator', 'level', 'type', 'respondees'])->withCount('respondees')->find($event->id);
        $this->response = $this->event->respondees->contains(Auth::user());
        $this->respondees = $this->event->respondees;
    }

    public function updateResponse()
    {
        $this->respondees = Event::with('respondees')->find($this->event->id)->respondees;
    }

    public function toggleResponse($user_id)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $this->response = $this->event->toggleResponse($user_id);
        broadcast(new UserResponded($this->event->id, $user_id));
    }

    public function getGravatarCountProperty(): int
    {
        return $this->respondees->count() - SELF::GRAVTAR_COUNT;
    }

    public function toggleCancelled(): void
    {
        $this->event->toggleCancelled();
    }

    public function toggleDeleted(): void
    {
        $this->event->toggleDeleted();
    }

    public function render()
    {
        return view('livewire.events.show');
    }
}
