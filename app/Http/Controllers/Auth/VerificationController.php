<?php

// app/Http/Controllers/Auth/VerificationController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function notice()
    {
        // If already verified, send them on
        if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
            return redirect('/rooms');
        }

        return view('auth.verify-email');
    }

    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        // Validate the hash matches the user's email (this is what makes the signed URL trustworthy)
        if (! hash_equals(sha1($user->getEmailForVerification()), (string) $hash)) {
            abort(403, 'Invalid verification link.');
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        // Log the user in regardless of whether they were already authenticated,
        // or on a different device/browser than where they registered.
        Auth::login($user);

        return redirect('/rooms')->with('verified', true);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/rooms');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
