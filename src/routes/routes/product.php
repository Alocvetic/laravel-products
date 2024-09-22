<?php

declare(strict_types=1);

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('product')->name('product.')->group(function () {
    // READ
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [ProductController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [ProductController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete');
});
