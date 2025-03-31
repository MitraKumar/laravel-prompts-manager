<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OtpController extends Controller
{
    public function show(Request $request)
    {
        return view("auth.otp");
    }


    public function store(Request $request)
    {

        $request->validate([
            'otp' => ['required'],
        ]);

        $user_otp = $request->session()->get('user_otp');
        if ($user_otp !== $request->input('otp')) {
            throw ValidationException::withMessages([
                'otp' => "Not a valid OTP"
            ]);
        }

        $user_email = $request->session()->get('user_email');
        $user_password = $request->session()->get('user_password');
        Auth::attempt([
            'email' => $user_email,
            'password' => $user_password,
        ]);

        $request->session()->pull('user_email');
        $request->session()->pull('user_password');
        $request->session()->pull('user_otp');

        return redirect("/prompts");
    }
}
