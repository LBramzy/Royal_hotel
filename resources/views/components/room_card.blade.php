@props(["room"])
<div class="relative rounded-md gradient_1 lg:w-70 md:w-86 w-full h-max px-4 py-4 flex flex-col items-start justify-center overflow-hidden">
    <div class="relative">
        <img src="{{ asset('storage/'.$room->room_images_relation[0]->image_path) }}" class="md:w-70 w-90 h-40 rounded-md " />
    </div>
    <div class="w-full mt-5">
        <div class="flex items-start justify-between">
            <h2 class="cinzel text-md">{{ $room->room_name }}</h2>
            <div>
                <img src={{ Vite::asset('resources/css/icon/rating.png') }} class="w-5 h-5" />
            </div>
        </div>

        <div class="mt-3">
            <div>
                <p class="manrope text-sm text-gray-300 flex items-baseline gap-2"><span><img src={{Vite::asset('resources/css/icon/person.png')}} class="w-5 h-5" /></span>Guests comfort</p>
                <p class="manrope text-sm text-gray-300 flex items-baseline gap-2"><span><img src={{Vite::asset('resources/css/icon/bed.png')}} class="w-5 h-5" /></span>{{ $room->room_number_of_beds }} King Bed</p>
            </div>
        </div>

        <div class="gradient_1 px-3 py-3 rounded-sm mt-3 flex items-center justify-between">
            <div>
                <p class="manrope text-sm text-gray-300">Starting from</p>
                <h2 class="manrope text-lg text-gray-300">&#8358; {{ $room->room_price }} / <i class="text-sm">Night</i></h2>
            </div>
            <div>
                <h2 class="cinzel text-sm text-gray-300">R<span class="text-4xl">{{ $room->room_number }}</span></h2>
            </div>
        </div>

        {{--  <div class="mt-3">
            <div class="flex items-center gap-2">
                <img src={{ Vite::asset('resources/css/icon/clock_1.png') }} class="w-5 h-5" />
                <p class="manrope text-sm text-gray-300">Available in: 45:50:45</p>
            </div>
        </div>  --}}
        <div class="flex items-center justify-between">
            <div>
                @if($room->isCurrentlyBooked())
                    <button class="manrope py-2 text-gray-300 text-sm rounded-sm mt-3 w-40 flex items-center gap-2 cursor-not-allowed overflow-hidden" disabled>
                        <p>
                            Booked - {{ \Carbon\Carbon::parse($room->booking_expiration)->format('d M Y') }}
                        </p>

                    </button>
                @else
                    <a href="{{ route('book.room', $room) }}" class="cursor-pointer">
                        <div class="manrope text-sm text-gray-300 px-4 py-2 rounded-sm gradient_1 mt-3 w-max flex items-center gap-2 book_view"><img src={{ Vite::asset('resources/css/icon/book_now.png') }} class="w-5 h-5" />Book Now</div>
                    </a>
                @endif

            </div>
            <div>
                <a href="{{ route('view.room', $room) }}" class="cursor-pointer">
                    <div class="manrope text-sm text-gray-300 px-4 py-2 rounded-sm gradient_1 mt-3 w-max flex items-center gap-2 book_view {{ $room->isCurrentlyBooked() ? 'hidden': 'visible' }}"><img src={{ Vite::asset('resources/css/icon/view.png') }} class="w-5 h-5" />View</div>
                </a>
            </div>
        </div>
    </div>
</div>
