<x-app>

    <div class="w-full min-h-screen relative px-6 py-6 contact_section">
        <div class="flex items-center justify-between w-full">
            <h2 class="cinzel md:text-3xl text-xl text-gray-300">All <span class="golden_color">Bookings</span></h2>
            <div class="flex items-center justify-center gap-7">
                <p class="manrope text-sm text-gray-300 font-bold">{{ Auth::user()->name }}</p>
                <a href="{{ route('rooms') }}" class="text-sm px-4 py-1 manrope text-gray-800 bg-gray-200 rounded-3xl hover:bg-[#a5793f] hover:text-gray-300 transition-all duration-300">Back</a>
            </div>
        </div>

        <livewire:livewire.user_booking />
        
    </div>

</x-app>
