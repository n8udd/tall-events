<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }} - List of events
        </h2>
    </x-slot>

    <main class="container flex flex-col mt-4 pb-8 lg:flex-row mx-auto ">

        <div class="flex flex-col lg:mr-6 h-full mb-8 font-mono text-white">

            {{-- main filters --}}
            <div class="bg-white max-w-md shadow-md p-6 mb-4">
                {{-- difficulty --}}
                <div class="mb-2">
                    <div class="flex">
                        <h1 class="flex mb-2 text-gray-900">Difficulty:</h1>
                    </div>
                    <div class="flex space-x-2">
                        @foreach($levels as $levelName=>$levelCount)
                        <button class="flex pointer p-2 text-sm bg-gray-600 hover:bg-gray-900">{{ $levelName }} <br> ({{ $levelCount }})</button>
                        @endforeach
                    </div>
                </div>
                {{-- end difficulty --}}

                {{-- attending --}}
                <div class="mt-8">
                    <div class="flex">
                        <h1 class="flex mb-2 text-gray-900">I'm attending:</h1>
                    </div>
                    <div class="flex">
                        <button class="flex pointer px-4 py-2 text-md bg-green-600 hover:bg-green-900 mr-2">Yes(4)</button>
                        <button class="flex pointer px-4 py-2 text-md bg-red-600 hover:bg-red-900 mr-2">No(56)</button>
                    </div>
                </div>
                {{-- end attending --}}
            </div>
            {{-- end main filters --}}

            {{-- advanced filters --}}
            <div class="bg-white max-w-md shadow-md p-6">

                <button id="sh_button" onclick="sh_af()" class="bg-gray-600 p-2 w-full hover:bg-white hover:text-gray-600 hover:border-2 hover:border-gray-600">show advanced filters</button>

                <div id="af" class="hidden">
                    <h1 class="text-gray-900 mb-4 uppercase text-xl mt-4">Advanced Filters:</h1>
                    <div class="mb-2">
                        <div class="flex">
                            <h1 class="flex mb-2 text-gray-900">Type:</h1>
                        </div>
                        <div class="flex flex-wrap">
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">ride
                                <br> (13)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">run
                                <br> (20)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">jeff
                                <br> (14)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">walk
                                <br> (4)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">swim
                                <br> (1)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">runfit
                                <br> (1)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">multi-sport
                                <br> (1)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">pilates
                                <br> (1)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2">yoga
                                <br> (1)</button>
                            <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2">social
                                <br> (1)</button>
                        </div>
                    </div>

                    <div class="flex">
                        <h1 class="mt-12 flex mb-2 text-gray-900">Leader Led:</h1>
                    </div>
                    <div class="flex">
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2  flex-col justify-between">yes</button>
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2  flex-col justify-between">no</button>
                    </div>

                    <div class="flex">
                        <h1 class="mt-12 flex mb-2 text-gray-900">Weekend Only:</h1>
                    </div>
                    <div class="flex">
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">yes</button>
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">no</button>
                    </div>

                    <div class="flex">
                        <h1 class="mt-12 flex mb-2 text-gray-900">Ladies Only:</h1>
                    </div>
                    <div class="flex">
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">yes</button>
                        <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">no</button>
                    </div>
                </div>

            </div>
            {{-- end advanced filters --}}


        </div>

        <div class="flex flex-col w-full px-4 md:px-0">

            {{-- {{ $events->links() }} --}}

            {{-- <div class="mt-4"> --}}
            @foreach($events as $event)
            <livewire:event-index :event="$event" />
            @endforeach
            {{-- </div> --}}

            {{-- {{ $events->links() }} --}}

        </div>

    </main>
    <script>
        function sh_af() {
            var element = document.getElementById("af");
            element.classList.toggle("hidden");

            var x = document.getElementById("sh_button");
            if (sh_button.innerHTML === "show advanced filters") {
                sh_button.innerHTML = "hide advanced filters";
            } else {
                sh_button.innerHTML = "show advanced filters";
            }
        }

    </script>
</x-app-layout>
