<div>
    <div class="w-full h-max flex items-baseline justify-between gap -4 px-4 py-2 border-2 border-b-black border-l-transparent border-t-transparent border-r-transparent">
        <div>
            <p class="manrope text-sm">Room No.: {{ $booking->booked_room_number }}</p>
            <p class="manrope text-sm mt-1.5">Room Name: {{ $booking->booked_room_name }}</p>
            <p class="manrope text-sm mt-1.5">Booking ID: {{ $booking->booking_id_number }}</p>    
            <p class="manrope text-sm mt-1.5">Booking Price: &#8358; {{ $booking->booking_amount }}</p> 
        </div>
        <div class="flex flex-col items-start justify-between h-full gap-10 w-max">
            <p class="manrope text-sm">{{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }}</p>
            <div class="">
                @if($booking->room->isCurrentlyBooked())
                    <span class="px-6 py-1.5 rounded-full manrope bg-green-500 text-white text-xs font-semibold">Active</span>
                @elseif($booking->booking_expiration < now())
                    <span class="px-6 py-1.5 rounded-full manrope bg-red-500 text-white text-xs font-semibold">Expired</span>
                @else
                    <span class="px-6 py-1.5 rounded-full manrope bg-gray-500 text-white text-xs font-semibold">{{ ucfirst($booking->booking_status) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>