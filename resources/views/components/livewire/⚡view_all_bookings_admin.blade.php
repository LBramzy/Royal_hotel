<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Booking;

new class extends Component
{

    use WithPagination;

    public $search;

    public function updatedSearch(): void{
        $this->resetPage();
    }

    public function paginationView(): string
    {
        return 'pagination::tailwind';
    }

    public function with(): array
    {
        return [
            'bookings' => Booking::query()
                ->when($this->search, function ($query) {
                    $query->where(function ($q) {
                        $q->where('booking_id_number', 'like', '%' . $this->search . '%');
                    });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ];
    }
};
?>

<div wire:poll.10s>
    {{-- We must ship. - Taylor Otwell --}}
    <div class="w-full">
        <div class="flex w-max gap-7 items-center justify-start">
            <h2 class="cinzel text-3xl text-gray-300">View all Bookings</h2>
            <form>
                <div class="flex w-max items-center justify-start gap-3">
                    <input type="text" wire:model.live.debounce.400ms="search" placeholder="Search by: Booking ID" class="manrope outline-none py-2 px-6 w-80 rounded-4xl bg-white text-gray-800 transition-all duration-100 text-sm" /> 
                </div>
            </form>
            <div wire:loading wire:target="search" class="text-xs text-gray-300 manrope">
                Searching...
            </div>
        </div>
        <div class="w-full h-145 rounded-md mt-5 relative gradient_1 overflow-hidden">
            <div class="w-full px-4 py-1 gradient_1 flex items-center justify-space between">
                <div class="text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Booking ID</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Booking Amount</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Room Number</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Persona Name</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-54 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Booking Expiration Date</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-46 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Number of Days Booked</p>
                </div>
            </div>

            <div class="px-4 #py-4 overflow-y-scroll custom_overflow w-full h-95 mt-5">
                <div class="w-full min-h-140 rounded-md relative gradient_1">
                    <table class="w-full">
                        <tr></tr>
                        @foreach($bookings as $booking)
                            <x-book_list :booking="$booking" />
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="px-6 mt-8 w-full">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>