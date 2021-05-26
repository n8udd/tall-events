<?php

namespace App\Http\Livewire\Events;

use App\Models\Type;
use App\Models\Level;
use Livewire\Component;

class Create extends Component
{
    public $types;
    public $levels;

    public function mount()
    {
        $this->types = Type::all();
        $this->levels = Level::all();
    }

    public function render()
    {
        return view('livewire.events.create');
    }
}
