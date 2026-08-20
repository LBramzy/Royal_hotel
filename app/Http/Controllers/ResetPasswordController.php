<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function reset_password(Request $request, string $token)
    {
        // Controller extracts token + email from the URL...
        return view('Auth.reset_password', [
            'token' => $token,
            'email' => $request->query('email', ''),
        ]);
    }
}
