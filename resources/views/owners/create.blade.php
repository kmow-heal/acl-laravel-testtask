@extends('layouts.app')

@section('content')
    <div class="p-4 flex justify-center">
        <form action="{{ route('owner.store') }}" method="POST"
              class="space-y-2">
            @csrf
            <h2 class="text-xl font-semibold">Adding user</h2>
            <div>
                <div class="flex justify-between">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"
                           class="border border-slate-500 w-2/3"
                    value="{{ old('name') }}">
                </div>
                @error('name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
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
            <div class="flex justify-between">
                @foreach($roles as $label => $value)
                    <div>
                        <label for="role">
                            {{ $label }}
                            <input type="radio" name="role" value="{{ $value }}"
                                   class="border border-slate-500"
                            @checked($value===(old('role') ?? request('role')))>
                        </label>
                    </div>
                @endforeach
                @error('role')
                {{ $message }}
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
                <div class="flex justify-between">
                    <label for="password_confirmation">Confirm:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="border border-slate-500 w-2/3">
                </div>
                @error('password_confirmation')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <button class="p-2 w-full border border-slate-700 bg-slate-50 rounded-md hover:bg-white hover:text-slate-500">
                Add user
            </button>
        </form>
    </div>
@endsection
