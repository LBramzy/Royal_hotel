<?php

// app/Http/Controllers/Auth/SocialAuthController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrNew(['email' => $googleUser->getEmail()]);

        $isNewUser = ! $user->exists;

        $user->fill([
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'email_verified_at' => now(),
        ]);

        if (! $user->exists) {
            $user->password = Hash::make(Str::random(24));
        }

        $user->save();

        if ($isNewUser) {
            $user->assignRole('guest');
        }

        Auth::login($user);

        return redirect()->intended(route('rooms', absolute: false));
    }
}