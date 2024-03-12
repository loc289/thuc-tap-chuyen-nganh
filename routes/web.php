<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;





Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/',[IndexController::class, 'a']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
});


 
Auth::routes();