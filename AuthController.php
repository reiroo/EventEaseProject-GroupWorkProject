<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showAuthPage()
    {
        return view('auth'); // Create a view named 'auth.blade.php'
    }

    public function signIn(Request $request)
    {
        // Handle sign-in logic
        // Validate and authenticate user
        return redirect()->route('dashboard'); // Redirect to dashboard
    }

    public function signUp(Request $request)
    {
        // Handle sign-up logic
        // Validate and create user
        return redirect()->route('dashboard'); // Redirect to dashboard
    }

    public function logout()
    {
        // Handle logout logic
        return redirect()->route('auth.page'); // Redirect to auth page
    }
}
