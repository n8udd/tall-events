<aside class="flex flex-col mb-4 w-full md:w-80 md:ml-4 shadow-md items-center h-full text-gray-600">

  <section x-data="isShowingModal()" x-data="isShowingInvited()" class="px-6 py-4 w-full bg-white text-center">

    {{-- difficulty description --}}
    <p class="my-4">
      This is a <a href="{{route('events.index')}}?level={{$event->level->name}}"
        class="text-{{$event->level->color}}-600 border-b-2 border-dotted cursor-pointer"
        title="{{ $event->level->description }}">{{ $event->level->name }}</a> {{ $event->type->name}}
    </p>
    <hr>

    {{-- attending button --}}
    <livewire:events.show.respond :event="$event" />

    <hr>
    {{-- attendees modal --}}
    <livewire:events.responded :event="$event" />

    <hr>

    {{-- invited modal --}}
    <livewire:events.invited :event="$event" />

    <a class="bg-{{$event->level->color}}-200 text-{{$event->level->color}}-600 w-full block py-2 hover:bg-{{$event->level->color}}-600 hover:text-{{$event->level->color}}-200 cursor-pointer mb-4"
      href="{{route('invite.show', $event)}}">
      invite
    </a>


  </section>


  <footer class="flex flex-col p-4 bg-gray-200 border-t-4 border-gray-100 font-mono text-xs w-full">
    <p class="w-full text-right">Created {{ $event->created_at->diffForHumans() }}</p>
    <p class="w-full text-right">Updated {{ $event->updated_at->diffForHumans() }}</p>
    @if($event->cancelled_at)
    <p class="w-full text-right mt-1">Cancelled {{ $event->cancelled_at->diffForHumans() }}</p>
    @endif
    @if(Auth::id() === $event->creator_id || Auth::user()->isSuperAdmin())
    <div id="buttons" class="space-y-2">
      <a href="{{ route('events.edit', $event->id) }}"
        class="block bg-orange-500 hover:bg-orange-700 cursor-pointer text-white p-2 mt-4 text-center">edit
        event</a>
      <button wire:click.prevent="toggleCancelled()"
        class="w-full block bg-red-500 hover:bg-red-700 cursor-pointer text-white p-2 mt-4 text-center">
        @if($event->cancelled_at)
        restore cancelled
        @else
        cancel
        @endif
        event</button>
      @if (Auth::user()->isSuperAdmin())
      <button wire:click.prevent="toggleDeleted()"
        class="w-full block bg-red-800 hover:bg-red-700 cursor-pointer text-white p-2 mt-4 text-center">
        @if($event->deleted_at)
        restore deleted
        @else
        delete
        @endif
        event</button>
      @endif
    </div>
    @endif
  </footer>

  {{-- <script>
    function isShowingModal() {
        return {
          showAttending: false,
          openAttending() { this.showAttending = true },
          closeAttending() { this.showAttending = false },
          isOpenAttending() { return this.showAttending === true },
          showInvited: false,
          openInvited() { this.showInvited = true },
          closeInvited() { this.showInvited = false },
          isOpenInvited() { return this.showInvited === true },
        }
      };
  </script> --}}

</aside>