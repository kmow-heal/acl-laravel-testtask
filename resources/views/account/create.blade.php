@extends('layouts.app')

@section('content')
    <div class="p-4 flex justify-center">
        <form action="{{ route('account.store') }}" method="POST"
              class="space-y-2">
            @csrf
            <h2 class="text-xl font-semibold">Account</h2>
            <div>
                <div class="flex justify-between">
                    <label for="account_name">Name:</label>
                    <input type="text" id="account_name" name="account_name"
                           class="border border-slate-500 w-2/3"
                           value="{{ old('account_name') }}">
                </div>
                @error('account_name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-between">
                    <label for="account_description">Description:</label>
                    <textarea id="account_description" name="account_description"
                              class="border border-slate-500 w-2/3">
                        {{ old('account_description') }}
                    </textarea>
                </div>
                @error('account_description')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <h2 class="text-xl font-semibold">User information</h2>
            <div>
                <div class="flex justify-between">
                    <label for="user_name">Name:</label>
                    <input type="text" id="user_name" name="user_name"
                           class="border border-slate-500 w-2/3"
                           value="{{ old('user_name') }}">
                </div>
                @error('user_name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-between">
                    <label for="user_email">Email:</label>
                    <input type="text" id="user_email" name="user_email"
                           class="border border-slate-500 w-2/3"
                           value="{{ old('user_email') }}">
                </div>
                @error('user_email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-between">
                    <label for="user_password">Password:</label>
                    <input type="password" id="user_password" name="user_password"
                           class="border border-slate-500 w-2/3">
                </div>
                @error('user_password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-between">
                    <label for="user_password_confirmation">Confirm:</label>
                    <input type="password" id="user_password_confirmation" name="user_password_confirmation"
                           class="border border-slate-500 w-2/3">
                </div>
                @error('user_password_confirmation')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <button
                class="p-2 w-full border border-slate-700 bg-slate-50 rounded-md hover:bg-white hover:text-slate-500">
                Create Account
            </button>
        </form>
    </div>
@endsection
