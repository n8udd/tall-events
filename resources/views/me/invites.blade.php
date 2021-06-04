<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Invites
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-800 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 bg-white border-b border-gray-200 w-full">
                    <h1 class="font-semibold text-xl mb-4">My Invites:</h1>
                    <table class="table-auto w-full">
                        <thead class="text-left border-b-2 border-gray-200">
                            <th class="p-3">title</th>
                            <th class="p-3">date</th>
                            <th class="p-3">time</th>
                            <th class="p-3">view</th>
                        </thead>
                        <tbody>
                            @foreach ($invites as $invite)
                            <tr>
                                <td class="p-3">{{$invite->title}}</td>
                                <td class="p-3">{{$invite->start_date->toDateString()}}</td>
                                <td class="p-3">{{$invite->start_time}}</td>
                                <td class="p-3">
                                    <a href="{{route('events.show', $invite)}}"
                                        class="text-blue-500 hover:underline">view</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>