<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACL</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="flex justify-between p-4">
    <div class="flex space-x-4">
        <div class="hover:text-slate-500">
            <a href="{{ route('home.index') }}">Home</a>
        </div>
        @auth
            <div class="hover:text-slate-500">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </div>
            <div class="hover:text-slate-500">
                <a href="{{ route('report.index') }}">Report</a>
            </div>
            <div class="hover:text-slate-500">
                <a href="{{ route('configuration.index') }}">Configuration</a>
            </div>
            @if(strtolower(auth()->user()->role) === 'owner')
                <div class="hover:text-slate-500">
                    <a href="{{ route('owner.create') }}">Add user</a>
                </div>
            @endif
    </div>
    <div class="flex space-x-2">
        <div class="text-red-500 font-bold">
            <span>{{ auth()->user()->name }}</span>:<span>{{ auth()->user()->role }}</span>
        </div>
        <div class="hover:text-slate-500">
            <form action="{{ route('auth.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Logout</button>
            </form>
        </div>
    </div>
    @endauth

    @guest
        <div>
            <a href="{{ route('login') }}">Login</a>
        </div>
        <div>
            <a href="{{ route('account.create') }}">Register account</a>
        </div>
    @endguest
</nav>

@yield('content')
</body>
</html>
