<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('product')->name('product.')->group(function() {
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('create', [ProductController::class, 'create'])->name('create');
    Route::post('store',[ProductController::class,'store'])->name('store');
    Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::post('update/{product}',[ProductController::class,'update'])->name('update');
    Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('view-detail/{product}', [ProductController::class, 'viewDetail'])->name('view');
});

