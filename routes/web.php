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


 
Auth::routes();