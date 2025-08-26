<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        $username = Auth::user()->username;
        return redirect("/$username");
    }

    return view('auth.login');
})->name('login');
Route::get('/sign-up', [AuthController::class, 'registerPage'])->middleware('guest')->name('registerUser');

Route::post('/sign-in', [AuthController::class, 'checkUser'])->name('check-user');
Route::post('/sign-up', [AuthController::class, 'saveUserData'])->name('register-user');
Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout-user');

Route::get('/{username}', [UserHomeController::class, 'showUserHome'])
    ->middleware('auth')
    ->name('user.dashboard');

Route::middleware('auth')->prefix('{username}')->group(function () {
    Route::get('/', [UserHomeController::class, 'showUserHome'])->name('user.dashboard');

    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('user.profile');

    Route::get('/post', [UserPostController::class, 'postIndexPage'])->name('user.posts');
    Route::post('/add-post', [UserPostController::class, 'savePost'])->name('user.add-post');
    Route::get('/view-post/{post}', [UserPostController::class, 'viewPost'])->name('user.view-post');

    // Add more as needed
});


