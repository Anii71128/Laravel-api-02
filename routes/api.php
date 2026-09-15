<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
    Route::middleware('jwt')->group(function () {

        Route::post('logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::get('me', [AuthController::class, 'me'])
            ->name('me');

        Route::post('refresh', [AuthController::class, 'refresh'])
            ->name('refresh');
    });
});
Route::middleware('jwt')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
    Route::apiResource('kategori', KategoriController::class);
});
