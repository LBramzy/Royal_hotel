<div class="overflow-hidden w-full min-h-screen relative gradient_1 dashboard flex justify-center items-center px-6 py-6 add_room_interface">
    <div class="absolute px-4 py-2 rounded-sm flex items-center justify-center manrope lg:top-[3%] cursor-pointer lg:left-[94%] left-80 top-3" id="disable_add_room_interface">
        <img src={{ Vite::asset('resources/css/icon/cancel.png') }} class="w-7 h-7 hover:w-10 hover:h-10 transition-all duration-400" />
    </div>

    <div class="lg:hidden block">
        <h2>Use a Larger screen for this feature</h2>
    </div>
    {{--  Error Section  --}}
    <div class="w-115 rounded-md py-8 px-10 items-start flex justify-between bg-gray-300 absolute shadow-xl shadow-gray-800 transition-all z-30 error_panel">
        {{--  <div>
            <img src="{{ Vite::asset('resources/css/icon/add_property.png') }}" class="w-15 h-15" />
        </div>  --}}
        <div id="error_section" class="w-max error_section manrope"></div>
    </div>
    {{--  Error Section  --}}
    <form id="add_room_form" enctype="multipart/form-data" class="lg:w-200 lg:block hidden w-full h-max gradient_1 px-6 py-6 rounded-md add_room">
        <h2 class="cinzel text-xl mb-3 text-gray-300">Add New Room</h2>
        <hr class="mb-5">

        <div class="flex items-start justify-between gap-8">
            <div class="w-full h-max">
                <div>
                    <input type="text" name="room_name" placeholder="Room Name" value="{{ old('room_name') }}" class="w-full" />
                </div>

                <div>
                    <input type="text" name="room_number" placeholder="Room Number" value="{{ old('room_number') }}" />
                </div>

                <div>
                    <input type="text" name="room_price" placeholder="Room Price" value="{{ old('room_price') }}" />
                </div>

                <div>
                    <input type="text" name="room_number_of_beds" placeholder="Number of Beds" value="{{ old('room_number_of_beds') }}" />
                </div>

                <div class="w-full h-max">
                    <h2 class="text-md cinzel text-gray-300 mb-1">Room Features</h2>
                    <hr>
                    <div class="flex items-start justify-start gap-3 mt-5">

                        <div class="w-1/2">
                            <label for="wifi">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="wifi" value="0" />
                                    <input type="checkbox" id="wifi" name="wifi" value="1" {{ old('room_wifi')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Wifi</span>
                                </div>
                            </label>

                            <label for="smart_tv">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="smart_tv" value="0" />
                                    <input type="checkbox" id="smart_tv" name="smart_tv" value="1" {{ old('smart_tv')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Smart<span class="text-transparent">_</span>TV</span>
                                </div>
                            </label>

                            <label for="air_conditioning">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="air_conditioning" value="0" />
                                    <input type="checkbox" id="air_conditioning" name="air_conditioning" value="1" {{ old('air_conditioning')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Air<span class="text-transparent">_</span>Conditioning</span>
                                </div>
                            </label>

                            <label for="complementary_breakfast">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="complementary_breakfast" value="0" />
                                    <input type="checkbox" id="complementary_breakfast" name="complementary_breakfast" value="1" {{ old('complementary_breakfast')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Breakfast</span>
                                </div>
                            </label>

                        </div>

                        <div class="w-1/2">

                            <label for="daily_housekeeping">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="daily_housekeeping" value="0" />
                                    <input type="checkbox" id="daily_housekeeping" name="daily_housekeeping" value="1" {{ old('daily_housekeeping')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Daily<span class="text-transparent">_</span>Housekeeping</span>
                                </div>
                            </label>

                            <label for="work_desk">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="work_desk" value="0" />
                                    <input type="checkbox" id="work_desk" name="work_desk" value="1" {{ old('work_desk')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Work<span class="text-transparent">_</span>Desk</span>
                                </div>
                            </label>

                            <label for="room_service">
                                <div class="flex gap-2 w-max">
                                    <input type="hidden" name="room_service" value="0" />
                                    <input type="checkbox" id="room_service" name="room_service" value="1" {{ old('room_service')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">24<span>/</span>7<span class="text-transparent">_</span>Room<span class="text-transparent">_</span>Service</span>
                                </div>
                            </label>

                            <label for="pool_access">
                                <div class="flex items-start gap-2 w-max">
                                    <input type="hidden" name="pool_access" value="0" />
                                    <input type="checkbox" id="pool_access" name="pool_access" value="1" {{ old('pool_access')=='1'?'checked':'' }} class="accent-[#a5793f]"/>
                                    <span class="text-gray-300 text-sm manrope">Pool<span class="text-transparent">_</span>Access</span>
                                </div>
                            </label>

                        </div>
                    </div>
                </div>
                <hr>

                <div class="mb-5 mt-5">
                    <label for="room_images">
                        <input type="file" name="room_images[]" id="room_images" class="hidden" multiple accept="image/*" value="{{ old('room_images[]') }}" />
                        <div class="rounded-md w-28 h-15 px-8 py-1 gap-2 gradient_1 flex items-center justify-center relative overflow-hidden cursor-pointer text-gray-300 hover:text-white transition-all duration-400">
                            <img src={{ Vite::asset('resources/css/icon/image_document.png') }} class="w-7 h-7" />
                            <p class="text-sm manrope">Upload Image</p>
                            <div class="show_item absolute w-30 flex items-center justify-between px-1 py-1">
                                {{--  <input type="checkbox" readonly id="upload_check">
                                <span id="image_count"></span>  --}}

                            </div>
                        </div>
                    </label>
                </div>

                <div>
                    <input type="submit" id="submit_button" value="Add Room" class="!golden_background text-gray-300" />
                </div>
            </div>

            <div id="image_preview_box" class="hidden w-full h-130 px-4 py-4 border-3 border-gray-500 border-dashed rounded-md md:flex items-start justify-start gap-5 flex-wrap relative overflow-y-scroll custom_overflow">
                <div class="w-full h-full manrope flex items-center justify-center text-xl font-normal opacity-25">
                    <div>
                        <p>Images Preview</p>
                        <img src="{{ Vite::asset("resources/css/icon/image_preview.png") }}" class="w-30 h-30">
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Meta registration[add_property_form] --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- Meta registration[add_property_form] --}}

    {{-- Success Message --}}
    <div class="golden_background rounded-md text-sm text-gray-300 flex items-center justify-center px-7 py-5 shadow-lg shadow-gray-900 z-30 w-max success_message">
        <h2 class="font-medium">Room Added Successfully</h2>
    </div>
    {{-- Success Message --}}
</div>


{{--  add_room_script  --}}
    <div>
        @include('scripts.add_room_script')
    </div>
{{--  add_room_script  --}}
