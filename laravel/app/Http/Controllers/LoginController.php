<?php

namespace App\Http\LoginControllers;

abstract class Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }
        return back()->with('error', 'Email atau password salah');
    }
}
