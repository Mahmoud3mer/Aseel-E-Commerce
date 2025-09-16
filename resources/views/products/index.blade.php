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

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            <div class="row product-lists">

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img src="{{ asset('upload/' . $product->image_path) }}"
                                        alt="" style="min-height: 250px; max-height: 250px;"></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>{{ $product->quantity }} Item(s)</span> {{ $product->price }}$
                            </p>
                            <a href="cart.html" class="btn btn-warning text-light"><i class="fas fa-shopping-cart"></i> أضف
                                إلى السلة</a>
                            @auth
                                @can('is_admin')
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display: inline;" class="delete-item-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-item-btn"><i class="fas fa-trash"></i>
                                            حذف</button>
                                    </form>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary text-light"><i
                                            class="fas fa-edit"></i> تعديل </a>
                                @endcan
                            @endauth
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links('pagination::default') }}
                    </div>
                </div>
            </div>

        </div>


        {{-- Alert --}}
        <div id="liveAlertPlaceholder" class="fade"></div>
        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div> --}}
        {{-- end Alert --}}
    </div>
    <!-- end products -->

    {{-- My Modal to improve delete --}}
    <div class="myModalBackdrop" id="modalBackdrop"></div>
    <div class="myModal" id="modal">
        <p>هل أنت متأكد أنك تريد حذف هذا العنصر؟</p>
        <button class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
        <button class="btn btn-secondary" id="cancelDeleteBtn">إلغاء</button>
    </div>
    {{-- End My Modal to improve delete --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const response_success = '{{ session('success') }}';
            const response_error = '{{ session('error') }}';
            // console.log(response);

            const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

            const alert = (message, type) => {
                const wrapper = document.createElement('div')
                wrapper.innerHTML = [
                    `<div class="alert alert-${type} alert-dismissible show-success-msg" role="alert">`,
                    `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>`,
                    `   <div>${message}</div>`,
                    `</div>`
                ].join('')

                alertPlaceholder.append(wrapper)
            }

            if (response_success) {
                alert(response_success, 'success')
            }

            if (response_error) {
                alert(response_error, 'error')
            }

            $('.btn-close').on('click', function() {
                $(this).closest('.alert').remove()
            })

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
        });
    </script>
@endpush
