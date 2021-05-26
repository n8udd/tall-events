<div class="h-full w-full">


    <div class="flex flex-col md:flex-row w-full md:mt-4">

        <div class="flex flex-col font-mono text-white md:mr-4 md:w-1/3">
            <livewire:events.filters :event="$events" :level="$level" :type="$type" :search="$search"
                :leaderLed="$leaderLed" :count="$count" :gender="$gender" :me="$me" />
        </div>

        <div class=" flex flex-col md:w-2/3"> {{-- @if($events->hasPages())
            <div class="pb-4">
                {{ $events->appends(request()->query())->links() }} </div> @endif --}} @forelse($events as $event)
        <livewire:events.index-item :key="$event->id" :event="$event" />
        @empty
        <div>No events found...</div>
        @endforelse
        {{ $events->appends(request()->query())->links() }}
    </div>

</div>
</div>