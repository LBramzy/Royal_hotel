<div class="admin_room_management_interface gradient_1 px-6 py-6">
    <h2 class="text-sm font-bold gradient_1 text-gray-100 rounded-md px-4 py-2 manrope text-right">Admin <span class="text-gray-300">></span> Room Management</h2>

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
        <div class="rounded-md gradient_1 px-6 py-4 lg:w-70 w-37 h-max admin_thumbs">
            <h2 class="text-sm manrope text-gray-200 font-bold">Free Rooms</h2>
            <div class="mt-3 flex lg:items-baseline items-center justify-between">
                <img src={{Vite::asset('resources/css/icon/free_room.png')}} class="lg:w-10 w-7 lg:h-10 h-7" />
                <p class="lg:text-5xl text-3xl font-bold manrope">{{ $free_rooms }}</p>
            </div>
        </div>
    </div>

    <div class="mt-7 w-full h-max flex items-center justify-start gap-8">
        <div class="px-5 py-3 rounded-md bg-white text-gray-800 manrope text-sm w-max text-center cursor-pointer hover:bg-gray-300 transition-all duration-400" id="enable_add_room_interface">
            <p class="flex items-center justify-center gap-2">Add Room <img src="{{ Vite::asset('resources/css/icon/add_new.png') }}" class="w-5 h-5" /></p>
        </div>

        <div class="px-6 py-3 rounded-md bg-white text-gray-800 manrope text-sm w-max text-center cursor-pointer hover:bg-gray-300 transition-all duration-400" id="enable_view_all_rooms_interface">
            <p class="flex items-center justify-center gap-2">View All Rooms <img src="{{ Vite::asset('resources/css/icon/view_all_room.png') }}" class="w-5 h-5" /></p>
        </div>
    </div>

    <div class="hidden lg:block mt-7 w-full h-max gradient_1 px-6 py-6 rounded-md">
        <h2 class="manrope text-md text-right font-bold">Manage Rooms Easily</h2>
        <div class="flex items-center justify-between mt-7">
            <div class="rounded-md w-100 px-6 py-6 h-50 room_admin flex items-center justify-center">
                <h2 class="cinzel text-3xl golden_color leading-10"><i>Where Structure meet Design</i></span></h2>
            </div>
            <div class="bg-white rounded-md w-100 px-3 py-3 h-50">
                <p class="manrope text-sm px-4 rounded-md py-4 h-full leading-6 text-gray-900 gradient_1 bg-transparent">
                    Manage your hotel's room inventory with ease. Add new rooms, update details, monitor availability, and ensure every listing is accurate and guest-ready.
                    Maintain accommodation experience by efficiently managing room categories, pricing, amenities, availability, and status from one place.
                </p>
            </div>
        </div>
    </div>
</div>
