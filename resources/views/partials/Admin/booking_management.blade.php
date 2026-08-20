<div class="admin_booking_management_interface gradient_1 px-6 py-6">
    <h2 class="text-sm font-bold gradient_1 text-gray-100 rounded-md px-4 py-2 manrope text-right">Admin <span class="text-gray-300">></span> Booking Management</h2>

    <div class="mt-7 w-full h-max flex items-start justify-between flex-wrap lg:gap-7 gap-3">
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-37 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Bookings</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/bookings.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $total_bookings }}</p>
            </div>
        </div>
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-43 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Recent Bookings</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/recent_booking.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $todays_bookings }}</p>
            </div>
        </div>
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-37 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Guests</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/recent_guest.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $total_bookings }}</p>
            </div>
        </div>
    </div>

    <div class="mt-7 w-full h-max flex items-center justify-start gap-8">
        <div class="px-5 py-3 rounded-md bg-white text-gray-800 manrope text-sm w-max text-center cursor-pointer hover:bg-gray-300 transition-all duration-400" id="enable_view_all_bookings_interface">
            <p class="flex items-center justify-center gap-2">View All Booking <img src="{{ Vite::asset('resources/css/icon/view_booking.png') }}" class="w-5 h-5" /></p>
        </div>

        {{--  <div class="px-6 py-3 rounded-md bg-white text-gray-800 manrope text-sm w-max text-center cursor-pointer hover:bg-gray-300 transition-all duration-400">
            <p>Show Available Guests</p>
        </div>  --}}
    </div>

    <div class="hidden lg:block mt-7 w-full h-max gradient_1 px-6 py-6 rounded-md">
        <h2 class="manrope text-md text-right font-bold">Bookings Made Easy</h2>
        <div class="flex items-start justify-between mt-7">
            <div class="gradient_1 rounded-md w-25 #px-4 #py-3 h-40 flex-col overflow-hidden">
                <div class="w-full h-1/2 bg-black flex items-center justify-center">
                    <h2 class="manrope font-bold text-md text-gray-300">Versatile</h2>
                </div>
                <div class="w-full h-1/2 bg-gray-100 flex items-center justify-center">
                    <img src={{ Vite::asset('resources/css/icon/versatile.png') }} class="w-15 h-15" />
                </div>
            </div>
            <div class="gradient_1 rounded-md w-25 #px-4 #py-3 h-40 flex-col overflow-hidden">
                <div class="w-full h-1/2 bg-gray-100 flex items-center justify-center">
                    <img src={{ Vite::asset('resources/css/icon/flexible.png') }} class="w-15 h-15" />
                </div>
                <div class="w-full h-1/2 bg-black flex items-center justify-center">
                    <h2 class="manrope font-bold text-md text-gray-300">Flexible</h2>
                </div>
            </div>
            <div class="gradient_1 rounded-md w-25 #px-4 #py-3 h-40 flex-col overflow-hidden">
                <div class="w-full h-1/2 bg-black flex items-center justify-center">
                    <h2 class="manrope text-gray-300 text-md font-bold">Durable</h2>
                </div>
                <div class="w-full h-1/2 bg-gray-100 flex items-center justify-center">
                    <img src={{ Vite::asset('resources/css/icon/durability_1.png') }} class="w-15 h-15" />
                </div>
            </div>
            <div class="bg-white rounded-md w-120 px-6 py-6 h-40">
                <p class="text-gray-900 manrope leading-6 text-sm">
                    Stay in control of your hotel's reservation system by managing bookings, guest information, payment status, and occupancy from a centralized dashboard.
                    Ensure a seamless booking experience for your guests while optimizing room allocation and maximizing revenue.
                </p>
            </div>
        </div>
    </div>
</div>
