<x-scaffold auth_type="sign_in">

    {{--  <button class="px-4 py-1.5 rounded-3xl absolute manrope text-sm bg-white top-7 left-[92%] text-gray-700 cursor-pointer hover:bg-red-500 hover:text-white" id="disable_sign_in">Close</button>  --}}

    <div>
        <form action="{{ route('sign_in') }}" method="POST" class="gradient_1 rounded-lg px-6 py-6 md:w-120 w-85 h-max authentication">

            @csrf
            @method('POST')

            <h2 class="text-3xl cinzel mb-5 w-full text-center">Royal Hotel</h2>
            <div>
                <input type="email" name="email" placeholder="Email"/>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" />
            </div>
            <div>
                <input type="submit" value="Sign In" />
            </div>

            {{--  forgot password  --}}
            <a href="{{ route('forgot.password') }}" class="manrope text-sm underline hover:text-gray-300">Forgot password ?</a>
            {{--  forgot password  --}}
        </form>
        {{--  <a href={{ route('auth.google') }}>
            <div class="w-120 px-3 py-2 manrope flex items-center justify-center gap-2 gradient_1 rounded-md text-sm mt-3">Login with Google <img src={{Vite::asset('resources/css/icon/google_email.png')}} class="w-5 h-5" /></div>
        </a>  --}}
        <div class="flex items-baseline justify-between w-full mt-3">
            <p class="text-sm manrope">Don't have an account?</p>
            <a href="{{ route('sign_up.show') }}">
                <div class="text-sm manrope px-6 py-2 rounded-4xl golden_background">Sign Up</div>
            </a>
        </div>
    </div>
</x-scaffold>
