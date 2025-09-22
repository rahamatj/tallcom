<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function categorizedProducts(Category $category) {
        return view('frontend.categorized-products', [
            'category' => $category
        ]);
    }

    public function product(Product $product) {
        return view('frontend.product-details', [
            'product' => $product
        ]);
    }
}
