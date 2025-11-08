@extends('layouts.app')

@section('title', __('app.home'))

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


    <!-- Category section -->
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
                    <div class="col-lg-3 col-md-4 text-center">
                        <div class="single-category-item">
                            <div class="category-image">
                                <a href="{{ route('products.index', ['category' => $category->id]) }}">
                                    <img src="{{ asset('upload/' . $category->image_path) }}" alt=""
                                        style="min-height: 160px; max-height: 160px;">
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
    <!-- end Category section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">{{ __('app.home_new_products_section.title') }}</span>
                        </h3>
                        <p>{{ __('app.home_new_products_section.description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($newProducts as $product)
                            <div class="swiper-slide" style="">
                                <div class="single-product-item text-center">
                                    <div class="product-image">
                                        <a href="{{ route('products.show', $product->id) }}"><img
                                                src="{{ asset('upload/' . $product->image_path) }}" alt=""
                                                style="min-height: 250px; max-height: 250px;"></a>
                                    </div>
                                    <h3>
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="product-name-link">{{ $product->name }}</a>
                                    </h3>
                                    <p class="product-price"><span
                                            class="{{ $product->quantity == 0 ? 'out-of-stock' : '' }}">{{ $product->quantity }}
                                            Item(s)</span> {{ $product->price }}$
                                    </p>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                        class="d-inline cart-form">
                                        @csrf
                                        <button type="button" class="cart-btn add-to-cart"><i
                                                class="fas fa-shopping-cart"></i>
                                            {{ __('app.add_to_cart') }} </button>
                                    </form>
                                    @auth
                                        @can('is_admin')
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display: inline;" class="delete-item-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn delete-item-btn"><i
                                                        class="fas fa-trash"></i>
                                                    {{ __('app.delete') }}</button>
                                            </form>
                                            <a href="{{ route('products.edit', $product->id) }}" class="edit-btn mt-1"><i
                                                    class="fas fa-edit"></i> {{ __('app.edit') }} </a>
                                        @endcan
                                    @endauth
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{-- <div class="swiper-pagination"></div> --}}

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    {{-- <div class="swiper-scrollbar"></div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end product section -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var swiper = new Swiper(".swiper", {
                // الاتجاه من اليمين لليسار (RTL) ليتناسب مع اللغة العربية
                direction: 'horizontal',
                rtl: true,
                loop: true, // التمرير الدوري
                autoplay: { // تشغيل تلقائي
                    delay: 5000,
                    disableOnInteraction: false,
                },
                speed: 500, // سرعة الانتقال
                effect: "slide", // نوع الانتقال (يمكن تغييرها لـ 'fade' أو 'coverflow' لنتائج مختلفة)

                // اعدادات عرض العناصر
                slidesPerView: 1,
                spaceBetween: 10,
                // Responsive breakpoints
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1,
                    },
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 30
                    },
                    // when window width is >= 640px
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    },
                    720: {
                        slidesPerView: 3,
                        spaceBetween: 40
                    },
                    940: {
                        slidesPerView: 4,
                        spaceBetween: 40
                    }
                },

                // إعدادات شريط التقدم (Pagination)
                // pagination: {
                //     el: ".swiper-pagination",
                //     clickable: true,
                // },

                // إعدادات أسهم التنقل (Navigation)
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },

                // إعدادات شريط التمرير (Scrollbar)
                // scrollbar: {
                //     el: ".swiper-scrollbar",
                //     hide: true,
                // },
            });
        });
    </script>
@endpush
