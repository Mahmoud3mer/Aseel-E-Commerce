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
                    {{-- <div class="single-product-img">
                        <img src="{{ asset('upload/' . $product->image_path) }}" alt="">
                    </div> --}}

                    @if ($product->images->count() > 1)
                        <div id="carouselExampleIndicators" class="carousel slide mx-auto mt-4" data-ride="carousel"
                            style="height: 400px;">
                            <ol class="carousel-indicators">
                                @foreach ($product->images as $image)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                                        class="@if ($loop->first) active @endif"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($product->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img class="d-block w-100" src="{{ asset('upload/' . $image->image_path) }}"
                                            alt="Slide {{ $loop->index + 1 }}" style="height: 400px;">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @else
                        <div class="single-product-img">
                            <img src="{{ asset('upload/' . $product->image_path) }}" alt="">
                        </div>
                    @endif

                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing">
                            {{-- <span>Per Kg</span>  --}}
                            {{ $product->price }}$
                        </p>
                        <p class="description">{{ $product->description }}</p>
                        <div class="single-product-form">
                            <form action="{{ route('cart.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" min="1" value="{{ old('quantity', 1) }}" name="quantity">
                                <button type="submit" class="cart-btn add-to-cart"
                                    style="display: block;margin-bottom: 10px;"><i class="fas fa-shopping-cart"></i> أضف
                                    إلى السلة </button>
                            </form>
                            <p><strong>القسم: </strong>{{ $product->category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    {{-- @dd($product->images) --}}

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


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 1800 // تغيير الصورة كل 1.8 ثانية
            });

            $('.carousel').carousel('cycle');
        });
    </script>
@endpush
