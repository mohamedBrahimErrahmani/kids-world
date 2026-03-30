<?php

use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/category', function () {
    return view('pages.category');
})->name('category');

Route::get('/product', function () {
    return view('pages.product');
})->name('product');

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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('products');

    Route::get('/roles', function () {
        return view('admin.roles');
    })->name('roles');

    Route::get('/analytics', function () {
        return view('admin.analytics');
    })->name('analytics');

    Route::get('/tiktok', function () {
        return view('admin.tiktok');
    })->name('tiktok');

    Route::get('/logs', function () {
        return view('admin.logs');
    })->name('logs');
});
