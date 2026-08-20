<div>
    <tr class=" border-2 border-b-black border-l-transparent border-t-transparent border-r-transparent">
        <td class="w-50 px-6 py-3 manrope text-sm">{{ $booking->booking_id_number }}</td>
        <td class="w-50 text-center py-3 manrope text-sm">{{ $booking->booked_room_name }}</td>
        <td class="w-50 text-center py-3 manrope text-sm">{{ $booking->booked_room_number }}</td>
        <td class="w-50 text-center py-3 manrope text-sm">&#8358; {{ $booking->booking_amount }}</td>
        <td class="w-50 text-center py-3 manrope text-sm">{{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }}</td>
        <td class="w-50 text-center py-3">
            @if($booking->room->isCurrentlyBooked())
                <span class="px-3 py-1.5 rounded-full manrope bg-green-500 text-white text-xs font-semibold">Active</span>
            @elseif($booking->booking_expiration < now())
                <span class="px-3 py-1.5 rounded-full manrope bg-red-500 text-white text-xs font-semibold">Expired</span>
            @else
                <span class="px-3 py-1.5 rounded-full manrope bg-gray-500 text-white text-xs font-semibold">{{ ucfirst($booking->booking_status) }}</span>
            @endif
        </td>
    </tr>
</div>

