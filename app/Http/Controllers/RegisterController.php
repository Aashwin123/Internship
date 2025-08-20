<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Dispatch the queued job
        SendWelcomeEmail::dispatch($user);
        // OR: dispatch(new SendWelcomeEmail($user));

        // Redirect after registration
        return redirect('/home')->with('success', 'Registration successful! Check your email.');
    }
}
