<tr class="border-b-2 border-blue-600">
    <td class="p-6">{{$user->name}}</td>
    <td class="text-center">
        @if ($attending)
        <span class="text-blue-600 px-3 py-2 disabled" disabled="disabled">attending</span>
        @elseif($invited)
        <span class="text-blue-600 px-3 py-2 disabled" disabled="disabled">invited</span>
        @else
        <button class="bg-blue-200 text-blue-600 px-3 py-2 hover:bg-blue-600 hover:text-blue-200"
            wire:click.prevent="invite({{$user->id}})">invite</button>
        @endif
    </td>
</tr>