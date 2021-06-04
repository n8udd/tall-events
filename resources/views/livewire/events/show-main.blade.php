<main class="flex flex-col lg:flex-row w-full mb-4 shadow-md">

  {{-- LHS image --}}
  <div class="bg-{{$event->level->color}}-200 p-4">
    <div id="image"
      class="flex flex-row w-full content-center items-center text-{{$event->level->color}}-600 justify-center space-x-4 align-middle my-auto h-full">

      <x-dynamic-component :component="'img.' . $event->type->name" :color="$event->level->color" />
      <p class="font-bold text-center text-6xl h-auto my-auto">{{$event->type->name}}</p>

    </div>
  </div>
  {{-- end LHS image --}}

  {{-- RHS content --}}
  <div class="flex flex-col bg-white p-4 md:p-8 text-lg text-gray-700 w-full">

    {{-- title and intro --}}
    <div class="flex flex-col pb-4 mb-4 border-b-2 items-center justify-center text-center w-100">
      <h1 class="flex text-4xl mb-4 text-center">
        {{ $event->title }}
      </h1>
      @if($event->gender != 'mixed')
      <div
        class="py-3 text-4xl font-semibold dark:text-white @if($event->gender === 'gents') bg-gradient-to-r from-blue-200 to-blue-800  @else bg-gradient-to-r from-purple-400 to-pink-500  @endif text-white w-full my-2">
        {{$event->gender}} only
      </div>
      @endif
      <p class="flex text-md my-2 text-gray-400 text-center ">
        {!!$event->intro!!}
      </p>
    </div>
    {{-- end title and intro --}}

    {{-- date/time --}}
    <div class="flex w-full items-center justify-evenly my-4 font-mono">
      <div class="flex items-center">
        <svg class="h-8 w-8 text-{{$event->level->color}}-200" viewBox="0 0 1000 1000" fill="currentColor"
          stroke="currentColor">
          <g>
            <path d="M451,59h196v98H451V59z" />
            <path
              d="M622.5,353c147,0,269.5,122.5,269.5,269.5c0,147-122.5,269.5-269.5,269.5C475.5,892,353,769.5,353,622.5C353,475.5,475.5,353,622.5,353 M622.5,255C421.6,255,255,416.7,255,622.5S421.6,990,622.5,990C823.4,990,990,828.3,990,622.5S828.3,255,622.5,255L622.5,255z" />
            <path
              d="M622.5,558.8c-39.2,0-73.5,34.3-73.5,73.5c0,39.2,34.3,73.5,73.5,73.5s73.5-34.3,73.5-73.5C696,588.2,661.7,558.8,622.5,558.8L622.5,558.8z" />
            <path
              d="M622.5,647c-14.7,0-24.5-9.8-24.5-24.5v-196c0-14.7,9.8-24.5,24.5-24.5s24.5,9.8,24.5,24.5v196C647,637.2,637.2,647,622.5,647z" />
            <path
              d="M794,671.5H647c-14.7,0-24.5-9.8-24.5-24.5s9.8-24.5,24.5-24.5h147c14.7,0,24.5,9.8,24.5,24.5S808.7,671.5,794,671.5z" />
            <path
              d="M451,10h-49c-24.5,0-49,19.6-49,49v147c0,29.4,19.6,49,49,49h49c29.4,0,49-19.6,49-49V59C500,29.6,480.4,10,451,10z M451,206h-49V59h49V206z" />
            <path
              d="M255,59c0-29.4-19.6-49-49-49h-49c-29.4,0-49,19.6-49,49v147c0,29.4,19.6,49,49,49h49c29.4,0,49-19.6,49-49V59z M206,206h-49V59h49V206z" />
            <path
              d="M745,59c0-29.4-19.6-49-49-49h-49c-29.4,0-49,19.6-49,49v147c0,29.4,19.6,49,49,49h49c29.4,0,49-19.6,49-49V59z M696,206h-49V59h49V206z" />
            <path
              d="M230.5,696c-39.2,0-73.5-34.3-73.5-73.5s34.3-73.5,73.5-73.5c39.2,0,73.5,34.3,73.5,73.5S269.7,696,230.5,696z M230.5,598c-14.7,0-24.5,9.8-24.5,24.5s9.8,24.5,24.5,24.5c14.7,0,24.5-9.8,24.5-24.5S245.2,598,230.5,598z" />
            <path
              d="M230.5,451c-39.2,0-73.5-34.3-73.5-73.5s34.3-73.5,73.5-73.5c39.2,0,73.5,34.3,73.5,73.5S269.7,451,230.5,451z M230.5,353c-14.7,0-24.5,9.8-24.5,24.5c0,14.7,9.8,24.5,24.5,24.5c14.7,0,24.5-9.8,24.5-24.5C255,362.8,245.2,353,230.5,353z" />
            <path d="M206,59h196v98H206V59z" />
            <path d="M794,382.4l98,73.5V157c0-53.9-44.1-98-98-98h-98v98h98V382.4z" />
            <path d="M343.2,794H108V157h49V59h-49c-53.9,0-98,44.1-98,98v637c0,53.9,44.1,98,98,98h323.4L343.2,794z" />
          </g>
        </svg>
        <h4 class="flex px-2">{{ $event->getFormattedStartDate() }}</h4>
        @if($event->start_time)
        <span class="text-{{$event->level->color}}-400">@</span>
        <h4 class="flex px-2">{{ $event->getFormattedStartTime() }}</h4>
        @endif
      </div>
    </div>
    {{-- end date/time --}}

    {{-- location --}}
    <div class="flex my-2 w-full items-center justify-center">
      <div class="flex items-center">
        <svg class="w-8 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
          </path>
        </svg>
        <h4 class="flex ml-2 border-b-4 border-dotted">
          <a href="https://www.google.co.uk/maps/search/{{urlencode($event->location)}}" target="_blank"
            rel="noopener noreferrer">{{ $event->location }}</a>
        </h4>
      </div>
    </div>
    {{-- end location --}}

    {{-- description --}}
    <div class="flex flex-col mt-8">
      <p class="pb-4">{!!$event->description!!}</p>
      <hr>
      <div class="text-gray-600 text-opacity-50 space-y-2 mt-6">
        <h4 class="text-xl text-red-400 font-semibold">Covid</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus semper vestibulum.</p>
        <p>Etiam a vehicula turpis. Duis vulputate eros vitae blandit convallis.</p>
        <p>Nullam sed sagittis urna. Praesent sagittis pellentesque facilisis.
          Pellentesque fermentum, est quis eleifend congue, tortor odio consectetur metus, eu feugiat tellus urna quis
          augue.</p>
        <p>Etiam suscipit orci non erat semper, eu malesuada libero blandit. Morbi in tincidunt sapien. Aliquam ut
          pretium
          arcu.</p>
      </div>
    </div>
    {{-- end description --}}

  </div>
  {{-- end RHS content --}}



  {{-- creator info --}}
  {{-- 
  <div class="flex mx-auto items-center my-4">
    <img class="flex w-8 rounded-full ring ring-{{$event->level->color}}-400"
  src="{{$event->creator->getGravatarUrl()}}"
  alt="{{ $event->creator->name}}" />
  <h3 class="flex ml-4 text-2xl items-center">
    {{ $event->creator->name}}
    @if ($event->creator->isSuperAdmin())
    <span class="pl-2 text-{{$event->level->color}}-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
      </svg>
    </span>
    @endif
  </h3>
  </div>
  --}}
  {{-- end creator info --}}
</main>