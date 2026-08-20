<div class="overflow-hidden w-full min-h-screen relative gradient_1 dashboard flex justify-center items-center px-6 py-6 view_all_bookings_interface">
    <div class="absolute px-4 py-2 rounded-sm flex items-center justify-center manrope lg:top-[3%] cursor-pointer lg:left-[94%] top-3 left-80" id="disable_view_all_bookings_interface">
        <img src={{ Vite::asset('resources/css/icon/cancel.png') }} class="w-7 h-7 hover:w-10 hover:h-10 transition-all duration-400" />
    </div>

    <div class="lg:hidden block">
        <h2>Use a Larger screen for this feature</h2>
    </div>
    
    <div class="hidden lg:block">
        <livewire:livewire.view_all_bookings_admin/>
    </div>
</div>

{{--  Script  --}}
<div>
    @include('scripts.view_all_bookings_script')
</div>
{{--  Script  --}}