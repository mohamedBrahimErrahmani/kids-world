<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

// Public Routes
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/category', [ProductController::class, 'index'])->name('category');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{slug}/click', [ProductController::class, 'click'])->name('product.click');
Route::get('/product', function () { // Fallback for old route
    return redirect()->route('category');
});

Route::resource('blog', \App\Http\Controllers\BlogPostController::class);

// Desktop Versions
Route::get('/home-desktop', function () {
    return view('pages.home_desktop');
})->name('home.desktop');

Route::get('/category-desktop', function () {
    return view('pages.category_desktop');
})->name('category.desktop');

Route::get('/product-desktop', function () {
    return view('pages.product_desktop');
})->name('product.desktop');

Route::get('/blog-desktop', function () {
    return view('pages.blog_desktop');
})->name('blog.desktop');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');

    Route::get('/products', [\App\Http\Controllers\AdminController::class, 'products'])->name('products');

    Route::get('/roles', function () {
        return view('admin.roles');
    })->name('roles');

    Route::get('/analytics', [\App\Http\Controllers\AdminController::class, 'analytics'])->name('analytics');

    Route::get('/tiktok', [\App\Http\Controllers\AdminController::class, 'tiktok'])->name('tiktok');

    Route::get('/logs', function () {
        return view('admin.logs');
    })->name('logs');
});
