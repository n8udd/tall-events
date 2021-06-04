<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }} - List of events
        </h2>
    </x-slot>


    @if (session('status'))
    <div class="bg-red-600 text-white p-4 mt-4">
        {{ session('status') }}
    </div>
    @endif

    <main class="container mt-4 pb-8 lg:flex-row mx-auto text-gray-600">
        <a href="{{route('events.show', $event)}}" class="flex flex-1 items-center">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M19.25 12H5"></path>
            </svg>
            <span>
                back to event</span></a>
        <h1 class="text-2xl font-semibold py-6">Interested in <span id="type"
                class="capitalize">{{$event->type->name}}</span>:</h1>
        <table class="table w-full bg-white">
            <thead class="bg-blue-600 text-blue-200">
                <th class="text-left px-4 py-6">name</th>
                <th>invite</th>
            </thead>
            <tbody>
                @foreach ($members as $user)
                @livewire('event.invite-item', ['user' => $user, 'event' => $event], key($user->id))
                @endforeach
            </tbody>
        </table>

    </main>
</x-app-layout>

<script src="https://unpkg.com/compromise"></script>
<script>
    var type = document.getElementById('type').innerHTML;
    var doc = nlp(type)
    doc.verbs().toGerund()
    document.getElementById('type').innerHTML = doc.text()
</script>