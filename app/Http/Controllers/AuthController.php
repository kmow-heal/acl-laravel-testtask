<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = request(['email', 'password']);
        $remember = $request->filled('remember');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home.index');
    }
}
