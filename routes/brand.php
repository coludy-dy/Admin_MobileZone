<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::prefix('brand')->name('brand.')->group(function(){
    Route::get('/',[BrandController::class,'index'])->name('index');
    Route::get('create',[BrandController::class,'create'])->name('create');
    Route::post('store',[BrandController::class,'store'])->name('store');
    Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('edit');
    Route::post('update/{brand}',[BrandController::class,'update'])->name('update');
    Route::delete('destroy/{brand}', [BrandController::class, 'destroy'])->name('destroy');

});