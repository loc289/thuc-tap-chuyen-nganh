<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;





Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/',[IndexController::class, 'homepage'])->name('homepage');
    Route::get('/yeu-thich',[IndexController::class, 'favorite'])->name('favorite');
    Route::get('/xu-huong',[IndexController::class, 'trending'])->name('trending');
    Route::get('/sap-ra-mat',[IndexController::class, 'comming'])->name('comming');
    Route::get('/phim',[IndexController::class, 'movie'])->name('movie');
    Route::get('/xem-phim',[IndexController::class, 'watch'])->name('watch');
    
});

// Người dùng sau khi đăng nhập sẽ hiện ra giao diện đăng nhâp
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

 
Auth::routes();