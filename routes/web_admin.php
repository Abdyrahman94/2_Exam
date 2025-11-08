<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [LoginController::class, 'create'])->name('login');
        Route::post('/login', [LoginController::class, 'store']);
    });

    Route::middleware('auth:admin')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware('auth:admin')
    ->group(function () {
        Route::controller(ProductController::class)
                   ->prefix('products')
                   ->name('products.')
                   ->group(function () {
                       Route::get('create', 'create')->name('create');
                       Route::post('', 'store')->name('store');
                       Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                       Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                       Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');

                       Route::get('', 'index')->name('index');
                   });
    });
});
