<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <main class="container flex flex-col mx-auto w-full mt-4 lg:p-4">
        <livewire:events.show :event="$event" />
    </main>
</x-app-layout>