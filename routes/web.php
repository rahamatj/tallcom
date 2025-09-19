<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/dashboard');

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    Route::view('/categories/all', 'admin.categories.index')->name('categories.all');
    Route::view('/categories/create', 'admin.categories.create')->name('categories.new');
    Route::view('/categories/{category}/edit', 'admin.categories.edit')->name('categories.edit');

    Route::view('/products/all', 'admin.products.index')->name('products.all');
    Route::view('/products/create', 'admin.products.create')->name('products.new');
    Route::view('/products/{product}/edit', 'admin.products.edit')->name('products.edit');
});

