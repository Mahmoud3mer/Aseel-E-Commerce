@props(['product'])

<div class="col-lg-4 col-md-6 text-center">
    <div class="single-product-item">
        <div class="product-image">
            <a href="{{ route('products.show', $product->id) }}"><img src="{{ asset('upload/' . $product->image_path) }}"
                    alt="" style="min-height: 250px; max-height: 250px;"></a>
        </div>
        <h3>
            <a href="{{ route('products.show', $product->id) }}" class="product-name-link">{{ $product->name }}</a>
        </h3>
        <p class="product-price"><span>{{ $product->quantity }} Item(s)</span> {{ $product->price }}$
        </p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline cart-form">
            @csrf
            <button type="button" class="cart-btn add-to-cart"><i class="fas fa-shopping-cart"></i> أضف
                إلى السلة </button>
        </form>
        @auth
            @can('is_admin')
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;"
                    class="delete-item-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="delete-btn delete-item-btn"><i class="fas fa-trash"></i>
                        حذف</button>
                </form>
                <a href="{{ route('products.edit', $product->id) }}" class="edit-btn"><i class="fas fa-edit"></i> تعديل </a>
            @endcan
        @endauth
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('.cart-form');
                    const formData = new FormData(form);

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': formData.get('_token'),
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('تمت إضافة المنتج إلى السلة بنجاح!');
                            } else {
                                alert('حدث خطأ أثناء إضافة المنتج إلى السلة.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('حدث خطأ أثناء إضافة المنتج إلى السلة.');
                        });
                });
            });
        });
    </script>
    
@endpush
