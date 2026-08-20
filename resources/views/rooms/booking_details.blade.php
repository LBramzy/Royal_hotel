<x-app>

    <div class="flex items-center justify-center w-full h-max px-6 py-6">
        <div class="w-180 rounded-md bg-gray-100 px-6 py-6 shadow-xl shadow-gray-300">
            <div class="w-full flex items-start justify-between gap-6 text-right">
                <div>
                    <h2 class="cinzel golden_color text-3xl text-left">Royal Hotel</h2>
                    <p class="text-sm manrope mt-2 text-left">Luxury <span class="mr-1 ml-1">|</span> Comfort <span class="mr-1 ml-1">|</span> Excellence</p>
                </div>
                <div>
                    <p class="text-sm manrope mt-2">
                        <i>123 Admiralty Way, Lekki, Lagos, Nigeria</i>
                    </p>
                    <p class="text-sm manrope mt-2">+234 800 123 4567 <span>|</span> info@royalhotel.com</p>
                </div>
            </div>
            <hr class="mt-5">
            <div class="w-full text-sm mt-5">
                <p class="manrope">Reciept No.: <span class="font-bold">{{ $booking->booking_id_number }}</span></p>
                {{--  <p class="manrope mt-2">Booking Date: <span class="font-bold">{{ $booking->created_at->format('d M Y') }}</span></p>  --}}
                <p class="manrope mt-2">Payment Reference: <span class="font-bold">{{ $payment->transaction_id }}</span></p>
            </div>
            <hr class="mt-5">
            <div class="text-sm mt-5">
                <p class="manrope font-bold mb-2">Guest Information</p>
                <p class="manrope mt-2">Guest Name: <span class="font-bold">{{ $booking->booked_user_name }}</span></p>
                <p class="manrope mt-2">Guest Email: <span class="font-bold">{{ $booking->booked_user_email }}</span></p>
                <p class="manrope mt-2">Guest Phone: <span class="font-bold">{{ Auth::user()->phone }}</span></p>
            </div>
            <hr class="mt-5">
            <div class="text-sm mt-5">
                <p class="manrope font-bold mb-2">Booking Details</p>
                <p class="manrope mt-2">Room: <span class="font-bold">{{ $booking->booked_room_name }}</span></p>
                <p class="manrope mt-2">Room Number: <span class="font-bold">{{ $booking->booked_room_number }}</span></p>
                <p class="manrope mt-2">Check In: <span class="font-bold">{{ $booking->created_at->format('d M Y') }}</span></p>
                {{--  <p class="manrope mt-2">Check Out: <span class="font-bold">{{ $booking->created_at->addDays((int) $booking->booking_days + 1)->format('d M Y') }}</span></p>  --}}
                <p class="manrope mt-2">Check Out: <span class="font-bold">{{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }}</span></p>
                
            </div>
            <hr class="mt-5">
            <div class="text-sm mt-5">
                <p class="manrope font-bold mb-2">Payment Details</p>
                <p class="manrope mt-2">Amount Paid: <span class="font-bold">&#8358;{{ $payment->amount }}</span></p>
                {{--  <p class="manrope mt-2">Payment Method: <span class="font-bold">{{ $payment->payment_method }}</span></p>  --}}
                <p class="manrope mt-2">Payment Status: <span class="font-bold">{{ $payment->payment_status }}</span></p>
            </div>
            <hr class="mt-5">
            <div class="text-sm mt-5 w-full flex flex-wrap items-start justify-justify-between gap-10">
                <p class="manrope text-sm w-2/3">Thank you for choosing Royal Hotel. We look forward to welcoming you and providing an exceptional stay.</p>
                <a href="{{ route('booking.invoice.download', $booking->room) }}" class=" text-center px-6 py-2 rounded-3xl bg-[#a5793f] text-gray-300 manrope text-sm md:w-1/3 w-full hover:bg-gray-900 transition-all duration-300 cursor-pointer">Download Invoice</a>
            </div>
        </div>
    </div>

</x-app>