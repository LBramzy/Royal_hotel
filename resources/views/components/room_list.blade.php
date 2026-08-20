<tr class="border-2 border-b-black border-l-transparent border-t-transparent border-r-transparent">
    <td class="w-50 px-6 py-3 manrope text-sm">{{ $room->room_name }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $room->room_number }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">&#8358; {{ $room->room_price }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $room->room_number_of_beds }}</td>
    {{--  <td class="w-50 text-center py-3 manrope text-sm">{{ $room->room_occupied }}</td>  --}}
    <td class="w-50 text-center py-3 manrope text-sm">
        <a href="{{ route('update.room', $room) }}" class="rounded-sm bg-gray-200 text-gray-800 px-6 py-2 hover:text-gray-300 hover:bg-[#a5793f] transition-all duration-100">Edit</a>
    </td>
    <td class="w-50 text-center py-3">
        <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST"
            onsubmit="return confirm('Delete this room and all its images? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="cursor-pointer rounded-sm bg-gray-200 text-gray-800 px-6 py-2 hover:text-gray-300 hover:bg-red-800 transition-all duration-100">
                Delete
            </button>
        </form>
        {{--  <a href="#" >Delete</a>  --}}
    </td>
</tr>
