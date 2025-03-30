<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function show() {
        return view("auth.login");
    }

    public function create(Request $request) {

        $request->validate([
            "email" => ["required", "email"],
        ]);

        $login_successfull = Auth::attempt([
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ]);

        if (!$login_successfull) {

        }

        return redirect("/prompts");
    }


    public function destroy(Request $request) {

        Auth::logout();

        return redirect("/");
    }
}
