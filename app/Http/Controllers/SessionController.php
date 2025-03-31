<?php

namespace App\Http\Controllers;

use App\Mail\UserOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function show() {
        return view("auth.login");
    }

    public function create(Request $request) {

        $request->validate([
            "email" => ["required", "email"],
        ]);
        
        $login_successfull = Auth::validate([
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ]);
        if (!$login_successfull) {
            throw ValidationException::withMessages([
                'email' => "Incorrect username or password",
            ]);
        }

        // Generate OTP
        $otp = random_int(100000, 999999);
        $request->session()->put('user_email', $request->input('email'));
        $request->session()->put('user_password', $request->input('password'));
        $request->session()->put('user_otp', strval($otp));

        // Send OTP (via Mail)
        Mail::to($request->input('email'))->send(new UserOTP($otp));

        // Redirect to OTP Page.
        return redirect("/login/otp");
    }


    public function destroy(Request $request) {

        Auth::logout();

        return redirect("/");
    }
}
