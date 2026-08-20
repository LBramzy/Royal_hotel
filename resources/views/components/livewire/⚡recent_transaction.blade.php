<?php

use Livewire\Component;
use App\Models\Payment;

new class extends Component
{
    public function with(): array
    {
        return [
            'payments' => Payment::query()
                ->orderBy('created_at', 'desc')
                ->paginate(4),
        ];
    }
};
?>

<div class="w-full" wire:poll.5s>
    {{-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius --}}
    <div class="bg-white rounded-md w-full px-4 py-3 lg:h-50 h-60">
        <div class="#px-4 py-1 w-full">
            @foreach($payments as $payment)
                <x-recent_transactions :payment="$payment" />
            @endforeach
        </div>
        </table>
    </div>
</div>