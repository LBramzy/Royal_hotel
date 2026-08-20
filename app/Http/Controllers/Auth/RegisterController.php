<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function show_sign_up(){
        return view('Auth.sign_up');
    }
    
    public function store(Request $request){

        $request->validate([
            'fullname' => ['required','string','max:255'],
            'phone' => ['required','numeric','digits:11'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:8'],
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'password' => Hash::make($request->password),
            'password' => bcrypt($request->password),
        ]);
        // dd($user);

        // Assign default role
        $user->assignRole('guest');

         // Fire Laravel's Registered event
        event(new Registered($user));

        // Login automatically
        Auth::login($user);

        // return redirect()->route('customer.dashboard');
        // return redirect()->route('rooms');

        // Redirect to email verification notice
        return redirect()->route('verification.notice');
    }
}
