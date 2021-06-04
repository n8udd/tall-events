<div>
  <div class="my-4">
    <h4 class="font-semibold cursor-pointer my-4" wire:click="$toggle('showModal')">Invited:
      <span class="text-{{$event->level->color}}-600">
        {{$event->invitees->count()}}
      </span>
    </h4>
  </div>

  @if($showModal)
  <div id="invited-modal">
    <div class="fixed inset-0 bg-black dark:bg-black opacity-80 cursor-pointer" wire:click="$toggle('showModal')">
    </div>

    <div class="bg-white shadow-md px-4 max-w-md m-auto fixed inset-0 h-auto max-h-96 overflow-auto z-20">

      <div class="flex flex-row justify-between items-center">
        <div></div>
        <h1 class="mt-6 text-2xl text-gray-900 text-center">Invited ({{ $event->invitees->count() }}):</h1>
        <div class="order-last cursor-pointer" wire:click="$toggle('showModal')">
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
              clip-rule="evenodd" />
          </svg>
        </div>
      </div>

      <div class="flex m-4">
        <ul class="flex flex-col mb-4 space-y-2 w-full">
          @foreach ($event->invitees as $invitee)
          <li class="flex flex-row items-center text-lg border-b-2 p-4 w-full">
            <img class="flex w-8 h-8 rounded-full mr-2" src="{{$invitee->getGravatarUrl()}}"
              alt="{{ $invitee->name}}" />
            <div class="flex flex-1 justify-between items-center">
              <h3>
                {{$invitee->name}}
              </h3>
              @if(in_array($invitee->id, $attending))
              <span
                class="bg-{{$event->level->color}}-200 text-{{$event->level->color}}-600 px-3 py-2 justify-self-end">
                attending
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