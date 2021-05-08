<section class="flex flex-col mb-6 w-full">
    <div class="flex flex-col sm:flex-row shadow-md w-full">
        <div id="image" class="flex flex-col bg-{{$event->level->color}}-200 md:max-w-sm justify-center items-center p-2">
            <x-dynamic-component :component="$event->type->name" :color="$event->level->color" />
            <p class="flex font-bold text-center text-4xl text-{{$event->level->color}}-600">{{$event->type->name}}</p>
        </div>

        <div class="flex flex-col text-lg md:text-xl bg-white p-2 items-center  justify-evenly text-gray-700 w-full">

            <div class="flex flex-col items-center justify-center mx-auto text-center md:justify-start md:mb-4 md:mt-0">
                <h1 class="flex text-2xl mt-4 px-4">{{ $event->title }}</h1>
                <p class="flex text-sm mt-1 text-gray-400 px-4">{{$event->intro}}</p>
            </div>

            @if($this->responded)
            <div class="flex w-full items-center justify-center">
                <div class="flex py-2 text-{{$event->level->color}}-600 items-center justify-center">
                    <span>Going</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-2 h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            @endif

            <div class="flex w-full items-center justify-evenly my-4">
                <div class="flex px-2 items-center">
                    <svg class="w-8 md:mx-2 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h4 class="flex ml-2 text-center">{{ $event->start_date }}</h4>
                </div>
                <div class="flex my-2 px-2 items-center">
                    <svg class="w-8 md:mx-2 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h4 class="flex px-2">
                        {{ $event->start_time }}
                    </h4>
                </div>
            </div>
            <div class="flex my-2 w-full items-center justify-center">
                <svg class="w-8 md:mx-2 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <h4 class="flex ml-2 ">{{ $event->location }}</h4>
            </div>

            <div class="flex w-full items-center justify-center">
                <a href="{{ route('events.show', $event) }}" class="text-xl bg-{{$event->level->color}}-600 hover:bg-{{$event->level->color}}-900 pointer text-white px-4 py-3 mt-4 mb-2 mx-3 w-full text-center">view
                    {{ $event->type->name }} info</a>
            </div>
        </div>
    </div>
</section>
