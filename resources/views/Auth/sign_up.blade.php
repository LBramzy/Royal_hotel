<x-scaffold auth_type="sign_up">

    {{--  <button class="px-4 py-1.5 rounded-3xl absolute manrope text-sm bg-white top-7 left-[92%] text-gray-700 cursor-pointer hover:bg-red-500 hover:text-white" id="disable_sign_up">Close</button>  --}}

    <div>
        <form class="gradient_1 rounded-lg px-6 py-6 md:w-120 w-85 authentication" action="{{ route('register') }}" method="POST">

            @csrf
            @method('POST')

            <h2 class="text-3xl cinzel mb-5 w-full text-center">Royal Hotel</h2>
            <div>
                <input type="text" name="fullname" placeholder="Fullname"/>
            </div>
            {{--  <div>
                <input type="text" name="surname" placeholder="Surname"/>
            </div>  --}}
            <div>
                <input type="text" name="phone" placeholder="Phone"/>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email"/>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
            </div>
            <div>
                <input type="submit" value="Sign Up" />
            </div>
        </form>
        {{--  <a href="">
            <div class="w-120 px-3 py-2 manrope flex items-center justify-center gap-2 gradient_1 rounded-md text-sm mt-3">Sign Up with Google <img src={{Vite::asset('resources/css/icon/google_email.png')}} class="w-5 h-5" /></div>
        </a>  --}}
        <div class="flex items-baseline justify-between w-full mt-3">
            <p class="text-sm manrope">Already have an account?</p>
            <a href="{{route('login')}}">
                <div class="text-sm manrope px-6 py-2 rounded-4xl golden_background">Sign In</div>
            </a>
        </div>
    </div>
</x-scaffold>
