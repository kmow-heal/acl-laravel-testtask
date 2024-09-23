<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function index()
    {
        Gate::authorize('viewAny', 'role');
        return view('dashboards/index');
    }
}
