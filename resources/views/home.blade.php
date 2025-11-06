@extends('layouts.app')

@section('title',  __('app.home'))

@section('content')
    <!-- home page slider -->
    <div class="homepage-slider" dir="ltr">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle" style="text-align: center;">{{ __('app.slider1.subtitle') }}</p>
                                <h1 style="text-align: center;">{{ __('app.slider1.title') }}</h1>
                                <div class="hero-btns text-center">
                                    <a href="{{ route('products.index') }}"
                                        class="boxed-btn">{{ __('app.browse_products') }}</a>
                                    <a href="contact.html" class="bordered-btn">{{ __('app.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">{{ __('app.slider2.subtitle') }}</p>
                                <h1>{{ __('app.slider2.title') }}</h1>
                                <div class="hero-btns text-center">
                                    <a href="{{ route('products.index') }}"
                                        class="boxed-btn">{{ __('app.browse_products') }}</a>
                                    <a href="contact.html" class="bordered-btn">{{ __('app.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle" style="text-align: center;">{{ __('app.slider3.subtitle') }}</p>
                                <h1 style="text-align: center;">{{ __('app.slider3.title') }}</h1>
                                <div class="hero-btns text-center">
                                    <a href="{{ route('products.index') }}"
                                        class="boxed-btn">{{ __('app.browse_products') }}</a>
                                    <a href="contact.html" class="bordered-btn">{{ __('app.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle" style="text-align: center;">{{ __('app.slider4.subtitle') }}</p>
                                <h1 style="text-align: center;">{{ __('app.slider4.title') }}</h1>
                                <div class="hero-btns text-center">
                                    <a href="{{ route('products.index') }}"
                                        class="boxed-btn">{{ __('app.browse_products') }}</a>
                                    <a href="contact.html" class="bordered-btn">{{ __('app.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">{{ __('app.slider5.subtitle') }}</p>
                                <h1>{{ __('app.slider5.title') }}</h1>
                                <div class="hero-btns text-center">
                                    <a href="{{ route('products.index') }}"
                                        class="boxed-btn">{{ __('app.browse_products') }}</a>
                                    <a href="contact.html" class="bordered-btn">{{ __('app.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->


    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">{{ __('app.home_section.title') }}</span>
                        </h3>
                        <p>{{ __('app.home_section.description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.index', ['category' => $category->id]) }}">
                                    <img src="{{ asset('upload/' . $category->image_path) }}" alt=""
                                        style="min-height: 250px; max-height: 250px;">
                                </a>
                            </div>
                            <h3 class="h3-category">
                                <a href="{{ route('products.index', ['category' => $category->id]) }}">
                                    {{ $category->name }}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end product section -->

@endsection
