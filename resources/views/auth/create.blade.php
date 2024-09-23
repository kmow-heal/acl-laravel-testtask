@extends('layouts.app')

@section('content')
    <div class="p-4 flex justify-center">
        <form action="{{ route('auth.store') }}" method="POST"
              class="space-y-2">
            @csrf
            <h2 class="text-xl font-semibold">Login</h2>
            <div>
                <div class="flex justify-between">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"
                           class="border border-slate-500 w-2/3"
                           value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-between">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                           class="border border-slate-500 w-2/3">
                </div>
                @error('password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <div class="flex justify-start space-x-4">
                    <label for="remember">Remember me</label>
                    <input type="checkbox" id="remember" name="remember"
                           class="border border-slate-500">
                </div>
                @error('remember')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <button
                class="p-2 w-full border border-slate-700 bg-slate-50 rounded-md hover:bg-white hover:text-slate-500">
                Sign in
            </button>
        </form>
    </div>
@endsection
