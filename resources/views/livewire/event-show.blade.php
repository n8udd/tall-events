<div class="flex flex-col md:flex-row w-full">
    <section class="flex flex-col w-full">
        <div class="flex flex-col sm:flex-row shadow-md w-full">
            {{-- LHS image --}}
            <div class="flex bg-{{$event->level->color}}-200 w-full">
                <div id="image" class="flex flex-col justify-center items-center p-2 my-auto w-64">
                    <x-dynamic-component :component="$event->type->name" :color="$event->level->color" />

                    <p class="flex font-bold text-center text-4xl text-{{$event->level->color}}-600 mt-4">{{$event->type->name}}</p>
                </div>
            </div>
            {{-- end LHS image --}}


            <div class="flex flex-col text-lg text-gray-700 w-full ">
                {{-- title and intro --}}
                <div class="flex flex-col bg-white p-8 w-full">
                    <div class="flex flex-col pb-4 mb-4 border-b-2 items-center justify-center text-center w-100">
                        <h1 class="flex text-4xl mb-4 text-center">
                            {{ $event->title }}
                        </h1>
                        <p class="flex text-md my-2 text-gray-400 text-center ">
                            {{$event->intro}}
                        </p>
                    </div>
                    {{-- end title and intro --}}

                    {{-- creator info --}}
                    <div class="flex mx-auto items-center my-4">
                        <img class="flex w-12 rounded-full ring ring-{{$event->level->color}}-400" src="{{$event->creator->getGravatarUrl()}}" alt="{{ $event->creator->name}}" />
                        <h3 class="flex ml-4 text-2xl">
                            {{ $event->creator->name}} <span class="pl-2 text-{{$event->level->color}}-400">RL</span>
                        </h3>
                    </div>
                    {{-- end creator info --}}

                    <div class="flex w-full items-center justify-evenly my-4">
                        <div class="flex items-center">
                            <svg class="w-8 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <h4 class="flex px-2">{{ $event->start_date }}</h4>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-8 text-{{$event->level->color}}-200 ml-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h4 class="flex px-2">{{ $event->start_time }}</h4>
                        </div>
                    </div>

                    <div class="flex my-2 w-full items-center justify-center">
                        <svg class="w-8 text-{{$event->level->color}}-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h4 class="flex ml-2 border-b-4 border-dotted">
                            <a href="https://www.google.co.uk/maps/search/{{$event->location}}" target="_blank" rel="noopener noreferrer">{{ $event->location }}</a>
                        </h4>
                    </div>

                    <div class="flex flex-col mt-8">
                        <p class="pb-4">
                            {{$event->description}}
                        </p>
                        <p class="pb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus semper vestibulum. Etiam a vehicula turpis. Duis vulputate eros vitae blandit convallis.</p>
                        <p class="">Nullam sed sagittis urna. Praesent sagittis pellentesque facilisis. Pellentesque fermentum, est quis eleifend congue, tortor odio consectetur metus, eu feugiat tellus urna quis augue. Etiam suscipit orci non erat semper, eu malesuada libero blandit. Morbi in tincidunt sapien. Aliquam ut pretium arcu. </p>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <aside class="flex flex-col  w-full md:w-80 md:ml-4 shadow-md items-center h-full">
        <main class="px-6 py-4 w-full bg-white text-center">
            <p class="my-4  ">
                This is an <span class="text-{{$event->level->color}}-600 border-b-2 border-dotted cursor-pointer" title="{{ $event->level->description }}">{{ $event->level->name }}</span> {{ $event->type->name}}
            </p>
            <div class="flex flex-row justify-center items-center mt-8">
                <span class="flex mr-2">You are</span>
                @if(!$this->responded)
                <button wire:click.prevent="addResponder" class="flex bg-{{$event->level->color}}-200 py-2 px-4 text-{{$event->level->color}}-600 hover:text-white hover:bg-{{$event->level->color}}-600">
                    <span>Not going</span>
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-2 h-6 w-6">
                        <path d="M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" stroke-width="2" />
                    </svg>
                </button>
                @elseif($this->responded)
                <button wire:click.prevent="removeResponder" class="flex bg-{{$event->level->color}}-200 py-2 px-4 text-{{$event->level->color}}-600 hover:text-white hover:bg-{{$event->level->color}}-600">
                    <span>Going</span>
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-2 h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                @endif
            </div>
            <div class="my-8">
                <span id="spaces_filled" class="text-{{$event->level->color}}-600">{{ $respondeesCount }}</span> @if($event->max_attendees)of
                <span id="all_spaces" class="text-{{$event->level->color}}-600">{{ $event->max_attendees }}</span>@endif spaces filled.
            </div>

            <div class="flex justify-center items-center m-4">
                <ul class="flex flex-row-reverse justify-end">
                    @foreach($this->respondees as $respondee)
                    @if( $loop->iteration <4) <li class="bg-cover bg-center w-12 h-12 rounded-full border-2 border-white @if(!$loop->last) -ml-3 @endif" style="background-image: url({{$respondee->getGravatarUrl()}})" title="{{$respondee->name}}">
                        </li>
                        @endif
                        @endforeach
                </ul>
                @if($this->gravatar_count > 0)
                <ul>
                    <li class="w-12 h-12 ml-3 rounded-full border-2 border-gray-400 text-sm font-bold text-gray-700 flex justify-center items-center">...+{{$this->gravatar_count}}</li>
                </ul>
                @endif
            </div>
        </main>
        <div class="flex flex-col p-4 bg-gray-200 border-t-4 border-gray-100 font-mono text-xs w-full">
            <p class="w-full text-right">Created {{ $event->created_at->diffForHumans() }}</p>
            <p class="w-full text-right">Updated {{ $event->updated_at->diffForHumans() }}</p>
        </div>
    </aside>

</div>
