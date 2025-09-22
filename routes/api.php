<?php

Route::get('/api/categorized-products/{category}', [\App\Http\Controllers\APIController::class, 'categorizedProducts'])->name('api.categorized-products');
