<?php

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public string $email = '';
    public string $status = '';

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Throttle to prevent abuse (Laravel handles this internally per email/IP)
        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->status = __($status);
            $this->reset('email');
        } else {
            $this->addError('email', __($status));
        }
    }
};
?>

<div class="flex items-center justify-center w-full h-130">
    {{-- He who is contented is rich. - Laozi --}}


    <div class="gradient_1 px-6 py-6 w-100 rounded-md">
        <h1 class="text-md mb-3 manrope">Forgot your password ?</h1>
        <hr style="border:1px solid white;">
        <p class="text-gray-300 mb-6 text-sm mt-3">
            No problem. Enter your email and we'll send you a password reset link to the email.
        </p>

        @if ($status)
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded-lg text-sm manrope">
                {{ $status }}
            </div>
        @endif

        <form wire:submit="sendResetLink" class="space-y-4 add_room">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                    autofocus
                >
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full text-sm text-gray-300 golden_background manrope cursor-pointer py-2 rounded-md hover:bg-blue-700 data-loading:opacity-50"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Send reset link</span>
                <span wire:loading>Sending...</span>
            </button>
        </form>

        <p class="text-sm text-gray-500 mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Back to login</a>
        </p>
    </div>

</div>