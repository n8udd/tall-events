<div class="h-full">
    <div class="mb-4">
        <div>{{ $events->appends(request()->query())->links() }}</div>
    </div>

    <div class="flex flex-col md:flex-row w-full">

        <div class="flex flex-col font-mono text-white md:mr-4 mb-4 md:w-1/3">
            <livewire:event-filters :event="$events" types='$types' :levels='$levels' />
        </div>

        <div class="flex flex-col md:w-2/3">
            @foreach($events as $event)
            <livewire:events-index-item :key="$event->id" :event="$event" />
            @endforeach
        </div>

    </div>

    <div class="">
        {{ $events->appends(request()->query())->links() }}
    </div>
</div>
