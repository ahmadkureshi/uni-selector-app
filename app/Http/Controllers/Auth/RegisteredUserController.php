<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        // Generate a random 10-digit password
        $randomPassword = Str::random(10);

        // Create the user with the generated password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
        ]);

        // Send the password via email
        Mail::send('emails.welcome', ['user' => $user, 'password' => $randomPassword], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Welcome to Our Platform');
        });

        // Fire the registered event
        event(new Registered($user));

        // Redirect to login or dashboard
        return redirect()->route('login')->with('success', 'Registration successful! Check your email for your password.');
    }
}
