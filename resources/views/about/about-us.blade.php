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

    <div class="about-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ __('about_us.heading') }}</h2>
                    <p>{{ __('about_us.description') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
