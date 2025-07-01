<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user_form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Assuming you have a User model
        \App\Models\User::create($validatedData);

        return redirect()->route('user.create')->with('success', 'User created successfully.');
    }
}
