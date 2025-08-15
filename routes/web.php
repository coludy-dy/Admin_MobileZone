<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

// Show login form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle login submission
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Protected routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard/{active}', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('admin', [LoginController::class, 'admin'])->name('admin');
});
