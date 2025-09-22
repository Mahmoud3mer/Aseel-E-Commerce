<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

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
}
