<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('product')->controller(ProductController::class)->group(function (){

Route::get('/','index')->name('product.index');
Route::get('/create','create');
Route::post('/store', 'store')->name('product.store');
Route::get('/{producto}','show');
Route::delete('/{product}', 'destroy')->name('product.destroy');

});

Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');
Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{cartItem}', [ProductController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

Route::prefix('admin/categories')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('categories.index');
    Route::get('/create', 'create')->name('categories.create');
    Route::post('/store', 'store')->name('categories.store');
    Route::delete('/{category}', 'destroy')->name('categories.destroy');
});

