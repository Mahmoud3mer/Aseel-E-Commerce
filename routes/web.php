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

// Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');