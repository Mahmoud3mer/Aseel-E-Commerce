@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>الأقسام</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">الكل</li>

                            @foreach ($categories as $category)
                                <li data-filter="._{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach

            </div>
        </div>

        {{-- Alert --}}
        <div id="alertPlaceholder"></div>
        {{-- end Alert --}}
    </div>
    <!-- end products -->

    {{-- Delete Modal --}}
    <x-delete-modal />
    {{-- End Delete Modal --}}
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
                                let message = response.message ||
                                    'تم إضافة المنتج إلى السلة بنجاح.';
                                if (response.success) {
                                    alertPlaceholder.innerHTML =
                                        `<x-alert :type="'success'" message="${message}" />`
                                }else if (!response.success) {
                                    alertPlaceholder.innerHTML = `<x-alert :type="'warning'" message="${message}" />`
                                }
                            },
                            error: function(xhr) {
                                // Show error alert
                                alertPlaceholder.innerHTML =
                                    `<x-alert :type="'danger'" message="'حدث خطأ أثناء إضافة المنتج إلى السلة.'" />`;
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
