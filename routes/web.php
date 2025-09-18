<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/categories/all', 'admin.categories.index')->name('categories.all');
    Route::view('/categories/create', 'admin.categories.create')->name('categories.new');
    Route::view('/categories/{category}/edit', 'admin.categories.edit')->name('categories.edit');
    Route::view('/categories/{category}/delete', 'admin.categories.delete')->name('categories.delete');
});

