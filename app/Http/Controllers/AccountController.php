<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create()
    {
        return view('account.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'account_name' => 'required|min:3|max:100',
            'account_description' => 'string|nullable',
            'user_name' => 'required|string|min:3|max:100',
            'user_email' => 'required|email|max:255',
            'user_password' => 'required|string|min:8|confirmed',
        ]);

        $account = Account::create([
            'name' => $validateData['account_name'],
            'description' => $validateData['account_description'],
        ]);

        User::create([
            'name' => $validateData['user_name'],
            'email' => $validateData['user_email'],
            'password' => $validateData['user_password'],
            'account_id' => $account->id,
            'role' => 'owner',
        ]);

        return redirect()->route('login');
    }
}
