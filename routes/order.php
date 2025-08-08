<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::prefix('order')->name('order.')->group(function() {
    Route::get('/',[OrderController::class,'index'])->name('index');
    Route::delete('destroy/{order}', [OrderController::class, 'destroy'])->name('destroy');
    Route::get('view-detail/{order}', [OrderController::class, 'viewDetail'])->name('view');

});
