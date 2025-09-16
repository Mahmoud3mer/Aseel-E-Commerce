@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Assel E-Commerce</p>
                        <h1>اضافة قسم جديد</h1>
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
                            <span class="orange-text">اضافة</span>
                            قسم جديد
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group col-md-12">
                                        <input type="text" placeholder="اسم القسم" name="name" id="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea name="description" id="description" cols="20" rows="6" placeholder="الوصف">{{ old('description') }}</textarea>
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
                                                صورة القسم
                                            </span>
                                        </label>
                                        @error('image_path')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-12">
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="الوصف">{{ old('description') }}</textarea>
                                </div> --}}

                                <p class="col-12" style="text-align: end"><input type="submit" value="حفظ"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact form -->
@endsection

@push('scripts')
    <script>
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
