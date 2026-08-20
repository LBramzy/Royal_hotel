@props(['total_rooms',
        'total_bookings',
        'occupied_rooms',
        'free_rooms',
        'todays_bookings',
        'total_revenue',
])
<div class="min-h-screen lg:w-3/4 w-full gradient_1 relative overflow-hidden">
    

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

    @elseif (session('error'))

        <div id="flash-success" class="golden_background text-gray-300 manrope px-6 py-6 mb-0 transition-all duration-400">
            {{ session('error') }}
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('flash-success');
                if (el) el.remove();
            }, 4000);
        </script>
        
    @endif

    {{--  Admin navigation  --}}
        @include('partials.Admin.admin_nav')
    {{--  Admin navigation  --}}


    {{--  Admin home panel  --}}
        <div>
            @include('partials.Admin.home', [
                'total_rooms' => $total_rooms,
                'total_bookings' => $total_bookings,
                'occupied_rooms' => $occupied_rooms,
                'free_rooms' => $free_rooms,
                'todays_bookings' => $todays_bookings,
            ])
        </div>
    {{--  Admin home panel  --}}

    {{--  Admin room management  --}}
        <div>
            @include('partials.Admin.room_management',[
                'total_rooms' => $total_rooms,
                'occupied_rooms' => $occupied_rooms,
                'free_rooms' => $free_rooms,
            ])
        </div>
    {{--  Admin room management  --}}

    {{--  Admin booking management  --}}
        <div>
            @include('partials.Admin.booking_management', [
                'total_bookings' => $total_bookings,
                'todays_bookings' => $todays_bookings,
            ])
        </div>
    {{--  Admin booking management  --}}

    {{--  Admin payment record  --}}
        <div>
            @include('partials.Admin.payment_record',[
                'total_revenue' => $total_revenue,
            ])
        </div>
    {{--  Admin payment record  --}}

</div>
