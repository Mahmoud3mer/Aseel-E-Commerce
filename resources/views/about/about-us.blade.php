@extends('layouts.app')

@section('title', __('about_us.title'))

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="breadcrumb-text">
                        <p>{{ __('app.store_name') }}</p>
                        <h1>{{ __('app.about_us') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->


    <!-- shop banner -->
    {{-- <section class="shop-banner">
        <div class="container text-center">
            <h3>
                {{ __('app.december_sale_title') }} <br>
                <span class="orange-text">{{ __('app.december_sale_subtitle') }}</span>
            </h3>
            <div class="sale-percent">
                <span>{{ __('app.sale_text') }}</span> 50% <span>{{ __('app.off') }}</span>
            </div>
            <a href="{{ route('products.index') }}" class="cart-btn btn-lg">{{ __('app.shop_now') }}</a>
        </div>
    </section> --}}
    <!-- end shop banner -->

    <!-- team section -->
    <div class="mt-150">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>{{ __('app.our_team') }}</h3>
                        <p>{{ __('app.team_description') }}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-team-item">
                        <div class="circle-shape-one"></div>
                        
                        <div class="team-bg"
                            style="background-image: url('http://127.0.0.1:8000/assets/img/2025062516364300.png');background-size: contain;background-repeat: no-repeat;">
                        </div>
                        <h4>{{ __('app.owner_name') }} <span>{{ __('app.owner_role') }}</span></h4>
                        <ul class="social-link-team">
                            <li>
                                <a href="https://www.linkedin.com/in/mahmoud-amer-ali/" target="_blank" title="{{__('app.facebook')}}">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/201113394811" target="_blank" title="{{__('app.whatsapp')}}">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/Mahmoud3mer" target="_blank" title="{{__('app.github')}}">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end team section -->

@endsection
