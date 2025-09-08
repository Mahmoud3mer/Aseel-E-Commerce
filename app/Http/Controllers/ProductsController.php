<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){

        $category_id = request()->get('category');

        if ($category_id) {
            $products = Product::where('category_id', $category_id)->get();
        } else {
            $products = Product::all();
        }

        return view('products.index', compact('products'));
    }
}
