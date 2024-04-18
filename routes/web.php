<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\MovieController;




Route::namespace('App\Http\Controllers')->group(function () {
    // Route::get('/',[IndexController::class, 'homepage'])->name('homepage');
    Route::get('/yeu-thich',[IndexController::class, 'favorite'])->name('favorite');
    Route::get('/xu-huong',[IndexController::class, 'trending'])->name('trending');
    Route::get('/sap-ra-mat',[IndexController::class, 'comming'])->name('comming');
    Route::get('/phim',[IndexController::class, 'movie'])->name('movie');
    Route::get('/xem-phim',[IndexController::class, 'watch'])->name('watch');
    
});

// Route để chuyển hướng người dùng đến Google
Route::get('login/google', [AuthLoginController::class, 'redirectToProvider']);

// Route để xử lý phản hồi từ Google
Route::get('login/google/callback', [AuthLoginController::class, 'handleProviderCallback']);

Route::get('/',[MovieController::class, 'index']);


Auth::routes();