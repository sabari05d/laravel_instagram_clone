<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function registerPage()
    {
        if (Auth::check()) {
            return redirect('/' . Auth::user()->username);
        }

        return view('auth.register');
    }

    // Register User
    public function saveUserData(Request $request)
    {
        // You can also validate here if needed

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'username.unique' => 'Username is already taken.',
            'email.unique' => 'Email is already registered.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        // Save the user with hashed password
        User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Secure password
        ]);

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }

    // Login Check
    public function checkUser(Request $request)
    {
        // Validate inputs
        $credentials = $request->validate([
            'login_id' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Try login with email
        filter_var($credentials['login_id'], FILTER_VALIDATE_EMAIL) ? $fieldType = 'email' : $fieldType = 'username';

        // Attempt authentication
        if (Auth::attempt([$fieldType => $credentials['login_id'], 'password' => $credentials['password']])) {
            $request->session()->regenerate(); // Regenerate session to prevent fixation

            // Redirect to user's dashboard
            return redirect('/' . Auth::user()->username);
        }

        // Login failed
        return back()->withErrors([
            'login_id' => 'Invalid login credentials.',
        ])->withInput(); // Return old input (except password)

    }

    // Logout User
    public function logoutUser(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('login'); // Redirect to login page
    }

}
