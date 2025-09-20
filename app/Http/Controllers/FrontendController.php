<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home', [
            'categories' => \App\Models\Category::where('is_featured', true)->get(),
            'products' => \App\Models\Product::with('category')->latest()->take(8)->get(),
        ]);
    }
}
