<tr class="border-2 border-b-black border-l-transparent border-t-transparent border-r-transparent">
    <td class="w-50 px-6 py-3 manrope text-sm">{{ $booking->booking_id_number }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">&#8358; {{ $booking->booking_amount }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $booking->booked_room_number }}</td>
    <td class="w-50 text-center py-3 manrope text-sm">{{ $booking->booked_user_name }}</td>
    <td class="w-54 text-center py-3 manrope text-sm px-4">
        <div class="">
            @if($booking->room->isCurrentlyBooked())
                <div class="flex items-baseline justify-between gap-2">
                    {{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }} 
                    <span class="px-6 py-1.5 rounded-full manrope bg-green-500 text-white text-xs font-semibold">Active</span>
                </div>
            @elseif($booking->booking_expiration < now())
                <div class="flex items-baseline justify-between gap-2">
                    {{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }}
                    <span class="px-6 py-1.5 rounded-full manrope bg-red-500 text-white text-xs font-semibold">Expired</span>
                </div>
            @else
                <span class="px-6 py-1.5 rounded-full manrope bg-gray-500 text-white text-xs font-semibold">{{ ucfirst($booking->booking_status) }}</span>
            @endif
        </div>
    </td>
    <td class="w-46 text-center py-3 manrope text-sm px-6">{{ $booking->booking_days }} days</td>
</tr>
