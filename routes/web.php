<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use PhpParser\Builder\Class_;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
});
//products
Route::get('/test',[ProductController::class, 'show']);
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/detail', [ProductController::class, 'showByCode'])->name('product.show');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
