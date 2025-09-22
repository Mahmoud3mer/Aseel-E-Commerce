<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Models\Category;


// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Home Route
Route::get('/', function () {
    $categories = Category::all();
    // dd($categories);
    return view('home', compact('categories'));
})->name('home');

// Products Routes
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create')->middleware([ 'auth', 'can:is_admin' ]);
Route::post('products', [ProductsController::class, 'store'])->name('products.store')->middleware([ 'auth', 'can:is_admin' ]);
Route::get('products/{productId}/edit', [ProductsController::class, 'edit'])->name('products.edit')->middleware([ 'auth', 'can:is_admin' ]);
Route::put('products/{productId}', [ProductsController::class, 'update'])->name('products.update')->middleware([ 'auth', 'can:is_admin' ]);
Route::delete('products/{productId}', [ProductsController::class, 'destroy'])->name('products.destroy')->middleware([ 'auth', 'can:is_admin' ]);
// Search Route
Route::post('/search', [ProductsController::class, 'search'])->name('products.search');


// Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware([ 'auth', 'can:is_admin' ]);
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware([ 'auth', 'can:is_admin' ]);

// Customers Route
Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
Route::post('/customers', [CustomersController::class, 'store'])->name('customers.store')->middleware('auth');

// Cart Routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{cartItemId}', [CartController::class, 'updateCartItem'])->name('cart.update');
    Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


// Test Route
Route::get('/test', function () {
    $categories = Category::all();
    return view('test', compact('categories'));
});

// Not Found Route
Route::fallback(function () {
    return view('error.not-found');
});