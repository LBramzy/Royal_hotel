<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;


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
            'rooms' => Room::with('room_images_relation')
                ->orderBy('room_number')
                ->paginate(8),
        ];
    }
};
?>

<div wire:polls.1s>
    {{-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci --}}

    <div class="mt-10 rounded-md w-full min-h-screen flex items-start justify-start lg:justify-start md:justify-between gap-8 flex-wrap">
        @foreach ($rooms as $room)
            <x-room_card :$room />
        @endforeach
    </div>
    <div class="px-6 py-6 rounded-md gradient_1 w-full h-24 flex items-center mt-7">
        <div class="w-full">
            {{ $rooms->links() }}
        </div>
    </div>
</div>