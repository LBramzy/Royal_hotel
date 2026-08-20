<?php

use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

new class extends Component
{
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(string $token, string $email = '')
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword(){

        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],

            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));
            $this->redirectRoute('login', navigate: true);
        } else {
            $this->addError('email', __($status));
        }
    }
};
?>

<div>
    {{-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant --}}

    <div class="max-w-md mx-auto mt-10 gradient_1 px-6 py-6 rounded-md">
        <h1 class="text-md manrope mb-2">Reset your password</h1>
        <hr style="border:1px solid white;">

        <form wire:submit="resetPassword" class="space-y-4 add_room mt-3 manrope">
            <div>
                <label class="text-sm mb-1">Email</label>
                <input type="email" wire:model="email" class="w-full rounded-lg border-gray-300">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-sm mb-1">New password</label>
                <input type="password" wire:model="password" class="w-full rounded-lg border-gray-300">
                @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-sm mb-1">Confirm password</label>
                <input type="password" wire:model="password_confirmation" class="w-full rounded-lg border-gray-300">
            </div>

            <button type="submit" wire:loading.attr="disabled" class="w-full rounded-md golden_background text-sm py-1.5 text-gray-300 cursor-pointer hover:text-gray-700 duration-400 transition-all">Reset password</button>
        </form>
    </div>
</div>