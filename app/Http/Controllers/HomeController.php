<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $newProducts = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $categories = Category::all();
        // dd($categories);
        return view('home', compact('categories', 'newProducts'));
    }
}
