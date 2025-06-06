<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function follow(User $user)
    {
        // dd($user);
        $user->followers()->attach(
            Auth::user()->id,
        );
        Log::create([
            "type" => "info",
            "message" => "User " . Auth::user()->name . " started, following " . $user->name . ".",
            "user_id" => Auth::user()->id,
        ]);

        return redirect('/profile/' . $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function unfollow(User $user)
    {
        // dd($user);
        $user->followers()->detach(
            Auth::user()->id,
        );

        Log::create([
            "type" => "info",
            "message" => "User " . Auth::user()->name . " unfollowed " . $user->name . ".",
            "user_id" => Auth::user()->id,
        ]);

        return redirect('/profile/' . Auth::user()->id);
    }
}
