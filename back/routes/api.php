<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UniversityController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('auth/login', [AuthController::class, 'login'])->name('login');

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('auth/register', [AuthController::class, 'register'])->name('register');
    Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('auth/profile', [AuthController::class, 'profile'])->name('profile');

    // University routes
    Route::post('universities/{university}/subscribe', [UniversityController::class, 'subscribeUser']);
    Route::delete('universities/{university}/subscribe', [UniversityController::class, 'unsubscribeUser']);
    Route::resource('universities', UniversityController::class);

    // User routes
    Route::get('users/universities', [UserController::class, 'universities'])->name('users.universities');
    Route::resource('users', UserController::class);
    
});
