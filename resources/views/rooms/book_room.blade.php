<x-app>
    {{--  <div class="w-full min-h-screen relative px-6 py-6 contact_section">
        <div class="flex items-center justify-between">
            <h2 class="cinzel text-3xl">Royal Hotel</h2>

            <div>
                @include('partials.nav')
            </div>
        </div>

        <div class="flex items-center justify-center gap-6 w-full h-max mt-30">

            <div class="w-100 gradient_1 px-6 py-6 rounded-md">
                <h2 class="cinzel text-3xl mb-3">Booking</h2>
                <hr class="mb-5">
                <div>
                    <form class="w-full authentication" action="{{ route('store.booking', $room) }}" method="POST">

                        @csrf
                        @method('POST')

                        <div>
                            <input type="text" name="booking_amount" id="booking_amount" value="{{ $room->room_price }}" placeholder="Booking Amount" readonly />
                        </div>
                        <div>
                            <input type="text" name="booking_days" id="booking_days" placeholder="Number of days" inputmode="numeric" onchange="change_price(this)" data-id={{ $room->room_price }} pattern="[0-9]*" required   />
                        </div>
                        <div>
                            <h2 class="text-lg manrope ">Total: &#8358; <span id="booking_total">{{ $room->room_price }}</span></h2>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Proceed to Payment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  --}}

    <livewire:livewire.store-booking :$room />

    {{--  Script  --}}
    <div>
        @include('scripts.book_room_script')
    </div>
    {{--  Script  --}}

</x-app>


