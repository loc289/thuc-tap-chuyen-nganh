<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
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

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('users', UserController::class);
        Route::get('/users/view-change-password/{user}', [UserController::class, 'viewChangePassword'])->name('users.view-change-password');
        Route::post('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');
    });
    require __DIR__.'/auth.php';
});

// Route::namespace('App\Http\Controllers')->group(function () {
//     // Route::get('/',[IndexController::class, 'homepage'])->name('homepage');
//     Route::get('/yeu-thich', [IndexController::class, 'favorite'])->name('favorite');
//     Route::get('/xu-huong', [IndexController::class, 'trending'])->name('trending');
//     Route::get('/sap-ra-mat', [IndexController::class, 'comming'])->name('comming');
//     Route::get('/phim', [IndexController::class, 'movie'])->name('movie');
//     Route::get('/xem-phim', [IndexController::class, 'watch'])->name('watch');
// });

// Route để chuyển hướng người dùng đến Google
Route::get('login/google', [AuthLoginController::class, 'redirectToProvider'])->name('web.login');

// Route để xử lý phản hồi từ Google
Route::get('login/google/callback', [AuthLoginController::class, 'handleProviderCallback']);

Route::get('/', [MovieController::class, 'index'])->name('web.home');
Route::get('/chi-tiet-phim/{id}', [MovieController::class, 'show'])->name('web.movie-detail');
Route::get('/danh-muc/{id}', [MovieController::class, 'category'])->name('web.movie-category');
Route::get('/tim-kiem', [MovieController::class, 'search'])->name('web.movie-search');
Route::get('/xem-phim/{id}', [MovieController::class, 'watch'])->name('web.movie-watch');
Route::post('/thich-phim/{id}', [MovieController::class, 'like'])->name('web.movie-like');
Route::get('/yeu-thich', [MovieController::class, 'favorites'])->name('web.favorites');

// Auth::routes();
