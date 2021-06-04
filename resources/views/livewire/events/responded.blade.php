<div>
    <div class="my-4 cursor-pointer" wire:click="$toggle('showModal')">
        <h4 class="font-semibold">Attending:
            <span id="spaces_filled" class="text-{{$event->level->color}}-600">{{ $event->respondees->count() }}</span>
            @if($event->max_attendees)of
            <span id="all_spaces" class="text-{{$event->level->color}}-600">{{ $event->max_attendees }}</span>
            @endif
            {{-- spaces filled. --}}
        </h4>
    </div>
    <div class="flex justify-center items-center m-4" wire:click="$toggle('showModal')">
        <ul class="flex flex-row-reverse justify-end">
            @forelse($respondees as $respondee)
                @if( $loop->iteration <4)
                <li class="bg-cover bg-center w-12 h-12 rounded-full border-2 border-white cursor-pointer @if(!$loop->last) -ml-3 @endif" style="background-image: url({{ $respondee->getGravatarUrl() }})" title="{{$respondee->name}}"></li>
                @endif
            @empty
            no attendees yet
            @endforelse
        </ul>
        @if($this->gravatar_count > 0)
        <ul>
            <li class="w-12 h-12 ml-3 rounded-full border-2 border-gray-400 text-sm font-bold text-gray-700 flex justify-center items-center cursor-pointer">
                &hellip;+{{$this->gravatar_count}}
            </li>
        </ul>
        @endif
    </div>

    @if($showModal)
    <div id="attendees-modal" class="z-10">
        <div class="fixed inset-0 bg-black dark:bg-black opacity-80 cursor-pointer" wire:click="$toggle('showModal')">
        </div>

        <div class="bg-white shadow-md px-4 max-w-sm m-auto fixed inset-0 h-auto max-h-96 overflow-auto z-20">

            <div class="flex flex-row justify-between items-center">
                <div></div>
                <h1 class="mt-6 text-2xl text-gray-900 text-center">Attending ({{ $event->respondees->count() }}):</h1>
                <div class="order-last  cursor-pointer" wire:click="$toggle('showModal')">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex m-4">
                <ul class="flex flex-col mb-4 space-y-2 w-full">
                    @foreach ($event->respondees as $respondee)
                    <li class="flex flex-row items-center text-lg border-b-2 p-4 w-full">
                        <img class="flex w-8 h-8 rounded-full mr-2" src="{{$respondee->getGravatarUrl()}}"
                            alt="{{ $respondee->name}}" />
                        <div class="flex flex-1 justify-between items-center">
                            <h3>{{$respondee->name}}</h3>
                            @if(isset($respondee->pivot->is_host) && $respondee->pivot->is_host == 1)
                            <span
                                class="bg-{{$event->level->color}}-200 text-{{$event->level->color}}-600 px-3 py-2 justify-self-end">
                                host
                            </span>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>