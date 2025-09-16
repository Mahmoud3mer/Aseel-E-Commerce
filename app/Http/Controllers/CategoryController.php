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

    public function create()
    {
        return view('categories.ajax.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image_path')) {
           $image = $request->file('image_path');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().rand(1, 1000).'.'.$extension;
            $image->move(public_path('upload'), $fileName);
            
            $validatedData['image_path'] = $fileName;
        }else {
            $validatedData['image_path'] = null;
        }

        Category::create([
            'name' => $request->name,
            'image_path' => $validatedData['image_path'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('categories.index')->with('success', 'تم إضافة القسم بنجاح.');
    }
    
}
