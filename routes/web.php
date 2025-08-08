<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('dashboard',['active' => 'dashboard']);
    }
    return view('login'); 
});

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard/{active}', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('admin', [LoginController::class, 'admin'])->name('admin');
});