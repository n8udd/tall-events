<div class="h-full w-full">
    {{ $events->appends(request()->query())->links() }}

    <div class="flex flex-col md:flex-row w-full mt-4">

        <div class="flex flex-col font-mono text-white md:mr-4 mb-4 md:w-1/3">
            <livewire:event-filters :event="$events" :level="$level" :type="$type" />
        </div>

        <div class="flex flex-col md:w-2/3">
            @foreach($events as $event)
            <livewire:events-index-item :key="$event->id" :event="$event" />
            @endforeach
        </div>

    </div>

    {{ $events->appends(request()->query())->links() }}
</div>
