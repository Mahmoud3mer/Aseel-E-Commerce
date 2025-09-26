<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function showCart()
    {
        $carts = Cart::where('user_id', auth()->id())->with('product')->get();

        $subtotal = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart.index', compact('carts', 'subtotal'));
    }

    public function addToCart(Request $request, $productId){
        // dd($productId);
        $product = Product::find($productId);

        $quantityProductInCart = Cart::where('user_id', auth()->id())->where('product_id', $productId)->sum('quantity') + 1;

        if($quantityProductInCart > $product->quantity){
            return response()->json(['success' => false, 'message' => 'الكمية المطلوبة غير متوفرة حالياً.']);
        }

        $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $productId)->first();

        if($cartItem){
            $cartItem->quantity += 1;
            $cartItem->save();
            // session()->flash('success', 'تم تحديث كمية المنتج في السلة.');
            return response()->json(['success' => true, 'message' => 'تم تحديث كمية المنتج في السلة.']);
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
            // session()->flash('success', 'تم إضافة المنتج إلى السلة.');
            return response()->json(['success' => true, 'message' => 'تم إضافة المنتج إلى السلة.']);
        }
    }

    public function updateCartItem(Request $request, $productId){
        // $request->validate([
        //     'quantity' => 'required|integer|min:1'
        // ]);

        $product = Product::find($productId);

        $quantityFromUser = $request->input('quantity', 1);

        if($quantityFromUser > $product->quantity){
            return redirect()->back()->with('error', 'الكمية المطلوبة غير متوفرة حالياً.');
        }

        $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $productId)->first();
        
        if($cartItem){
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return redirect()->route('cart.show')->with('success', 'تم تحديث كمية المنتج في السلة.');
        } else {
            return redirect()->route('cart.show')->with('error', 'المنتج غير موجود في السلة.');
        }
    }

    public function removeFromCart(Request $request, $productId){
        $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $productId)->first();
        if($cartItem){
            $cartItem->delete();
            return redirect()->route('cart.show')->with('success', 'تم إزالة المنتج من السلة.');
        } else {
            return redirect()->route('cart.show')->with('error', 'المنتج غير موجود في السلة.');
        }
    }

    // Manage Orders
    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->id())->with('product')->get();

        $subtotal = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });

        $shipping = 45;

        return view('cart.checkout', compact('carts', 'subtotal', 'shipping'));
    }

    public function storeOrder(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ],
        [
            'name.required' => 'يرجى إدخال الاسم.',
            'email.required' => 'يرجى إدخال البريد الإلكتروني.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'phone.required' => 'يرجى إدخال رقم الهاتف.',
            'address.required' => 'يرجى إدخال العنوان.',
        ]);

        $user_id = auth()->id();
        $carts = Cart::where('user_id', $user_id)->with('product')->get();

        if($carts->isEmpty()){
            return redirect()->back()->with('error', 'سلة التسوق فارغة.');
        }

        $total_price = $carts->sum(function($cart){
            return $cart->product->price * $cart->quantity;
        });

        $order = Order::create([
            'user_id' => $user_id,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'note' => $validatedData['notes'] ?? null,
            'total_price' => $total_price,
            'status' => 'pending',
        ]);

        foreach($carts as $cart){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);

            // Reduce product stock
            $product = Product::find($cart->product_id);
            
            if($product){
                $product->quantity -= $cart->quantity;
                $product->save();
            }
        }
        // Clear the cart
        Cart::where('user_id', $user_id)->delete();
        return redirect()->route('products.index')->with('success', 'تم إنشاء الطلب بنجاح. شكراً لتسوقك معنا!');

    }
}
