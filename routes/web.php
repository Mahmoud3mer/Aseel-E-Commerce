<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AuthController;
use App\Models\Category;


// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

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
// Search Route
Route::post('/search', [ProductsController::class, 'search'])->name('products.search');


// Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Customers Route
Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store')->middleware('auth');


// Not Found Route
Route::fallback(function () {
    return view('error.not-found');
});