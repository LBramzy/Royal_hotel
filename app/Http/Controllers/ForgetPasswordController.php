<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function forgot_password(){
        return view('Auth.forgot_password');
    }
}
