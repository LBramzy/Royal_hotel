<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
      /**
     * Authenticate user
     */

    public function show_sign_in(){
        return view('Auth.sign_in');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard.admin');
        }

        // if ($user->hasRole('receptionist')) {
        //     return redirect()->route('dashboard.receptionist');
        // }

        // if ($user->hasRole('user')) {
        //     return redirect()->route('dashboard.user');
        // }

        // if ($user->hasRole('guest')) {
        //     return redirect()->route('dashboard.guest');
        // }

        return redirect()->route('rooms');
    }

    /**
     * Logout
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
