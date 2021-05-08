<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }} - List of events
        </h2>
    </x-slot>

    <main class="container flex flex-col mx-auto w-full mt-4">
        <livewire:event-show :event="$event" :respondeesCount="$event->respondees_count" />
    </main>
</x-app-layout>