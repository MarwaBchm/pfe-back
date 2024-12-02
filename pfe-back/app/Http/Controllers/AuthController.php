<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Prevent CSRF attacks

        return response()->json(['message' => 'Logged out successfully']);
    }

    // Get authenticated user (optional)
    public function user(Request $request)
    {
        return response()->json(Auth::user());
    }

    // Register a new user
    public function register(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // password_confirmation is required
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        return response()->json(['message' => 'Registration successful', 'user' => $user], 201);
    }
}
