<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('auth.register');
    }

    public function create(Request $request) {

        $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "password" => ["required", "confirmed"],
        ]);

        $user = User::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
        ]);

        Auth::login($user);

        return redirect("/prompts");
    }
}
