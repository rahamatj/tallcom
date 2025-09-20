<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categories = \App\Models\Category::all();
        View::share('categories', $categories);
        View::share('trendingProducts', \App\Models\Product::where('is_trending', true)->get());
    }
}
