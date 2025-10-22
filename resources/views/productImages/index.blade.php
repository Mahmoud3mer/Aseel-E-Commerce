@extends('layouts.app')

@section('title', __('app.manage_product_images'))

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="breadcrumb-text">
                        <p>{{ __('app.store_name') }}</p>
                        <h1>{{ __('app.manage_product_images') }}</h1>
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
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">{{ __('app.manage') }}</span>
                            {{ __('app.product_images') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('products.images.add', $product->id) }}" method="POST"
                        enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="input-group mb-4">
                            <input type="file" class="form-control" id="images" name="images[]" multiple
                                style="display: none">

                            {{-- الحاوية الجديدة لعرض الصور المحددة --}}
                            <div id="image-previews-container" style="display: none; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;"></div>

                            <label class="input-group-text label-file-input" for="images" id="image-label">
                                <span>
                                    {{ __('app.select_images') }}
                                </span>
                            </label>
                            @error('images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <p class="col-12" style="text-align: end">
                            <input type="submit" value="{{ __('app.upload_images') }}">
                        </p>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>
                            <span class="orange-text">{{ $product->name }}</span>

                        </h3>
                    </div>
                </div>

                @empty($product->images)
                    <div class="alert alert-info">
                        {{ __('app.no_product_images') }}
                    </div>
                @endempty

                <div class="col-12 row" style="gap: 20px;">
                    @foreach ($product->images as $image)
                        <div style="margin-bottom: 20px;" class="col-12 col-md-3 text-center product-image-card">
                            <img src="{{ asset('upload/' . $image->image_path) }}" alt="Product Image">
                            <form action="{{ route('products.images.destroy', $image->id) }}" method="POST"
                                onsubmit="return confirm('{{ __('app.confirm_delete_image') }}');" class="remove-image-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('app.delete_image') }}</button>
                            </form>
                            <div class="background-overlay"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const imagesInput = document.getElementById('images');
        const imagePreviewsContainer = document.getElementById('image-previews-container');
        const imageLabel = document.getElementById('image-label');

        imagesInput.addEventListener('change', function() {
            imagePreviewsContainer.innerHTML = '';

            if (imagesInput.files.length > 0) {
                imagePreviewsContainer.style.display = 'flex';
                imageLabel.style.display = 'none';

                // المرور على كل ملف تم تحديده
                Array.from(imagesInput.files).forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // إنشاء div جديد لكل صورة
                        const previewWrapper = document.createElement('div');
                        previewWrapper.classList.add('image-preview-wrapper');
                        previewWrapper.style.position = 'relative';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px';
                        img.style.height = '200px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '5px';

                        // زر الحذف
                        const removeBtn = document.createElement('span');
                        removeBtn.innerHTML = '×';
                        removeBtn.style.position = 'absolute';
                        removeBtn.style.top = '5px';
                        removeBtn.style.right = '5px';
                        removeBtn.style.cursor = 'pointer';
                        removeBtn.style.color = '#fff';
                        removeBtn.style.backgroundColor = '#dc3545';
                        removeBtn.style.borderRadius = '50%';
                        removeBtn.style.width = '20px';
                        removeBtn.style.height = '20px';
                        removeBtn.style.display = 'flex';
                        removeBtn.style.alignItems = 'center';
                        removeBtn.style.justifyContent = 'center';
                        removeBtn.style.fontSize = '12px';

                        // إضافة الصورة وزر الحذف إلى الحاوية
                        previewWrapper.appendChild(img);
                        previewWrapper.appendChild(removeBtn);
                        imagePreviewsContainer.appendChild(previewWrapper);

                        // وظيفة الحذف
                        removeBtn.addEventListener('click', function() {
                            // إزالة الصورة من العرض
                            previewWrapper.remove();

                            // تحديث قائمة الملفات في `input`
                            const newFileList = new DataTransfer();
                            Array.from(imagesInput.files).forEach((f, i) => {
                                if (i !== index) {
                                    newFileList.items.add(f);
                                }
                            });
                            imagesInput.files = newFileList.files;

                            // إعادة إظهار زر التحديد إذا لم يتبقَ أي صور
                            if (imagesInput.files.length === 0) {
                                imagePreviewsContainer.style.display = 'none';
                                imageLabel.style.display = 'flex';
                            }
                        });
                    };

                    reader.readAsDataURL(file);
                });
            } else {
                // إذا لم يتم تحديد أي صور، أرجع كل شيء إلى حالته الأصلية
                imagePreviewsContainer.style.display = 'none';
                imageLabel.style.display = 'flex';
            }
        });
    </script>
@endpush
