@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>تفاصيل المنتج</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset('upload/' . $product->image_path) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing">
                            {{-- <span>Per Kg</span>  --}}
                            {{ $product->price }}$
                        </p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">
                            <form action="index.html">
                                <input type="number" min="1" max="3" value="1">
                            </form>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <p><strong>القسم: </strong>{{ $product->category->name }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">منتجات</span> ذات صلة</h3>
                        <p>
                            هذه بعض المنتجات ذات الصلة التي قد تعجبك
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- @dd($relatedProducts) --}}

                @if ($relatedProducts->isEmpty())
                    <h3 class="text-center col-12">لا توجد منتجات ذات صلة</h3>
                @else
                    @foreach ($relatedProducts as $relatedProduct)
                        <x-product-card :product="$relatedProduct" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- end more products -->
@endsection
