<?php // resources/views/components/⚡booking/store-booking.blade.php

use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    

    public Room $room;
    public string $booking_days = '';
    public bool $isProcessing = false;
    public bool $alreadyBooked = false;

    public function generateTransactionCode()
    {
        do {
            $code = "RYL-". Str::upper(Str::random(5)) . random_int(1000000, 9999999);
        } while (Booking::where('booking_id_number', $code)->exists());

        return $code;
    }

    public function generatePaymentCode()
    {
        do {
            $code = "PAY-". Str::upper(Str::random(5)) . random_int(1000000, 9999999);
        } while (Payment::where('transaction_id', $code)->exists());

        return $code;
    }

    public function mount(Room $room)
    {
        $this->room = $room;

        // Prevent booking a room that's already currently occupied
        $this->alreadyBooked = $room->isCurrentlyBooked();
    }

    public function getTotalProperty(): float
    {
        $days = (int) ($this->booking_days ?: 0);

        return $days * (float) $this->room->room_price;
    }

    public function storeBooking()
    {
        // Guard 1: block if a request is already in flight (double-click protection)
        if ($this->isProcessing) {
            return;
        }

        // Guard 2: block if the room got booked by someone else since page load
        $this->room->refresh();
        if ($this->room->isCurrentlyBooked()) {
            $this->addError('booking_days', 'This room was just booked by someone else. Please choose another room.');
            $this->alreadyBooked = true;
            return;
        }

        $this->isProcessing = true;

        $this->validate([
            'booking_days' => 'required|integer|min:1',
        ]);

        $bookingIdNumber = $this->generateTransactionCode();
        $transactionId = $this->generatePaymentCode();

        $roomID = $this->room->id;
        $userID = Auth::id();
        $days = (int) $this->booking_days;
        $startDate = now();
        $endDate = $startDate->copy()->addDays($days);

        //dd($roomID);

        $this->room->update([
            'booking_id_number' => $bookingIdNumber,
            'room_occupied' => true,
            'booking_expiration' => $endDate,
        ]);

        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;

        Booking::create([
            'room_id' => $roomID,
            'user_id' => $userID,
            'booking_id_number' => $bookingIdNumber,
            'booking_amount' => $this->total,
            'booking_days' => $days,
            'booking_expiration' => $endDate,
            'booked_room_name' => $this->room->room_name,
            'booked_room_number' => $this->room->room_number,
            'booked_user_name' => $userName,
            'booked_user_email' => $userEmail,
        ]);

        Payment::create([
            'room_id' => $roomID,
            'user_id' => $userID,
            'transaction_id' => $transactionId,
            'amount' => $this->total,
            'reference_number' => 123456789,
            'persona_name' => $userName,
            'persona_email' => $userEmail,
            'payment_status' => 'completed',
            'booking_id_number' => $bookingIdNumber,
        ]);

        $booking = $this->room->booking()->where('booking_id_number', $bookingIdNumber)->first();
        $payment = $this->room->payment()->where('booking_id_number', $bookingIdNumber)->first();

        session()->flash('booking', $booking);
        session()->flash('payment', $payment);

        $this->redirectRoute('booking.details', ['room' => $this->room], navigate: true);
    }
};

?>

<div class="w-full min-h-screen relative px-6 py-6 contact_section" wire:poll.1s.visible>
    <div class="flex items-center justify-between">
        <div>
            @include('partials.nav')
        </div>
    </div>

    <div class="flex items-center justify-center gap-6 w-full h-max mt-30">
        <div class="w-100 gradient_1 px-6 py-6 rounded-md">
            <h2 class="cinzel text-3xl mb-3">Booking</h2>
            <hr class="mb-5">

            @if ($alreadyBooked)
                <div class="mb-4 px-4 py-1.5 bg-red-50 text-red-700 rounded-md text-sm manrope">
                    This room is currently unavailable for booking. Thank you!!!
                </div>
            @endif

            <form wire:submit="storeBooking" class="w-full authentication">
                <div>
                    <input
                        type="text"
                        value="{{ number_format($room->room_price, 2) }}"
                        placeholder="Booking Amount"
                        readonly
                    />
                </div>

                <div>
                    <input
                        type="text"
                        wire:model.live="booking_days"
                        placeholder="Number of days"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        {{ $alreadyBooked ? 'disabled' : '' }}
                    />
                    @error('booking_days')
                        <span class="text-sm text-red-600 manrope">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <h2 class="text-lg manrope">
                        Total: &#8358; <span>{{ number_format($this->total, 2) }}</span>
                    </h2>
                </div>

                <div class="mt-3">
                    <input
                        type="submit"
                        value="{{ $isProcessing ? 'Processing...' : 'Proceed to Payment' }}"
                        wire:loading.attr="disabled"
                        wire:target="storeBooking"
                        {{ $isProcessing || $alreadyBooked ? 'disabled' : '' }}
                    />
                </div>
            </form>
        </div>
    </div>
</div>