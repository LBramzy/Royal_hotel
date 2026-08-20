@props(['room'])
<div class="md:flex flex-wrap-reverse items-start justify-between gap-8">
    <div>
        <h2 class="md:text-3xl text-xl cinzel mb-3">{{ $room->room_name }}</h2>
        <hr>
        <div class="mt-3">
            <h2 class="cinzel text-md">Main</h2>
            <div class="mt-3">
                <p class="text-sm mb-3 text-gray-300 manrope flex items-baseline justify-start gap-2"><img src={{ Vite::asset('resources/css/icon/room_tag.png') }} class="w-5 h-5" />Room Number: <span class="cinzel text-xl">{{ $room->room_number }}</span></p>
                <p class="text-sm mb-3 text-gray-300 manrope flex items-baseline justify-start gap-2"><img src={{ Vite::asset('resources/css/icon/bed.png') }} class="w-5 h-5" />Number of Beds: <span class="cinzel text-xl">{{ $room->room_number_of_beds }}</span></p>
                {{--  <p class="text-md mb-3 text-gray-300 manrope">Room Price: <span class="cinzel px-2 py-1 rounded-sm gradient_1">{{ $room->room_price }}</span></p>  --}}
            </div>
        </div>
        <hr>
        <div class="mt-3 md:w-130 w-full h-max mb-3">
            <h2 class="cinzel text-md">Features</h2>
            <div class="flex items-center justify-start gap-3 mt-3">
                @php
                    $room_features = $room->room_features_relation
                @endphp
                @foreach ($room_features as $room_feature)
                    <x-room_features :$room_feature />
                @endforeach
            </div>
        </div>
        <hr>
        <div class="mt-3 md:w-130 w-full h-max">
            <h2 class="cinzel text-md md:mb-0 mb-2">Pricing</h2>
            <div class="w-full flex items-baseline flex-wrap justify-between gap-4">
                <h2 class="manrope text-lg">&#8358; {{ number_format($room->room_price, 2) }} / <span class="text-md manrope">Night</span></h2>
                <a href="{{ route('book.room', $room) }}">
                    <button type="submit" value="Book Now"  class="manrope font-bold text-sm text-white transition-all duration-300 hover:text-gray-300 px-10 py-3 rounded-3xl golden_background md:mt-3 mt-0 w-max flex items-center gap-3 book_view"><img src={{ Vite::asset('resources/css/icon/book_now.png') }} class="w-5 h-5" />Book Now</button>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="md:w-150 w-full md:h-80 h-full rounded-md gradient_1 md:mt-0 mt-7">
            <img id="room_image" src="{{ asset('storage/'.$room->room_images_relation[0]->image_path) }}" class="w-full md:h-full h-50 rounded-md transition-all duration-150">
        </div>
        <div class="relative overflow-hidden overflow-x-scroll custom_overflow_x py-2 rounded-md">
            <div class="flex items-center justify-start gap-4 w-150 h-20 mt-4">
                @php
                    $images = $room->room_images_relation
                @endphp
                @foreach ($images as $image)
                    <x-grid_images :$image />
                @endforeach
            </div>
        </div>

    </div>
</div>

{{--  Grid Images  --}}
    <div>
        @include('scripts.grid_images')
    </div>
{{--  Grid Images  --}}
