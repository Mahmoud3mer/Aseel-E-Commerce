<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;

class ProductsController extends Controller
{
    public function index(){

        $category_id = request()->get('category');

        if ($category_id) {
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(6);
        }

        return view('products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $products = Product::with('category', 'images')->get();
        return view('products.ajax.create', compact('categories', 'products'));
    }

    public function store(CreateProductRequest $request){
        $validatedData = $request->validated();
        if ($request->hasFile('image_path')) {
           $image = $request->file('image_path');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().rand(1, 1000).'.'.$extension;
            $image->move(public_path('upload'), $fileName);
            
            $validatedData['image_path'] = $fileName;
        }else {
            $validatedData['image_path'] = null;
        }

        Product::create($validatedData);

        return redirect()->route('products.create')->with('success', 'تم إضافة المنتج بنجاح');
    }


    public function edit($productId)
    {
        $product = Product::find($productId);
        $categories = Category::all();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'المنتج غير موجود');
        }

        return view('products.ajax.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'المنتج غير موجود');
        }

        $validatedData = $request->validated();
        $imagePath = $product->image_path;

        if ($request->hasFile('image_path')) {
            // Delete the old image if exists
            if ($imagePath && file_exists(public_path('upload/' . $imagePath))) {
                unlink(public_path('upload/' . $imagePath));
            }

            $image = $request->file('image_path');
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . rand(1, 1000) . '.' . $extension;
            $image->move(public_path('upload'), $fileName);

            $validatedData['image_path'] = $fileName;
        } else {
            // Keep the old image if no new image is uploaded
            $validatedData['image_path'] = $product->image_path;
        }

        $product->update($validatedData);

        return redirect()->route('products.edit', $productId)->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function destroy($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'المنتج غير موجود');
        }

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'تم حذف المنتج بنجاح');
    }

    public function show($productId){
        $product = Product::find($productId)->load('category', 'images');

        $relatedProducts = Product::where('category_id', $product->category_id)
                                    ->where('id', '!=', $product->id)
                                    ->take(3)
                                    ->get();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'المنتج غير موجود');
        }

        return view('products.ajax.show', compact('product', 'relatedProducts'));
    }


    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ],
        [
            'query.required' => 'يرجى إدخال كلمة بحث.',
        ]);

        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhereHas('category', function ($q) use ($query) {
                                $q->where('name', 'LIKE', "%{$query}%");
                            })
                            ->paginate(6);

        return view('products.index', compact('products'));
    }

    // Manage Product Images
    public function manageImages($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'المنتج غير موجود');
        }

        return view('productImages.index', compact('product'));
    }

    public function addImages(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'المنتج غير موجود');
        }

        $request->validate([
            'images.*' => 'required|image|max:2048',
        ], [
            'images.*.required' => 'يرجى اختيار صورة لتحميلها.',
            'images.*.image' => 'الملف يجب أن يكون صورة.',
            'images.*.max' => 'حجم الصورة لا يجب أن يتجاوز 2 ميجابايت.',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $fileName = time() . rand(1, 1000) . '.' . $extension;
                $image->move(public_path('upload'), $fileName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $fileName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'تم إضافة الصور بنجاح');
    }

    public function destroyImage(Request $request, $imageId)
    {
        $image = ProductImage::find($imageId);

        if (!$image) {
            return redirect()->back()->with('error', 'الصورة غير موجودة');
        }

        // Delete the image file from the server
        $imagePath = public_path('upload/' . $image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the image record from the database
        $image->delete();

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
