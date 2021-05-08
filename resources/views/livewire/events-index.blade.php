<div class="h-full">
    <div class="mb-4">
        {{ $events->appends(request()->query())->links() }}
    </div>

    <div class="flex flex-col md:flex-row md:px-0">

        <div class="flex flex-col font-mono text-white md:mr-4 mb-4">

            <livewire:events-index-filters />

            {{-- advanced filters --}}
            <div class="bg-white shadow-md p-6">

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
        </div> {{-- Nothing in the world is as soft and yielding as water. --}}



        <div class="flex flex-col">
            @foreach($events as $event)
            <livewire:event-index :key="$event->id" :event="$event" />
            @endforeach
        </div>

    </div>

    <div class="mb-4">
        {{ $events->appends(request()->query())->links() }}
    </div>
</div>
