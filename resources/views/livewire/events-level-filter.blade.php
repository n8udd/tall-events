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
        {{-- <div class="mt-8">
        <div class="flex">
            <h1 class="flex mb-2 text-gray-900">I'm attending:</h1>
        </div>
        <div class="flex">
            <button class="flex pointer px-4 py-2 text-md bg-green-600 hover:bg-green-900 mr-2">Yes(1)</button>
            <button class="flex pointer px-4 py-2 text-md bg-red-600 hover:bg-red-900 mr-2">No(1)</button>
        </div>
    </div> --}}
        {{-- end attending --}}
    </div>
</div>
