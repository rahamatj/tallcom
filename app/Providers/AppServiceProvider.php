<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
//        Paginator::useBootstrapFive();

        View::share('categories', \App\Models\Category::all());
        View::share('trendingProducts', \App\Models\Product::where('is_trending', true)->get());
        View::share('trendingProducts', \App\Models\Product::where('is_trending', true)->get());
        View::share('youMayAlsoLikeProducts', \App\Models\Product::inRandomOrder()->take(8)->get());
    }
}
