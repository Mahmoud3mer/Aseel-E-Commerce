<!-- logo carousel -->
{{-- <div class="logo-carousel-section" dir="ltr">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="{{ asset('assets/img/company-logos/1.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('assets/img/company-logos/2.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('assets/img/company-logos/3.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('assets/img/company-logos/4.png') }}" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="{{ asset('assets/img/company-logos/5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- end logo carousel -->

<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <!-- About -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">{{ __('app.about_title') }}</h2>
                    <p>{{ __('app.about_text') }}</p>
                </div>
            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">{{ __('app.contact_title') }}</h2>
                    <ul>
                        <li>{{ __('app.contact_address') }}</li>
                        <li>{{ __('app.contact_email') }}</li>
                        <li>{{ __('app.contact_phone') }}</li>
                    </ul>
                </div>
            </div>

            <!-- Pages -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">{{ __('app.pages_title') }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ __('app.home') }}</a></li>
                        <li><a href="{{ route('products.index') }}">{{ __('app.shop') }}</a></li>
                        <li><a href="{{ route('about-us') }}">{{ __('app.about') }}</a></li>
                        <li><a href="">{{ __('app.contact') }}</a></li>
                    </ul>
                </div>
            </div>

            <!-- Subscribe -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">{{ __('app.subscribe_title') }}</h2>
                    <p>{{ __('app.subscribe_text') }}</p>
                    <form action="#" method="POST">
                        @csrf
                        <input type="email" placeholder="{{ __('app.subscribe_placeholder') }}" required>
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <p>&copy; {{ date('Y') }} {{ __('app.rights') }}<br>{{ __('app.owner') }}</p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li>
                            <a href="https://www.linkedin.com/in/mahmoud-amer-ali/" target="_blank" title="{{ __('app.linkedin') }}">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/201113394811" target="_blank" title="{{ __('app.whatsapp') }}">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/Mahmoud3mer" target="_blank" title="{{ __('app.github') }}">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
