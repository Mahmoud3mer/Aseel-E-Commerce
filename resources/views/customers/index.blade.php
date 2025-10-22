@extends('layouts.app')

@section('title',  __('app.reviews'))

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center section-title-header">
                    <div class="breadcrumb-text">
                        <p>{{ __('app.store_name') }}</p>
                        <h1>{{ __('app.reviews') }}</h1>
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
                        @if(auth()->user())
                            <h3>
                                <span class="orange-text">{{ __('app.add') }}</span>
                                {{ __('app.new_review') }}
                            </h3>
                        @else
                            <h3>
                                <span class="orange-text">{{ __('app.all') }}</span>
                                {{ __('app.reviews') }}
                            </h3>
                        @endif
                    </div>
                </div>
            </div>

            @auth
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        <div id="form_status"></div>
                        <div class="contact-form">
                            <form action="{{ route('customers.store') }}" method="POST" id="contact-form">
                                @csrf
                                @method('POST')

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <input type="text" placeholder="{{ __('app.phone') }}" name="phone" id="phone"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <input type="text" placeholder="{{ __('app.subject') }}" name="subject" id="subject"
                                            value="{{ old('subject') }}">
                                        @error('subject')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="{{ __('app.write_your_review') }}">{{old('comment')}}</textarea>
                                        @error('comment')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <p class="col-12" style="text-align: end"><input type="submit" value="{{ __('app.save') }}"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>

    </div>
    <!-- end contact form -->

    	<!-- testimonail-section -->
	<div class="testimonail-section mt-30 mb-150" dir="ltr">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">

                        @foreach ($reviews as $review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater" style="display: flex; justify-content: center; align-items: center;">
                                    {{-- <img src="{{ asset('assets/img/avaters/avatar1.png') }}" alt=""> --}}
                                    <p class="avatar-name">{{ $review->user->name[0] }}</p>
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $review->user->name }} <span>{{ $review->subject }}</span></h3>
                                    <p class="testimonial-body">
                                        " {{ $review->comment }} "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush
