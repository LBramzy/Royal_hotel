<div class="overflow-hidden w-full min-h-screen relative gradient_1 dashboard flex justify-center items-center px-6 py-6 view_all_rooms_interface">
    <div class="absolute px-4 py-2 rounded-sm flex items-center justify-center manrope lg:top-[3%] cursor-pointer lg:left-[94%] left-80 top-3" id="disable_view_all_rooms_interface">
        <img src={{ Vite::asset('resources/css/icon/cancel.png') }} class="w-7 h-7 hover:w-10 hover:h-10 transition-all duration-400" />
    </div>

    <div class="lg:hidden block">
        <h2>Use a Larger screen for this feature</h2>
    </div>

    <div class="hidden lg:block w-full">
        <h2 class="cinzel text-3xl text-gray-300">View all rooms</h2>
        <div class="w-full h-145 rounded-md mt-5 relative gradient_1 overflow-hidden">
            <div class="w-full px-4 py-1 gradient_1 flex items-center justify-space between">
                <div class="text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Room Name</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Room Number</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Room Price</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Number of Beds</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Edit Room</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Delete Room</p>
                </div>
            </div>

            <div class="px-4 #py-4 overflow-y-scroll custom_overflow w-full h-105 mt-5">
                <div class="w-full min-h-140 rounded-md relative gradient_1">
                    <table class="w-full">
                        <tr></tr>
                        @foreach($rooms as $room)
                            <x-room_list :room="$room" />
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="px-6 mt-8">
                <p class="manrope text-sm text-gray-300">Update and Delete room from this section ...</p>
            </div>
        </div>
    </div>
</div>


{{--  Script  --}}
<div>
    @include('scripts.view_all_rooms_script')
</div>
{{--  Script  --}}
