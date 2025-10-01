@extends('layouts.app')

@section('title', 'Products')

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>المنتجات</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150" style="position: relative;">
        <div class="container">

            <div class="row product-lists">

                @empty($products->count())
                    <div class="col-lg-12 text-center">
                        <h2>لا توجد منتجات</h2>
                    </div>
                @endempty

                {{-- Product Card --}}
                @foreach ($products as $product)
                    {{-- <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('products.show', $product->id) }}"><img src="{{ asset('upload/' . $product->image_path) }}"
                                        alt="" style="min-height: 250px; max-height: 250px;"></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>{{ $product->quantity }} Item(s)</span> {{ $product->price }}$
                            </p>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline cart-form">
                                    @csrf
                                    <button type="button" class="cart-btn add-to-cart"><i class="fas fa-shopping-cart"></i> أضف
                                        إلى السلة </button>
                                </form>
                            @auth
                                @can('is_admin')
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display: inline;" class="delete-item-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete-btn delete-item-btn"><i class="fas fa-trash"></i>
                                            حذف</button>
                                    </form>
                                    <a href="{{ route('products.edit', $product->id) }}" class="edit-btn"><i
                                            class="fas fa-edit"></i> تعديل </a>
                                @endcan
                            @endauth
                        </div>
                    </div> --}}

                    <x-product-card :product="$product" />
                @endforeach
                {{-- End Product Card --}}

            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links('pagination::default') }}
                    </div>
                </div>
            </div>

        </div>


        {{-- Alert --}}
        <div id="alertPlaceholder"></div>
        {{-- end Alert --}}

    </div>
    <!-- end products -->

    {{-- My Modal to improve delete --}}
        {{-- <div class="myModalBackdrop" id="modalBackdrop"></div>
        <div class="myModal" id="modal">
            <p>هل أنت متأكد أنك تريد حذف هذا العنصر؟</p>
            <button class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
            <button class="btn btn-secondary" id="cancelDeleteBtn">إلغاء</button>
        </div> --}}
    <x-delete-modal />
    {{-- End My Modal to improve delete --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // handle delete button click
            let modal = document.getElementById('modal');
            const backdrop = document.getElementById('modalBackdrop');

            document.addEventListener('click', function(event) {
                // console.log(event.target);

                if (event.target.classList.contains('delete-item-btn')) {
                    // console.log('delete button clicked');
                    let formToDelete = event.target.closest('.delete-item-form');

                    if (modal && formToDelete) {
                        modal.style.display = 'block';
                        backdrop.style.display = 'block';
                        document.getElementById('confirmDeleteBtn').onclick = function() {
                            formToDelete.submit();
                        };
                    }
                }
            });

            let cancelDeleteBtn = document.getElementById('cancelDeleteBtn');

            cancelDeleteBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                backdrop.style.display = 'none';
            });

            backdrop.addEventListener('click', function() {
                modal.style.display = 'none';
                backdrop.style.display = 'none';
            });


            // Handle Add to Cart button click
            const alertPlaceholder = document.getElementById('alertPlaceholder');
            
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('add-to-cart')) {
                    event.preventDefault(); // Prevent the default form submission

                    let form = event.target.closest('.cart-form');
                    let addToCartBtn = event.target;                   

                    if (form) {
                        let originalBtnText = event.target.innerHTML;
                        addToCartBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جارٍ الإضافة...';
                        addToCartBtn.disabled = true;
                        
                        $.ajax({
                            url: form.action,
                            method: 'POST',
                            data: $(form).serialize(),
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                let message = response.message || 'تم إضافة المنتج إلى السلة بنجاح.';
                                if (response.success) {
                                    alertPlaceholder.innerHTML = `<x-alert :type="'success'" message="${message}" />`
                                }else if (!response.success) {
                                    alertPlaceholder.innerHTML = `<x-alert :type="'warning'" message="${message}" />`
                                }
                            },
                            error: function(xhr) {
                                // Show error alert
                                alertPlaceholder.innerHTML = `<x-alert :type="'danger'" message="'حدث خطأ أثناء إضافة المنتج إلى السلة.'" />`;
                            },

                            complete: function() {
                                addToCartBtn.innerHTML = originalBtnText;
                                addToCartBtn.disabled = false;
                            }
                        });
                    }
                }
            });
        });
    </script>
@endpush
