<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConfigurationController extends Controller
{
    public function index()
    {
        Gate::authorize('notEmployee', 'role');
        return view('configuration/index');
    }
}
