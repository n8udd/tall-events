<div>
    <div id="main-filters" class="bg-white shadow-md p-6 mb-4">
        {{-- difficulty --}}
        <div class="mb-2">
            <div class="flex">
                <h1 class="flex mb-2 text-gray-900">Difficulty:</h1>
            </div>
            <div class="flex space-x-2">
                @foreach($levelCounts as $levelName=>$levelCount)
                <button wire:click.prevent="toggleLevel('{{$levelName}}')" class="flex pointer p-2 text-sm text-center justify-center bg-{{$colours[$levelName]}}-600 hover:bg-{{$colours[$levelName]}}-900 @if($level === $levelName) bg-{{$colours[$levelName]}}-900 font-bold @endif">{{ $levelName }} <br> ({{ $levelCount }})</button>
                @endforeach
            </div>
        </div>
        {{-- end difficulty --}}

        {{-- attending --}}
        {{--
        <div class="mt-8">
            <div class="flex">
                <h1 class="flex mb-2 text-gray-900">I'm attending:</h1>
            </div>
            <div class="flex">
                <button class="flex pointer px-4 py-2 text-md bg-green-600 hover:bg-green-900 mr-2">Yes(1)</button>
                <button class="flex pointer px-4 py-2 text-md bg-red-600 hover:bg-red-900 mr-2">No(1)</button>
            </div>
        </div> 
        --}}
        {{-- end attending --}}
    </div>
    <div class="bg-white shadow-md p-6 max-w-md">
        {{-- <button id="sh_button" onclick="sh_af()" class="bg-gray-600 p-2 w-full hover:bg-white hover:text-gray-600 hover:border-2 hover:border-gray-600">show advanced filters</button> --}}

        <div class="mb-2">
            <div class="flex">
                <h1 class="flex mb-2 text-gray-900">Type:</h1>
            </div>
            <div class="flex flex-wrap">
                @foreach($typeCounts as $typeName=>$typeCount)
                <button wire:click.prevent="toggleType('{{$typeName}}')" class="flex bg-gray-600 hover:bg-gray-900 pointer px-3 py-2 flex-col justify-between mb-2 mr-2 @if($type === $typeName) bg-gray-900 font-bold @endif">{{ $typeName }} <br> ({{ $typeCount }})</button>
                @endforeach
            </div>
        </div>

        {{--
            <div class="flex">
                <h1 class="mt-12 flex mb-2 text-gray-900">Leader Led:</h1>
            </div>
            <div class="flex">
                <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2  flex-col justify-between">yes</button>
                <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2  flex-col justify-between">no</button>
            </div>

            <div class="flex">
                <h1 class="mt-12 flex mb-2 text-gray-900">Ladies Only:</h1>
            </div>
            <div class="flex">
                <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">yes</button>
                <button class="flex bg-gray-600 hover:bg-gray-900 pointer px-4 py-2 mr-2 flex-col justify-between">no</button>
            </div> 
        --}}

    </div>
</div>
