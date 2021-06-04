<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Mail\EventUpdatedMailable;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('events.index');
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->validated());
        $event->respondees()->attach(auth()->id());

        return redirect()->route('events.show', $event);
    }

    public function show($id)
    {
        $event = Event::with(['level', 'type', 'respondees', 'invitees', 'interestedUsers'])->withCount(['invitees', 'respondees'])->findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        if (Auth::user()->isSuperAdmin() || Auth::id() === $event->creator_id) {
            return view('events.edit', ['event' => $event]);
        }
        return back();
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        foreach ($event->respondees as $respondee) {
            Mail::to($respondee->email)
                ->send(new EventUpdatedMailable($event));
        }

        return redirect()->route('events.show', $event);
    }
}
