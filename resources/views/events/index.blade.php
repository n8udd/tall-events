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

    <main class="container flex flex-col mt-4 pb-8 lg:flex-row mx-auto ">

        <livewire:events.index />

    </main>
</x-app-layout>