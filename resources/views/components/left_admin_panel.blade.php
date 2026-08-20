<div class="left_admin_panel">
    <h2 class="cinzel text-3xl text-white mb-6">Royal Hotel</h2>
    <hr class="mb-5">

    {{--  Dashboard functions  --}}

    <div class="flex w-full h-max flex-col items-start justify-between gap-4">
        <div class="w-full rounded-md px-4 py-1.5 gradient_1 manrope text-sm hovered_items text-gray-300 home" id="enable_admin_home_panel">Home</div>

        <div class="w-full rounded-md px-4 py-1.5 gradient_1 manrope text-sm hovered_items text-gray-300 room_management" id="enable_admin_room_management">Room management</div>

        <div class="w-full rounded-md px-4 py-1.5 gradient_1 manrope text-sm hovered_items text-gray-300 booking_management" id="enable_admin_booking_management">Booking management</div>

        <div class="w-full rounded-md px-4 py-1.5 gradient_1 manrope text-sm hovered_items text-gray-300 payment_record" id="enable_admin_payment_record">Payment Records</div>

        {{--  Logout  --}}
        <div class="lg:mt-65 mt-38">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full rounded-md px-4 py-2 bg-white manrope text-sm text-gray-800 transition-all cursor-pointer hover:bg-gray-300 flex items-center justify-center gap-2">Logout <img src={{Vite::asset('resources/css/icon/logout.png')}} class="w-5 h-5" /></button>
            </form>
        </div>
        {{--  Logout  --}}
    </div>

    {{--  Dashboard functions  --}}

    <div class="gradient_1 px-6 py-3 w-full h-max mt-7 rounded-md">
        <p class="leading-4 manrope text-sm text-gray-300">
            &copy; 2026 Royal Hotel. All rights reserved.<br>
        </p>
    </div>
</div>
