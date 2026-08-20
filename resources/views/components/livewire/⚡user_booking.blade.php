<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    use WithPagination;

    public function paginationView(): string
    {
        return 'pagination::tailwind';
    }

    public function with(): array
    {
        return [
            'bookings' => Auth::user()
                ->bookings() // uses the User::bookings() hasMany relation
                ->with('room') // eager load to avoid N+1
                ->latest()
                ->paginate(10),
        ];
    }

};
?>

<div wire:poll.3s.visible>
    {{-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger --}}

    <div class="w-full lg:h-145 md:h-205 h-136 rounded-md mt-5 relative gradient_1 overflow-hidden overflow-x-scroll md:overflow-x-hidden">
        <div class="hidden lg:w-full w-max px-4 py-1 gradient_1 lg:flex items-center justify-space between">
            <div class="text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Booking ID</p>
            </div>
            <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Room Name</p>
            </div>
            <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Room Number</p>
            </div>
            <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Booking Price</p>
            </div>
            <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Booking Expiration</p>
            </div>
            <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                <p class="manrope text-gray-100 font-bold text-sm">Booking Status</p>
            </div>
        </div>

         <div class="lg:hidden md:block sm:block #px-4 #py-4 overflow-y-scroll custom_overflow w-full h-113 md:h-180 #mt-5">
            <div class="w-full min-h-140 rounded-md relative gradient_1">
                @foreach($bookings as $booking)
                    <x-booking_list_sm :booking="$booking" />
                @endforeach
            </div>
        </div>

        <div class="hidden lg:block px-4 #py-4 overflow-y-scroll custom_overflow md:w-full w-max h-105 mt-5">
            <div class="w-full min-h-140 rounded-md relative gradient_1">
                <table class="w-full md:block hidden">
                    <tr></tr>
                    @foreach($bookings as $booking)
                        <x-booking_list :booking="$booking" />
                    @endforeach
                </table>
            </div>
        </div>

        <div class="px-6 mt-8">
            {{ $bookings->links() }}
        </div>
    </div>
</div>
