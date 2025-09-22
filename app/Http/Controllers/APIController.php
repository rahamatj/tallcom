<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function categorizedProducts(Category $category) {
        return response()->json([
            'category' => $category,
            'products' => $category->products()->paginate(12)
        ]);
    }
}
