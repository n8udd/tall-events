<section class="flex flex-col mb-6 w-full @if($event->cancelled_at) greyscale @endif">
    <div class="flex flex-col sm:flex-row shadow-md w-full">
        <div id="image" class="flex flex-col bg-{{$event->level->color}}-200 justify-center items-center p-2">
            <x-dynamic-component :component="'img.' . $event->type->name" :color="$event->level->color" />
            <p class="flex font-bold text-center text-4xl text-{{$event->level->color}}-600">{{$event->type->name}}
            </p>
        </div>

        <div
            class="flex flex-col text-lg md:text-xl bg-white {{-- @if($event->gender == 'gents') bg-blue-200 bg-opacity-50 @endif @if($event->gender == 'ladies') bg-pink-200 bg-opacity-50 @endif --}} p-2 items-center  justify-evenly text-gray-700 w-full @if($event->cancelled_at) opacity-50 @endif">

            <div class="flex flex-col items-center justify-center mx-auto text-center md:justify-start md:mb-4 md:mt-0">
                <h1 class="flex text-2xl mt-4 px-4">@if($event->leader_led) <span
                        class="text-{{$event->level->color}}-400">(</span>RL<span
                        class="text-{{$event->level->color}}-400 mr-1">)</span> @endif {{ $event->title }}</h1>
                <p class="flex text-sm mt-1 text-gray-400 px-4">{{$event->intro}}</p>
            </div>

            @if($event->cancelled_at)
            <h1 class="bg-red-600 text-white p-2 text-center mx-auto">CANCELLED</h1>
            @endif

            {{-- 
            @if($event->gender == 'gents')
                <h1 class="bg-blue-600 text-white p-2 text-center mx-auto">{{$event->gender}}</h1>
            @endif

            @if($event->gender == ' ladies') <h1 class="bg-pink-600 text-white p-2 text-center mx-auto">
                {{$event->gender}}</h1>
            @endif
            --}}

            @if($attending)
            <div class="flex w-full items-center justify-center">
                <div class="flex py-2 text-{{$event->level->color}}-600 items-center justify-center">
                    <span>Going</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="ml-2 h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            @endif

            <div class="flex w-full items-center justify-evenly m-4">
                <div class="flex px-2 items-center">
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
                            <path
                                d="M343.2,794H108V157h49V59h-49c-53.9,0-98,44.1-98,98v637c0,53.9,44.1,98,98,98h323.4L343.2,794z" />
                        </g>
                    </svg>
                    <h4 class="flex px-2">{{ $event->getFormattedStartDate() }}</h4>
                    @if($event->start_time)
                    <span class="text-{{$event->level->color}}-400">@</span>
                    <h4 class="flex px-2">{{ $event->getFormattedStartTime() }}</h4>
                    @endif
                </div>
            </div>
            <div class="flex w-full items-center justify-center">
                <a href="{{ route('events.show', $event) }}"
                    class="text-xl bg-{{$event->level->color}}-600 hover:bg-{{$event->level->color}}-900 pointer text-white p-2 m-2 w-full text-center">view
                    {{ $event->type->name }} info</a>
            </div>
        </div>
    </div>
</section>