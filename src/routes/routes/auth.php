<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\{LoginController, LogoutController, RegisterController};
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/register', RegisterController::class)->name('register');
    Route::post('/login', LoginController::class)->name('login');

    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum')->name('logout');
});
