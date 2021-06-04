<div class="h-full w-full">

    <div class="flex flex-col md:flex-row w-full md:mt-4">

        <div class="flex flex-col text-white md:mr-4 md:w-1/3">
            <div class="mb-4">
                <a href="{{ route('events.create') }}"
                    class="flex flex-row bg-blue-600 text-white hover:bg-blue-900 pointer px-3 py-2 items-center justify-center text-center shadow-md font-semibold">
                    <span>
                        create new event
                    </span>
                    <svg class="w-6 ml-3" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19.25 11.25V8.75C19.25 7.64543 18.3546 6.75 17.25 6.75H6.75C5.64543 6.75 4.75 7.64543 4.75 8.75V17.25C4.75 18.3546 5.64543 19.25 6.75 19.25H11.25M17 14.75V19.25M19.25 17H14.75M8 4.75V8.25M16 4.75V8.25M7.75 10.75H16.25">
                        </path>
                    </svg>
                </a>
            </div>
            <livewire:events.filters :level="$level" :type="$type" :search="$search" :leaderLed="$leaderLed"
                :count="$count" :gender="$gender" :me="$me" />
        </div>

        <div class=" flex flex-col md:w-2/3">
            <div class="flex justify-between bg-white mb-4 text-gray-900 p-2 shadow-md items-center">
                <div class="flex flex-row space-x-4 font-semibold items-center justify-center py-2">

                    <svg class="w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 8.75C4.75 7.64543 5.64543 6.75 6.75 6.75H17.25C18.3546 6.75 19.25 7.64543 19.25 8.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V8.75Z">
                        </path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 4.75V8.25">
                        </path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 4.75V8.25">
                        </path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7.75 10.75H16.25"></path>
                    </svg>

                    <span>{{$count}} {{Str::plural('event', $count)}}</span>

                </div>
            </div>
            @forelse($events as $event)
            <livewire:events.index-item :key="$event->id" :event="$event" />
            @empty
            <div>No events found...</div>
            @endforelse
            {{ $events->appends(request()->query())->links() }}
        </div>

    </div>
</div>