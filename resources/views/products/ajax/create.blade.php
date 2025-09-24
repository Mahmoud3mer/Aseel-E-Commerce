@extends('layouts.app')

@section('title', 'Create Product')

@push('datatables.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@push('datatables.js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endpush

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>اضافة منتج جديد</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- contact form -->
    <div class="contact-from-section mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">اضافة</span>
                            منتج جديد
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="row">
                                {{-- inputs --}}
                                <div class="col-12 col-md-6 p-0">
                                    <div class="form-group col-12">
                                        <input type="text" placeholder="اسم المنتج" name="name" id="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <select name="category_id" id="category">
                                            <option value="">اختر قسم</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <input type="number" placeholder="السعر" name="price" id="price"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <input type="number" placeholder="الكمية" name="quantity" id="quantity"
                                            value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- image field --}}
                                <div class="col-12 col-md-6 ">
                                    <div class="input-group mb-4">
                                        <input type="file" class="form-control" id="image" name="image_path"
                                            style="display: none">
                                        <img src="" alt="" id="image-preview"
                                            style="width: 100%; height: 250px;display: none;">
                                        <span class="remove-image" id="remove-image">x</span>
                                        <label class="input-group-text label-file-input" for="image" id="image-label">
                                            <span>
                                                صورة المنتج
                                            </span>
                                        </label>
                                        @error('image_path')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-6 col-12">
                                    <input type="text" placeholder="اسم المنتج" name="name" id="name">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <select name="category" id="category">
                                        <option value="">اختر قسم</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <input type="text" placeholder="السعر" name="price" id="price">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <input type="text" placeholder="الكمية" name="quantity" id="quantity">
                                </div> --}}

                                <div class="form-group col-md-12">
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="الوصف">{{ old('description') }}</textarea>
                                </div>

                                <p class="col-12" style="text-align: end">
                                    <input type="submit" value="حفظ">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end contact form -->
    <div class="table-responsive">
        <div class="container">
            <div class="row">
                <div class="col-12 products-table">
                    <table class="table" id="products-table">
                        <thead>
                            <tr>
                                <th scope="col">صورة المنتج</th>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">السعر</th>
                                <th scope="col">الكمية</th>
                                {{-- <th scope="col">الوصف</th> --}}
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ asset('upload/' . $product->image_path) }}" alt=""
                                            style="width: 100px;"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}$</td>
                                    <td>{{ $product->quantity }}</td>
                                    {{-- <td class="product-description">{{ $product->description }}</td> --}}
                                    <td class="product-table-actions">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            style="display: inline;" class="delete-item-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="delete-btn delete-item-btn"><i
                                                    class="fas fa-trash"></i>
                                                حذف</button>
                                        </form>
                                        <a href="{{ route('products.edit', $product->id) }}" class="edit-btn"><i
                                                class="fas fa-edit"></i> تعديل </a>
                                        <a href="{{ route('products.show', $product->id) }}" class="show-btn"><i
                                                class="fas fa-eye"></i> عرض </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Products Table --}}
    {{-- End Products Table --}}

    {{-- Delete Modal --}}
    <x-delete-modal />
    {{-- End Delete Modal --}}
@endsection

@push('scripts')
    <script>
        // DataTables
        $(document).ready(function() {
            let table = new DataTable('#products-table');

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

        // Image Preview
        const image = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imageLabel = document.getElementById('image-label');
        const removeImage = document.getElementById('remove-image');

        image.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    imageLabel.style.display = 'none';
                    removeImage.style.display = 'flex';
                }
                reader.readAsDataURL(file);
            }
        });

        removeImage.addEventListener('click', function() {
            image.value = '';
            imagePreview.src = '';
            imagePreview.style.display = 'none';
            imageLabel.style.display = 'flex';
            removeImage.style.display = 'none';
        });
    </script>
@endpush
