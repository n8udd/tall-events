<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EventShow extends Component
{
    const GRAVTAR_COUNT = 3;

    public $event;
    public $responded;
    public $respondeesCount;

    public function mount(Event $event, $respondeesCount)
    {
        $this->event = $event;
        $this->responded = $this->event->respondees->contains(Auth::user());
        $this->respondeesCount = $respondeesCount;
    }

    public function addResponder()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $this->event->addResponder();
        $this->responded = TRUE;
        $this->respondeesCount++;
    }

    public function removeResponder()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $this->event->removeResponder();
        $this->responded = FALSE;
        $this->respondeesCount--;
    }

    public function getRespondeesProperty()
    {
        return $this->event->respondees;
    }

    public function getGravatarCountProperty(): int
    {
        return $this->respondeesCount - SELF::GRAVTAR_COUNT;
    }

    public function render()
    {
        return view('livewire.event-show');
    }
}
