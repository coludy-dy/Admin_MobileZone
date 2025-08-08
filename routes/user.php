<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('customer')->name('user.')->group(function(){
Route::get('/',[UserController::class,'index'])->name('index');
Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
Route::get('view-detail/{user}', [UserController::class, 'viewDetail'])->name('view');


});