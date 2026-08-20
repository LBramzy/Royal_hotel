<div class="relative min-h-screen w-full px-6 py-6 overflow-hidden #flex items-center justify-center hero_main" >

        <div class="noise absolute inset-0 pointer-events-none"></div>


        <div class="spark-b absolute -bottom-24 -left-24 h-96 w-96 rounded-full blur-[90px] pointer-events-none" style="background: radial-gradient(circle, rgba(180,140,80,0.4) 0%, transparent 65%);"></div>


        <div class="spark-c absolute top-16 left-1/4 h-40 w-40 rounded-full blur-3xl pointer-events-none" style="background: radial-gradient(circle, rgba(253,246,227,0.5) 0%, transparent 70%);"></div>

        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse at center, transparent 40%, rgba(0,0,0,0.5) 100%);"></div>

    <div class=" w-full ">

        <div class="relative">
            @include('partials.nav')
        </div>

    </div>

    <div class="w-max">

        <div>
            <h2 class="md:w-150 md:text-4xl md:leading-13 w-80 mt-15 text-2xl leading-9 z-50">
                <span class=""><i>Welcome</i></span> to <span class="golden_color text-4xl md:text-5xl cinzel">Royal Hotel</span>, where luxury meets comfort.
            </h2>
        </div>
        <div class="md:mt-12 mt-7">
            <a href="{{ route('rooms') }}" class="w-40 px-5 py-3 md:w-50 md:px-10 bg-white text-black rounded-3xl manrope text-sm flex items-center justify-center">Book a room <span><img src={{ asset('css/images/right_arrow.gif') }} alt="Arrow" class="ml-2 w-5 h-5"></span></a>
        </div>

    </div>

    <div class="w-full h-max gradient_1 md:px-8 px-0 md:py-8 py-0 md:rounded-3xl rounded-lg md:h-max lg:h-65 md:mt-17 mt-10 flex flex-wrap items-center justify-between gap-5">
        <div class="md:rounded-lg rounded-md gradient_1 px-4 py-4 md:w-90 lg:w-90 w-full h-50 flex items-center justify-between gap-5">
            <div class="w-40 h-40 rounded-md advert_room_1"></div>
            <div class="w-65 h-max">
                <p class="manrope leading-6 text-sm">
                    Experience timeless elegance, exceptional comfort, and world class hospitality, wherer every stay becomes an unforgettable luxury.
                </p>
            </div>
        </div>
        <div class="rounded-lg gradient_1 px-4 py-4 md:w-65 lg:w-90 w-full h-50  flex items-center justify-between gap-5">
            <div class="w-full h-40 rounded-md bg-white advert_room_2"></div>
            {{--  <div class="w-60 h-max">
                <p class="manrope leading-6 text-sm">
                    Step into a sanctuary of sophistication, where.
                </p>
            </div>  --}}
        </div>
        <div class="rounded-lg gradient_1 px-4 py-4 md:w-full md:mt-3 lg:mt-0 lg:w-90 w-full h-50  flex items-center justify-between gap-5">
            <div class="w-full h-40 rounded-md advert_room_3"></div>
        </div>
    </div>

</div>
