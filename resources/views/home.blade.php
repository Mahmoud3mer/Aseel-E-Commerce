@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- home page slider -->
	<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh & Organic</p>
								<h1>Delicious Seasonal Fruits</h1>
								<div class="hero-btns">
									<a href="{{route('products.index')}}" class="boxed-btn">تصفح المنتجات</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Fresh Everyday</p>
								<h1>100% Organic Collection</h1>
								<div class="hero-btns">
									<a href="{{route('products.index')}}" class="boxed-btn">تصفح المنتجات</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Mega Sale Going On!</p>
								<h1>Get December Discount</h1>
								<div class="hero-btns">
									<a href="{{route('products.index')}}" class="boxed-btn">تصفح المنتجات</a>
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>
                            {{-- <span class="orange-text">Our</span> --}}
                            <span class="orange-text">أقسام</span>
                             
                              الموقع 
                        </h3>
                        <p>اكتشف جميع الأقسام المتنوعة التي نوفرها لك، من الإلكترونيات والموضة إلى المأكولات والإكسسوارات، لتجد كل ما تحتاجه في مكان واحد.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('products.index', ['category' => $category->id])}}">
                                    <img 
                                        src="{{ url($category->image_path) }}"
                                        alt=""
                                        style="min-height: 250px; max-height: 250px;"
                                    >
                                </a>
                            </div>
                            <h3>{{$category->name}}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end product section -->

@endsection
