<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }} - List of events
        </h2>
    </x-slot>

    <main class="container flex flex-col mt-4 pb-8 lg:flex-row mx-auto ">

        <livewire:events.index />

    </main>
</x-app-layout>
