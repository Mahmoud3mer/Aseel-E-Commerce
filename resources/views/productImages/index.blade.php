@extends('layouts.app')

@section('title', 'Manage Product Images')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>ادارة صور المنتج</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">ادارة</span>
                            صور المنتج
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row" style="gap: 20px;">
                {{-- <div class="col-lg-12 mb-5 mb-lg-0"> --}}
                    {{-- @dd($product->images) --}}
                    
                    @empty($product->images)
                        <div class="alert alert-info">
                            لا توجد صور لهذا المنتج.
                        </div>
                    @endempty

                    @foreach ($product->images as $image)
                        <div style="margin-bottom: 20px;" class="col-12 col-md-3 text-center product-image-card">
                            <img src="{{ asset('upload/' . $image->image_path) }}" alt="Product Image">
                            <form action="{{ route('products.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الصورة؟');" class="remove-image-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">حذف الصورة</button>
                            </form>
                            <div class="background-overlay"></div>
                        </div>
                    @endforeach
                {{-- </div> --}}
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
