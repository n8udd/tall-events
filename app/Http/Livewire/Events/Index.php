<?php

namespace App\Http\Livewire\Events;

use App\Http\Livewire\Events\traits\QueryString;
use App\Models\Type;
use App\Models\Event;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use QueryString, WithPagination;

    const GENDERS = ['mixed', 'ladies', 'gents'];
    public bool $cancelled = FALSE;
    public int $count;
    public array $levels;
    public array $types;

    protected $queryString = [
        'level' => ['except' => 'all'],
        'type' => ['except' => 'all'],
        'search' => ['except' => ''],
        'leaderLed' => ['except' => NULL],
        'me' => ['except' => FALSE],
        'cancelled' => ['except' => FALSE],
        'gender' => ['except' => NULL],
    ];

    protected $listeners = [
        'queryStringUpdated',
        'pageReset',
    ];

    public function mount()
    {
        $this->levels = Level::get()->pluck('id', 'name')->toArray();
        $this->types  = Type::get()->pluck('id', 'name')->toArray();
    }

    public function render()
    {
        $events = Event::with(['level', 'type', 'respondees'])
            ->where('start_date', '>', now())
            ->when($this->me, function ($query) {
                $query->whereHas('respondees', function ($query) {
                    $query->where('user_id', auth()->id());
                });
            })
            ->when(!$this->cancelled, function ($query) {
                return $query->whereNull('cancelled_at');
            })
            ->when(isset($this->gender) && in_array($this->gender, SELF::GENDERS), function ($query) {
                return $query->where('gender', $this->gender);
            })
            ->when(is_bool($this->leaderLed), function ($query) {
                return $query->where('leader_led', $this->leaderLed);
            })
            ->when($this->level && $this->level !== 'all', function ($query) {
                return $query->where('level_id', $this->levels[$this->level]);
            })
            ->when($this->type && $this->type !== 'all', function ($query) {
                return $query->where('type_id', $this->types[$this->type]);
            })
            ->when(strlen($this->search) >=  3, function ($query) {
                return $query
                    ->where('title', 'like', '%' . $this->search . '%');
                // ->orWhere('intro', 'like', '%' . $this->search . '%') // look at why this negates the other filters.
                // ->orWhere('type.name', 'like', '%' . $this->search . '%')
            })
            ->orderBy('start_date', 'ASC')
            ->paginate(10);

        $count = $events->total();
        $this->emit('countUpdated', $count);

        $this->count = $count;


        $data = [
            'events'    => $events,
            // 'level'     => $this->level,
            // 'type'      => $this->type,
            // 'leaderLed' => $this->leaderLed,
            // 'gender'    => $this->gender,
            // 'me'        => $this->me,
        ];

        return view('livewire.events.index', $data);
    }

    public function pageReset(): void
    {
        $this->resetPage();
    }
}
