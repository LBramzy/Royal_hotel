<x-app>

    <div class="w-full min-h-screen relative gradient_1 dashboard flex justify-between items-center">
        
        {{--  Left panel  --}}
        <x-left_admin_panel></x-left_admin_panel>
        {{--  Left panel  --}}

        {{--  Right panel  --}}
        <x-right_admin_panel :$total_rooms :$total_bookings :$occupied_rooms :$free_rooms :$todays_bookings :$total_revenue></x-right_admin_panel>
        {{--  Right panel  --}}

    </div>


    {{--  Add Rooom  --}}
        <div>
            @include('partials.Admin.add_room')
        </div>
    {{--  Add Rooom  --}}

    {{--  View All Rooms  --}}
        <div>
            @include('partials.Admin.view_all_rooms', [
                'rooms' => $rooms
            ])
        </div>
    {{--  View All Rooms  --}}

    {{--  View All Bookings  --}}
        <div>
            @include('partials.Admin.view_all_bookings')
        </div>
    {{--  View All Bookings  --}}

    {{--  View Payment History  --}}
        <div>
            @include('partials.Admin.view_payment_history')
        </div>
    {{--  View Payment History  --}}

</x-app>

{{--  Scripts  --}}
<div>
    @include('scripts.admin_panel_script')
</div>
{{--  Scripts  --}}
