<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function loginProcess(Request $request) {
    
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            session()->flash('success', 'Login successful!');
            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid credentials');

    }

    public function registerProcess(Request $request) {
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        session()->flash('success', 'Registration successful!');
        return redirect()->route('home');

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
