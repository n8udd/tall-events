<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="container flex flex-col mx-auto w-full mt-4 lg:p-4">
        @if($event->cancelled_at)
        <h1 class="p-4 text-white text-lg text-center w-full bg-red-600 mb-4">
            This event was cancelled <span class="underline">{{ $event->cancelled_at->diffForHumans() }}</span>.
        </h1>
        @endif
        <div class="flex flex-col md:flex-row w-full @if($event->cancelled_at) filter grayscale @endif">
            <livewire:events.show-main :event="$event" />
            @if(Auth::check())
            <livewire:events.show-aside :event="$event" />
            @endif

        </div>
    </div>
</x-app-layout>