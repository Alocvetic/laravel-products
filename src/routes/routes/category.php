<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->name('category.')->group(function () {
    // READ
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [CategoryController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [CategoryController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [CategoryController::class, 'delete'])->name('delete');
});
