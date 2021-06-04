<div class="">

  <form class="w-full mx-auto mb-4 ">
    <div class="relative text-gray-400 focus-within:text-black-600">
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
      <input autofocus wire:model="search" type="search" name="search" id="search"
        class="py-3 px-4 bg-white placeholder-gray-400 text-gray-900 shadow-md border-0 w-full block pl-12 focus:outline-none"
        placeholder="search for an event...">
    </div>
  </form>

  <div x-data="{ open: false }">

    <div class="bg-white mb-4">
      <button @click="open=!open"
        class="flex flex-row justify-center font-semibold items-center hover:bg-gray-600 px-3 py-2 w-full hover:bg-white text-gray-600 hover:text-white shadow-md">
        <span x-show="open">hide filters</span>
        <span x-show="!open">show filters</span>
        <svg class="w-6 ml-4" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M19.25 4.75H4.75L9.31174 10.4522C9.59544 10.8068 9.75 11.2474 9.75 11.7016V18.25C9.75 18.8023 10.1977 19.25 10.75 19.25H13.25C13.8023 19.25 14.25 18.8023 14.25 18.25V11.7016C14.25 11.2474 14.4046 10.8068 14.6883 10.4522L19.25 4.75Z">
          </path>
        </svg>

      </button>
    </div>


    <div x-show="open">
      {{-- level --}}
      <div class="bg-white shadow-md p-6 mb-4 dark:text-white">
        <div class="mb-2">
          <div class="flex">
            <h1 class="flex mb-2 text-gray-900">Difficulty:</h1>
          </div>
          <div class="flex space-x-2 ">
            @foreach($levels as $level_item)
            <button wire:click.prevent="toggleLevel('{{$level_item->name}}')"
              class="flex pointer px-3 py-2 text-sm text-center justify-center bg-{{$level_item->color}}-600 bg-opacity-50 hover:bg-opacity-75 @if($level === $level_item->name) bg-opacity-100 font-bold @endif">{{ $level_item->name }}</button>
            @endforeach
          </div>
        </div>
      </div>
      {{-- end level --}}

      {{-- type --}}
      <div class="bg-white shadow-md p-6 max-w-md mb-4">
        <div class="mb-2">
          <div class="flex">
            <h1 class="flex mb-2 text-gray-900">Type:</h1>
          </div>
          <div class="flex flex-wrap">
            @foreach($types as $type_item)
            <button wire:click.prevent="toggleType('{{$type_item->name}}')"
              class="flex bg-opacity-50 bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2 hover:bg-opacity-75 @if($type == $type_item->name) bg-opacity-100 font-bold @else bg-gray-600 @endif">{{ $type_item->name }}</button>
            @endforeach
          </div>
        </div>
      </div>
      {{-- end type --}}

      {{-- leader led --}}
      <div class="bg-white shadow-md p-6 max-w-md mb-4">
        <div class="flex">
          <h1 class="flex mb-2 text-gray-900">Leader Led:</h1>
        </div>
        <div class="flex">
          <button wire:click.prevent="toggleLeaderLed()"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-4 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if(is_null($leaderLed)) bg-opacity-100 font-bold @endif">all</button>
          <button wire:click.prevent="toggleLeaderLed(1)"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-3 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if($leaderLed === TRUE) bg-opacity-100 font-bold @endif">yes</button>
          <button wire:click.prevent="toggleLeaderLed(0)"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-4 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if($leaderLed === FALSE) bg-opacity-100 font-bold @endif">no</button>
        </div>
      </div>
      {{-- end leader led --}}

      {{-- user attending --}}
      <div class="bg-white shadow-md p-6 max-w-md mb-4">
        <div class="flex">
          <h1 class="flex mb-2 text-gray-900">I'm Attending Only:</h1>
        </div>
        <div class="flex">
          <button wire:click.prevent="toggleMe(1)"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-4 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if($me) bg-opacity-100 font-bold @endif">yes</button>
          <button wire:click.prevent="toggleMe(0)"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-4 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if(!$me) bg-opacity-100 font-bold @endif">no</button>
        </div>
      </div>
      {{-- end user attending --}}

      <div class="bg-white shadow-md p-6 max-w-md">
        <div class="flex">
          <h1 class="flex mb-2 text-gray-900">Gender:</h1>
        </div>
        <div class="flex">
          <button wire:click.prevent="toggleGender()"
            class="flex bg-gray-900 hover:bg-gray-900 pointer px-4 py-2 mr-2 bg-opacity-50 hover:bg-opacity-75 flex-col justify-between @if(is_null($gender)) bg-opacity-100 font-bold @endif">all</button>
          <button wire:click.prevent="toggleGender('gents')"
            class="flex  opacity-50 bg-gradient-to-r from-blue-400 to-indigo-800 hover:opacity-100 pointer px-4 py-2 mr-2 flex-col justify-between @if($gender === 'gents') opacity-100 font-bold @endif ">gents</button>
          <button wire:click.prevent="toggleGender('ladies')"
            class="flex opacity-50 bg-gradient-to-r from-purple-400 to-pink-800 hover:opacity-100 pointer px-4 py-2 mr-2 flex-col justify-between @if($gender === 'ladies') opacity-100 font-bold @endif ">ladies</button>
          <button wire:click.prevent="toggleGender('mixed')"
            class="flex opacity-50 bg-gradient-to-r from-blue-400 to-pink-500 hover:opacity-100 pointer px-4 py-2 mr-2 flex-col justify-between @if($gender === 'mixed') opacity-100 font-bold @endif ">mixed</button>
        </div>
      </div>

    </div>
  </div>

  <div class="flex justify-betweenm text-gray-900 items-center cursor-pointer mt-4">
    @if($type != 'all' || $level != 'all' || $search != '' || $leaderLed !== NULL || $gender != NULL || $me == TRUE)
    <button wire:click.prevent="resetFilters()"
      class="block w-full bg-red-600 text-white hover:bg-red-900 pointer px-3 py-2 flex-col mb-4 shadow-md text-center">
      Reset Filters
    </button>
    @endif
  </div>

</div>


{{-- <div class="flex justify-between bg-white mb-4 text-gray-900 p-2  items-center">
    <div class="flex flex-row space-x-4 font-semibold items-center justify-center py-2">

      <svg class="w-6" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M4.75 8.75C4.75 7.64543 5.64543 6.75 6.75 6.75H17.25C18.3546 6.75 19.25 7.64543 19.25 8.75V17.25C19.25 18.3546 18.3546 19.25 17.25 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V8.75Z">
        </path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 4.75V8.25">
        </path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 4.75V8.25">
        </path>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M7.75 10.75H16.25"></path>
      </svg>

      <span>{{$event_count}} {{Str::plural('event', $event_count)}}</span>

</div>
</div> --}}