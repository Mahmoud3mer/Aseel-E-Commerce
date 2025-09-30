@extends('layouts.app')

@section('title', 'Check Out')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            عنوان الفاتورة
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{ route('cart.checkout.store') }}" method="POST" id="order-form">
                                                @csrf
                                                @method('POST')
                                                <p>
                                                    <input type="text" name="name" id="name" placeholder="الاسم"
                                                        value="{{ old('name') }}">
                                                    <span class="text-danger">
                                                        @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </p>
                                                <p>
                                                    <input type="email" name="email" id="email" placeholder="البريد الالكتروني"
                                                        value="{{ old('email') }}">
                                                    <span class="text-danger">
                                                        @error('email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </p>
                                                <p>
                                                    <input type="text" name="address" id="address"
                                                        placeholder="العنوان" value="{{ old('address') }}">
                                                    <span class="text-danger">
                                                        @error('address')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </p>
                                                <p>
                                                    <input type="tel" name="phone" id="phone" placeholder="رقم الهاتف"
                                                        value="{{ old('phone') }}">
                                                    <span class="text-danger">
                                                        @error('phone')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </p>
                                                <p>
                                                    <textarea name="note" id="note" cols="30" rows="10" placeholder="أضف ملاحظة">{{ old('note') }}</textarea>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            عنوان الشحن
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            <p>نموذج عنوان الشحن هنا.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="card-details">
                                            <p>Your card details goes here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>تفاصيل الطلب</th>
                                    <th>السعر</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                <tr>
                                    <td style="font-weight: bold;">المنتج</td>
                                    <td style="font-weight: bold;">الإجمالي</td>
                                </tr>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->product->name }} <strong style="color: #F28123;">x
                                                {{ $cart->quantity }}</strong></td>
                                        <td>${{ $cart->product->price * $cart->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td style="font-weight: bold">Subtotal</td>
                                    <td>${{ $subtotal }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold">Shipping</td>
                                    <td>${{ $shipping }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;color: #F28123">Total</td>
                                    <td style="font-weight: bold;color: #F28123">${{ $subtotal + $shipping }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="order-button-payment">
                            <button type="submit" form="order-form" class="cart-btn mt-2">تأكيد الطلب</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
