<div class="nav w-full">
    <div class=" w-full rounded-xl flex items-center justify-between gap-5 #px-5 #py-6 ">

        <div>
            <h1 class="md:text-3xl text-xl font-medium text-gray-300 cinzel">Royal Hotel</h1>
        </div>

        <div class="w-max flex items-center justify-between gap-5">

            @guest
                <li>
                    <a href={{ route('sign_up.show') }} class="md:px-5 text-gray-50 flex items-center justify-between gap-2 manrope px-3 w-max py-2 rounded-md #bg-white text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-100 hover:border-transparent hover:bg-[#a5793f] transition-all">Sign up <img src="{{ asset('css/icon/sign_up.png') }}" class="w-5 h-5" /> </a>
                </li>
                <li>
                    <a href={{ route('login') }} class="md:px-5 text-gray-50 flex items-center justify-between gap-2 manrope px-3 py-2 w-max rounded-md #bg-white text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-100 hover:border-transparent hover:bg-[#a5793f] transition-all">Sign in <img src="{{ asset('css/icon/sign_in_1.png') }}" class="w-5 h-5" /></a>
                </li>
                {{--  <li>
                    <p class="text-sm manrope text-gray-300">We have quality services at our best</p>
                </li>  --}}
            @endguest

            {{--  Authentication  --}}
            @auth
                @role('guest')
                    {{--  <li>
                        <a href={{ route('rooms') }} class="text-gray-50 manrope px-5 py-2 rounded-md #bg-white text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-800 hover:bg-white transition-all">Rooms</a>
                    </li>  --}}

                    <li>
                        <a href={{ route('user.booking') }} class="text-gray-50 manrope md:px-5 px-3 py-2 flex items-center justify-between gap-2 rounded-md #bg-white text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-100 hover:border-transparent hover:bg-[#a5793f] transition-all">Bookings <img src="{{ Vite::asset('resources/css/icon/icons8-view-details-100.png') }}" class="w-5 h-5 md:mr-0 mr-5" /></a>
                    </li>

                    {{--  <li>
                        <a href="" class="text-gray-100 manrope px-5 py-2 flex items-center justify-between gap-2 rounded-md text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-100 hover:border-transparent hover:bg-[#a5793f] transition-all">Consult <img src="{{ Vite::asset('resources/css/icon/consultation.png') }}" class="w-5 h-5" /></a>
                    </li>  --}}

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full rounded-md md:px-4 px-6 py-2.5 bg-white manrope text-sm text-gray-800 transition-all cursor-pointer hover:bg-gray-300 flex items-center justify-center gap-2">Logout <img src={{Vite::asset('resources/css/icon/logout.png')}} class="w-5 h-5" /></button>
                    </form>
                @endrole

                @hasanyrole('admin')
                    <li>
                        <a href={{ route('dashboard.admin') }} class="text-gray-50 manrope px-5 py-2 flex items-center justify-between gap-2 rounded-md #bg-white text-sm shadow-md shadow-gray-900 border-2 border-amber-50 gradient hover:text-gray-100 hover:border-transparent hover:bg-[#a5793f] transition-all">Admin Dashboard <img src="{{ Vite::asset('resources/css/icon/icons8-dashboard-layout-100.png') }}" class="w-5 h-5" /></a>
                    </li>
                @endhasanyrole
            @endauth
            {{--  Authentication  --}}

        </div>

    </div>
</div>
