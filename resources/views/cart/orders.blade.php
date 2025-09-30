@extends('layouts.app')

@section('title', 'Previous Orders')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>الطلبات السابقة</h1>
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
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
                                <div class="accordion my-4" id="accordionExample{{ $order->id }}">
                                    <div class="card single-accordion">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne{{ $order->id }}" aria-expanded="true"
                                                    aria-controls="collapseOne{{ $order->id }}">
                                                    تفاصيل الطلب #{{ $order->id }} -
                                                    {{ $order->created_at->format('d/m/Y') }} - المجموع:
                                                    ${{ number_format($order->total_price, 2) }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne{{ $order->id }}"
                                            class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="headingOne"
                                            data-parent="#accordionExample{{ $order->id }}">
                                            <div class="card-body">
                                                <div class="billing-address-form">
                                                    <form id="order-form">
                                                        <p>
                                                            <input type="text" name="name" id="name"
                                                                placeholder="الاسم" value="{{ $order->name }}" readonly>
                                                        </p>
                                                        <p>
                                                            <input type="email" name="email" id="email"
                                                                placeholder="البريد الالكتروني" value="{{ $order->email }}"
                                                                readonly>
                                                        </p>
                                                        <p>
                                                            <input type="text" name="address" id="address"
                                                                placeholder="العنوان" value="{{ $order->address }}"
                                                                readonly>
                                                        </p>
                                                        <p>
                                                            <input type="tel" name="phone" id="phone"
                                                                placeholder="رقم الهاتف" value="{{ $order->phone }}"
                                                                readonly>
                                                        </p>
                                                        <p>
                                                            <textarea name="note" id="note" cols="30" rows="10" placeholder="ملاحظة" readonly>{{ $order->note }}</textarea>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>

                                            {{-- Cart Table --}}
                                            <div class="cart-table-wrap">
                                                <table class="cart-table">
                                                    <thead class="cart-table-head">
                                                        <tr class="table-head-row">
                                                            <th class="product-image">صورة المنتج</th>
                                                            <th class="product-name">الاسم</th>
                                                            <th class="product-price">السعر</th>
                                                            <th class="product-quantity">الكمية</th>
                                                            <th class="product-total">الإجمالي</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($order->orderItems->count() > 0)
                                                            @foreach ($order->orderItems as $item)
                                                                <tr class="table-body-row">
                                                                    <td class="product-image"><img
                                                                            src="{{ asset('upload/' . $item->product->image_path) }}"
                                                                            alt="">
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <a href="{{ route('products.show', $item->product_id) }}"
                                                                            class="product-name-link"
                                                                            style="font-weight: bold">{{ $item->product->name }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-price">{{ $item->product->price }}$
                                                                    </td>
                                                                    <td class="product-quantity">
                                                                        {{ $item->quantity }}
                                                                    </td>
                                                                    <td class="product-total">
                                                                        {{ $item->product->price * $item->quantity }}$</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="4" class="text-center font-weight-bold">إجمالي الطلب</td>
                                                                <td class="product-total font-weight-bold text-danger" >{{ $order->total_price }}$</td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td colspan="6" class="text-center">لا توجد عناصر في
                                                                    السلة.
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr>
                            @endforeach
                        @else
                            <h3 class="text-center">لا توجد طلبات سابقة.</h3>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
@endsection
