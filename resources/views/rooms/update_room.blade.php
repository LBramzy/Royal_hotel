<x-app>
    <div class="overflow-hidden w-full min-h-screen relative gradient_1 dashboard flex justify-center items-start px-6 py-6 add_room_interface">

        @if (session('success'))
            <div id="flash-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const el = document.getElementById('flash-success');
                    if (el) el.remove();
                }, 4000);
            </script>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="w-full h-160">
            <div class="flex items-center justify-between">
                <h2 class="text-gray-300 text-3xl cinzel"><span class="golden_color">Update Room</span> | <i>{{ $room->room_name }}</i> | <i>{{ $room->room_number }}</i></h2>
                <a href="{{ route('dashboard.admin') }}" class="bg-white rounded-4xl px-6 py-1.5 text-gray-800 text-sm manrope">Back</a>
            </div>

            <div class="w-full gradient_1 rounded-md h-max px-6 py-6 mt-10">
                <form class="w-full h-max add_room" action="{{ route('rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex w-full h-max items-start justify-between gap-5">
                        <div class="w-1/3">

                            <div class="flex items-start justify-start gap-7 w-3/3">

                                <div>
                                    <p class="manrope text-sm font-bold text-gray-300 mb-2">Room Name</p>
                                    <input type="text" name="room_name" placeholder="Room Name" value="{{ old('room_name', $room->room_name) }}" class="w-full" />
                                </div>

                                <div>
                                    <p class="manrope text-sm font-bold text-gray-300 mb-2">Room Number</p>
                                    <input type="text" name="room_number" placeholder="Room Number" value="{{ old('room_number', $room->room_number) }}" />
                                </div>

                            </div>

                            <div class="flex items-start justify-start gap-7 w-3/3">

                                <div>
                                    <p class="manrope text-sm font-bold text-gray-300 mb-2">Room Price</p>
                                    <input type="text" name="room_price" placeholder="Room Price" value="{{ old('room_price', $room->room_price) }}" />
                                </div>
                                <div>
                                    <p class="manrope text-sm font-bold text-gray-300 mb-2">Number of Beds</p>
                                    <input type="text" name="room_number_of_beds" placeholder="Number of Beds" value="{{ old('room_number_of_beds', $room->room_number_of_beds) }}" />
                                </div>

                            </div>

                            <hr>

                            <div class="flex items-start justify-start gap-7 w-3/3 mt-3">

                                @php
                                    $room_features = $room->room_features_relation
                                @endphp
                                @foreach ($room_features as $room_feature)
                                    <x-update_room_features :$room_feature />
                                @endforeach

                            </div>

                            <hr>

                            <div class="mb-5 mt-5">
                                <label for="room_images">
                                    <input type="file" name="room_images[]" id="room_images" class="hidden" multiple accept="image/*" value="{{ old('room_images[]', $room->room_images_relation) }}" />
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
                                <input type="submit" id="submit_button" value="Update Room" class="!golden_background text-gray-300" />
                            </div>

                        </div>

                        <div class="w-180 h-max">
                            <div id="image_preview_box" class="w-full h-110 px-4 py-4 border-3 border-gray-500 border-dashed rounded-md flex items-start justify-start gap-5 flex-wrap relative overflow-y-scroll custom_overflow">
                                <div class="w-full h-full manrope flex items-center justify-center text-xl font-normal opacity-25">
                                    <div>
                                        <p>Images Preview</p>
                                        <img src="{{ Vite::asset("resources/css/icon/image_preview.png") }}" class="w-30 h-30">
                                    </div>
                                </div>
                            </div>

                            {{-- container where we'll inject deleted_image_ids[] hidden inputs --}}
                            <div id="deleted_ids_container"></div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{--  Script  --}}
    <div>
        @include('scripts.update_room_script')
    </div>
    {{--  Script  --}}
</x-app>
