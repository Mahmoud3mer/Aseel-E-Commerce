<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        
        return view('categories.index', compact('categories', 'products'));
    }
}
