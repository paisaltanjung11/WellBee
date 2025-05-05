<?php

namespace App\Http\RegisterControllers;

abstract class Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first name' => 'required|string|max:255',
            'last name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'first name' => $request->firstname,
            'last name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login');
    }
}