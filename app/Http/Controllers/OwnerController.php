<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OwnerController extends Controller
{
    public function create()
    {
        Gate::authorize('onlyOwner', 'role');
        return view('owners.create', [
            'roles' => array_combine(array_map('ucfirst', User::$roleForOwner), User::$roleForOwner)
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('onlyOwner', 'role');
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:' . implode(',', User::$roleForOwner)
        ]);
        $validatedData['account_id'] = $request->user()->account->id;
        User::create($validatedData);
        return redirect()->route('dashboard.index');
    }
}
