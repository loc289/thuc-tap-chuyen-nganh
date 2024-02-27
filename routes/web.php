<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\FooterController;




Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// tạo route cho đăng nhập đăng kí
Route::get('/login/facebook', 'Auth\SocialController@redirectToFacebook');
Route::get('/login/facebook/callback', 'Auth\SocialController@handleFacebookCallback');

Route::get('/login/google', 'Auth\SocialController@redirectToGoogle');
Route::get('/login/google/callback', 'Auth\SocialController@handleGoogleCallback');

Route::post('/login/phone', 'Auth\SocialController@loginPhone');