<x-app>
    {{--  @include('partials.Auth.sign_in')  --}}
    @if (session('success'))
        <div id="flash-success" class="golden_background text-gray-300 manrope px-6 py-6 mb-0 transition-all duration-400">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('flash-success');
                if (el) el.remove();
            }, 4000);
        </script>
    @endif

    <div class="w-full min-h-screen relative px-6 py-6 contact_section">

        <div class=" w-full ">
            
            <div class="relative">
                @include('partials.nav')
            </div>
            
        </div>

        <div class="mt-20 lg:mt-20 md:mt-30">
            <h2 class="text-5xl cinzel text-gray-300">Find Your <span class="golden_color">Perfect</span> Stay</h2>
            <div class="flex items-start justify-between mt-20 lg:mt-20 md:mt-25 gap-10 w-full h-max">

                <div class="px-6 py-6 gradient_1 lg:w-150 md:w-full h-max rounded-md">
                    <p class="text-sm text-gray-300 manrope leading-7">
                        Step into a world of timeless elegance where every room is thoughtfully designed for comfort,
                        sophistication, and unforgettable experiences. Browse our curated collection of luxurious accommodations
                        and reserve the perfect retreat for your next stay.
                    </p>
                </div>

                {{--  <div class="w-200 h-max flex flex-wrap gap-5 items-start justify-center">
                    <div class="w-46 h-max gradient_1 rounded-md px-6 py-6">
                        <h2 class="cinzel text-3xl">24/7</h2>
                        <p class="mt-4 manrope text-sm">Guest service</p>
                    </div>
                    <div class="w-55 h-max gradient_1 rounded-md px-6 py-6">
                        <h2 class="cinzel text-3xl">98%</h2>
                        <p class="mt-4 manrope text-sm">Guest satisfaction</p>
                    </div>
                    <div class="w-51 h-max gradient_1 rounded-md px-6 py-6">
                        <h2 class="cinzel text-3xl">27<sup>+</sup></h2>
                        <p class="mt-4 manrope text-sm">Luxury Rooms</p>
                    </div>  --}}

                </div>
            </div>

            <div class="w-full h-max flex flex-wrap gap-5 items-start justify-between mt-20 lg:mt-20 md:mt-25">
                <div class="md:w-46 w-full h-max gradient_1 rounded-md md:px-6 px-4 py-6">
                    <img src={{ Vite::asset('resources/css/icon/guest_rating.png') }} class="w-7 h-7">
                    <p class="mt-4 manrope text-sm">Guest Rating</p>
                </div>
                <div class="md:w-55 w-full h-max gradient_1 rounded-md md:px-6 px-4 py-6">
                    <img src={{ Vite::asset('resources/css/icon/guarantee.png') }} class="w-7 h-7">
                    <p class="mt-4 manrope text-sm">Best Price Guarantee</p>
                </div>
                <div class="md:w-51 w-full h-max gradient_1 rounded-md md:px-6 px-4 py-6">
                    <img src={{ Vite::asset('resources/css/icon/cancel.png') }} class="w-7 h-7">
                    <p class="mt-4 manrope text-sm">Free Cancelation</p>
                </div>
                <div class="lg:w-51 md:w-46 w-full h-max gradient_1 rounded-md md:px-6 px-4 py-6">
                    <img src={{ Vite::asset('resources/css/icon/wifi_1.png') }} class="w-7 h-7">
                    <p class="mt-4 manrope text-sm">Free Wi-fi</p>
                </div>
                <div class="md:w-51 w-full h-max gradient_1 rounded-md md:px-6 px-4 py-6">
                    <img src={{ Vite::asset('resources/css/icon/concierge_and_security.png') }} class="w-7 h-7">
                    <p class="mt-4 manrope text-sm">Secure Booking</p>
                </div>

            </div>

        </div>
    </div>
    <div class="relative room_section w-full h-max px-6 py-6">
        <h2 class="cinzel md:text-5xl text-2xl md:mt-10 mt-5">Book a <span class="golden_color">Room</span></h2>
        
        <livewire:livewire.room_livewire/>
        
    </div>

    {{--  Contact  --}}
    <x-contact_page />
    {{--  Contact  --}}

    {{--  Footer  --}}
    <div>
        @include('partials.footer')
    </div>
    {{--  Footer  --}}
</x-app>
