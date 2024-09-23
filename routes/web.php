<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\IsAuthenticate;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('home.index'));
Route::resource('home', HomeController::class);

Route::middleware([IsAuthenticate::class])->group(function () {
    Route::get('login', fn() => to_route('auth.create'))
        ->name('login');
    Route::resource('auth', AuthController::class)
        ->only(['create', 'store']);
});

Route::delete('logout', fn() => to_route('auth.destroy'))
    ->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::resource('account', AccountController::class)
    ->only(['create', 'store']);

Route::resource('owner', OwnerController::class)
    ->only(['create', 'store']);

Route::resource('dashboard', DashboardController::class)
    ->only(['index']);

Route::resource('report', ReportController::class)
    ->only(['index']);

Route::resource('configuration', ConfigurationController::class)
    ->only(['index']);

