<div class="admin_home_panel_interface gradient_1 px-6 py-6">
    <h2 class="text-sm font-bold gradient_1 text-gray-100 rounded-md px-4 py-2 manrope text-right">Admin <span class="text-gray-300">></span> Home</h2>

    <div class="mt-7 w-full h-max flex items-start justify-between flex-wrap lg:gap-7 gap-3">
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-37 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Total Rooms</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/all_rooms.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $total_rooms }}</p>
            </div>
        </div>
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-43 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Occupied Rooms</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/occupied_rooms.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $occupied_rooms }}</p>
            </div>
        </div>
        <div class="rounded-md gradient_1 px-6 py-4 lg:mt-0 mt-2 lg:w-70 w-37 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Bookings</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/recent_booking.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $total_bookings }}</p>
            </div>
        </div>
        <div class="rounded-md gradient_1 px-6 py-4 lg:mt-0 mt-2 lg:w-70 w-43 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Recent Guest</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/recent_guest.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $todays_bookings }}</p>
            </div>
        </div>
    </div>

    <div class="mt-7 w-full h-max gradient_1 lg:px-6 px-0 lg:py-6 py-0 rounded-md hotel_admin_1">
        {{--  <h2 class="cinzel text-3xl text-right"></h2>  --}}
        <div class="flex items-center justify-between">
            {{--  <div class="bg-white rounded-md w-120 px-4 py-3 h-47"></div>  --}}
            <div class="bg-white rounded-md w-max overflow-hidden #px-6 #py-6 lg:h-47 h-max hotel_admin_1 shadow-md shadow-white/10">
                <h2 class="manrope gradient_1 px-4 py-4 ">Welcome to your management hub</h2>
                <p class="manrope text-sm mt-3 leading-6 px-4 py-2 text-gray-300">
                    Manage reservations, oversee room availability, monitor revenue, and deliver exceptional guest experiences all from your centralized hotel management dashboard.
                    Equally manage every aspect of your hotel with confidence from room availability and reservations to customer satisfaction and business analytics.
                </p>
            </div>
        </div>
    </div>
</div>
