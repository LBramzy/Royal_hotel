<x-app>
    <div class="w-full md:min-h-screen h-max relative px-6 py-6 contact_section">

        <div class="flex items-center justify-between">

            <div>
                @include('partials.nav')
            </div>

        </div>

        <div class="w-full h-max md:px-6 px-2 md:py-6 py-2 relative gradient_1 md:mt-7 mt-12 rounded-md flex items-center justify-between gap-8">

            {{--  Slider  --}}

            <div class="slider-container md:block hidden">
                <div class="slider-wrapper">
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/homeographer.jpg') }}" alt="slider"></div>
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/hotelroom.jpg') }}" alt="slider"></div>
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/interior_1.jpg') }}" alt="slider"></div>
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/interior_2.jpg') }}" alt="slider"></div>
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/room-1.jpg') }}" alt="slider"></div>
                    <div class="slider-slide"><img src="{{ Vite::asset('resources/css/images/room-3.jpg') }}" alt="slider"></div>
                </div>

                <div class="slider-nav">
                    <button id="prev">&#10094;</button>
                    <button id="next">&#10095;</button>
                </div>

                <div class="slider-dots">
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                </div>
            </div>

            {{--  Slider  --}}

            <div class="w-250 md:h-100 h-max gradient_1 rounded-md px-6 py-6">
                <h2 class="cinzel text-xl text-right">We've got the Best View for you.</h2>
                <p class="text-gray-300 manrope text-sm mt-5 leading-6">
                    Explore comprehensive information about this room, including its amenities, pricing, availability, and gallery, to help you make informed management decisions.
                </p>
                <hr class="mt-5">
                <div class="hidden w-full rounded-md h-max md:flex items-center justify-between bg-white mt-12 px-5 py-5 gap-5">
                    <img src={{ Vite::asset('resources/css/icon/scroll.gif') }} class="w-15 h-15" />
                    <p class="manrope text-gray-900 text-sm leading-6">
                        Discover the perfect room tailored to your comfort and lifestyle. Choose from our spacious, well appointed accommodations designed to deliver a relaxing and memorable stay.
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden rounded-md md:block gradient_1 px-6 py-6 w-120 h-20 mt-7">
            <p class="text-gray-300 manrope text-sm">
                Premium luxury suite offering breathtaking city and ocean views with elegant furnishings
            </p>
        </div>
    </div>

    <div class="relative w-full min-h-screen contact_section px-6 py-6">
        <h2 class="cinzel md:text-5xl text-2xl md:mt-10 mt-5">Room <span class="golden_color">Details</span></h2>
        <hr>
        <div class="gradient_1 w-full h-max px-6 py-6 mt-7 rounded-md">
            <x-view_room :$room />
        </div>
    </div>

    <div>
        @include('partials.footer')
    </div>
</x-app>
{{--  Slider Scripts  --}}
    <div>
        @include('scripts.view_property_slider')
    </div>
{{--  Slider Scripts  --}}
