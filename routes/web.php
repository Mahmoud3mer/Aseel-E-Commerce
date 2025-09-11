<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

// Home Route
Route::get('/', function () {
    $categories = Category::all();
    // dd($categories);
    return view('home', compact('categories'));
})->name('home');

// Products Routes
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('products', [ProductsController::class, 'store'])->name('products.store');
Route::get('products/{productId}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('products/{productId}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('products/{productId}', [ProductsController::class, 'destroy'])->name('products.destroy');

// Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Not Found Route
Route::fallback(function () {
    return view('error.not-found');
});