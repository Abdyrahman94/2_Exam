<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\ProductController;
use App\Http\Controllers\client\CategoryController;
use App\Http\Controllers\Client\RegisterController;

Route::get('/about', function () {
    return view('welcome');
})->name('about.index');

// Route::get('/', function () {
//     return view('client.home.index');
// })->name('home.index');
Route::get('/',[HomeController::class,'home_index'])->name('home.index');
Route::get('locale/{locale}', [HomeController::class, 'locale'])->name('locale')->where('locale', '[a-z]+');

Route::middleware('guest')
    ->middleware('throttle:5,1')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);

        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

// 🛍️ Products
Route::middleware('auth')
    ->group(function () {
        Route::controller(ProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {
                
                // Ähli harytlar (index)
                Route::get('', 'index')->name('index');

                // Bir harydy görkezmek (show)
                Route::get('{id}', 'show')->name('show')->where('id', '[0-9]+');
            });
    });

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('categories.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{slug}', 'show')->name('show');
    });

Route::controller(ContactController::class)
    ->prefix('contact')
    ->name('contact.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
    });