<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payment;

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
            'payments' => Payment::query()
                ->when($this->search, function ($query) {
                    $query->where(function ($q) {
                        $q->where('booking_id_number', 'like', '%' . $this->search . '%')
                            ->orWhere('transaction_id', 'like', '%' . $this->search . '%');
                    });
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ];
    }
};
?>

<div wire:poll.10s>
    {{-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison --}}

    <div class="w-full">
        <div class="flex w-max gap-7 items-center justify-start">
            <h2 class="cinzel text-3xl text-gray-300">All payment history</h2>
            <form>
                <div class="flex w-max items-center justify-start gap-3">
                    <input type="text" wire:model.live.debounce.400ms="search" placeholder="Search by: Book ID / Transaction ID" class="manrope outline-none py-2 px-6 w-80 rounded-4xl bg-white text-gray-800 transition-all duration-100 text-sm" />
                </div>
            </form>
            <div wire:loading wire:target="search" class="text-xs text-gray-300 manrope">
                Searching...
            </div>
        </div>
        <div class="w-full h-145 rounded-md mt-5 relative gradient_1 overflow-hidden">
            <div class="w-full px-4 py-1 gradient_1 flex items-center justify-space between">
                <div class="text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Transaction ID</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Booking ID</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Reference Number</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Amount</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Persona Name</p>
                </div>
                <div class="border-2 border-l-black border-r-transparent border-t-transparent border-b-transparent text-sm font-bold text-gray-100 w-50 text-center py-3">
                    <p class="manrope text-gray-100 font-bold text-sm">Persona Email</p>
                </div>
            </div>

            <div class="px-4 #py-4 overflow-y-scroll custom_overflow w-full h-95 mt-5">
                <div class="w-full min-h-140 rounded-md relative gradient_1">
                    <table class="w-full">
                        <tr></tr>
                        @foreach($payments as $payment)
                            <x-payment_list :payment="$payment" />
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="px-6 mt-8">
                {{ $payments->links() }}
        </div>
    </div>
</div>

