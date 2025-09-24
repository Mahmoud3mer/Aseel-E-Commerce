@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <form action="{{ route('cart.remove', $cart->product_id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="remove-product-cart-btn"><i
                                                        class="far fa-window-close"></i></button>
                                            </form>
                                            {{-- <a href="{{ route('cart.remove', $cart->product_id) }}">
                                                <i class="far fa-window-close"></i>
                                            </a> --}}
                                        </td>
                                        <td class="product-image"><img
                                                src="{{ asset('upload/' . $cart->product->image_path) }}" alt="">
                                        </td>
                                        <td class="product-name">
                                            <a
                                                href="{{ route('products.show', $cart->product_id) }}" class="product-name-link" style="font-weight: bold">{{ $cart->product->name }}
                                            </a>
                                        </td>
                                        <td class="product-price">{{ $cart->product->price }}$</td>
                                        <td class="product-quantity">
                                            <form action="{{ route('cart.update', $cart->product_id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" value="{{ $cart->quantity }}"
                                                    id="quantity-{{ $cart->product_id }}" min="1"
                                                    style="width: 60px; text-align: center;">
                                                {{-- <input type="number" placeholder="0" value="{{ $cart->quantity }}"> --}}
                                                <button type="submit" title="تحديث الكمية" class="update-quantity-btn" id="update-btn-{{ $cart->product_id }}">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="product-total">{{ $cart->product->price * $cart->quantity }}$</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>${{ $subtotal }}</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>${{ $subtotal + 45 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            {{-- <a href="cart.html" class="boxed-btn">Update Cart</a> --}}
                            <a href="checkout.html" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("quantity-{{ $cart->product_id }}");
            const button = document.getElementById("update-btn-{{ $cart->product_id }}");

            // console.log(input, button);
            
            const originalValue = '{{ $cart->quantity }}';

            function toggleButton() {
                if ((originalValue == 1 && input.value == originalValue) || input.value <= 1) {
                    button.disabled = true;
                } else {
                    button.disabled = false;
                }
            }

            input.addEventListener("input", toggleButton);
            
            toggleButton(); 
        });
    </script>
@endpush
