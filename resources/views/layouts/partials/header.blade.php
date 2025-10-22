@php
    $currentLang = app()->getLocale();
    $languages = [
        'en' => ['name' => 'English', 'flag' => '🇺🇸'], 
        'ar' => ['name' => 'العربية', 'flag' => '🇸🇦'],
    ];

    // استبعاد اللغة الحالية من القائمة المنسدلة
    $dropdownLangs = array_diff_key($languages, [$currentLang => null]);
    $currentLangData = $languages[$currentLang] ?? ['name' => 'Lang', 'flag' => '🌐'];
@endphp

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/img/logo2.png') }}" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="{{ request()->routeIs('home') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('home') }}">{{ __('app.home') }}</a></li>
                            <li class="{{ request()->routeIs('products.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('products.index') }}">{{ __('app.products') }}</a></li>
                            <li class="{{ request()->routeIs('categories.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('categories.index') }}">{{ __('app.categories') }}</a></li>
                            @auth
                                @can('is_admin')
                                    <li class="{{ request()->routeIs('products.create') ? 'current-list-item' : '' }}"><a
                                            href="{{ route('products.create') }}">{{ __('app.add_product') }}</a></li>
                                    <li class="{{ request()->routeIs('categories.create') ? 'current-list-item' : '' }}"><a
                                            href="{{ route('categories.create') }}">{{ __('app.add_category') }}</a></li>
                                @endcan
                            @endauth

                            <li class="{{ request()->routeIs('customers.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('customers.index') }}"> {{ __('app.reviews') }} </a></li>
                            <li class=" {{request()->routeIs('about-us') ? 'current-list-item' : '' }} "><a href="{{ route('about-us') }}">{{ __('app.about_us') }}</a></li>
                            <li class="language-dropdown-container">
                                <button class="dropdown-toggle" onclick="toggleDropdown(this)">
                                    {{-- <span class="flag">{{ $currentLangData['flag'] }}</span> --}}
                                    <span class="name">{{ $currentLangData['name'] }}</span>
                                    {{-- <span class="arrow">▼</span> --}}
                                </button>

                                <div class="dropdown-menu-items">
                                    @foreach ($dropdownLangs as $langCode => $langData)
                                        <div>
                                            <a href="{{ route('language.switch') }}?lang={{ $langCode }}">
                                                {{-- <span class="flag">{{ $langData['flag'] }}</span> --}}
                                                <span class="name">{{ $langData['name'] }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            @if (!auth()->user())
                                <li><a href="{{ route('login') }}">{{ __('app.login') }}</a></li>
                            @endif
                            <li>
                                <div class="header-icons">
                                    {{-- <a class="shopping-cart" href="{{ route('logout') }}" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a> --}}
                                    @auth
                                        <form action="{{ route('logout') }}" method="POST" style="display:inline;"
                                            class="mobile-hide logout-bar-icon">
                                            @csrf
                                            <button type="submit"
                                                style="background:none; border:none; color:red;cursor:pointer; outline:none; font-weight:bold;">
                                                <i class="fas fa-sign-out-alt"></i> {{ __('auth.logout') }}
                                            </button>
                                        </form>
                                    @endauth
                                    <a class="shopping-cart" href="{{ route('cart.show') }}"><i
                                            class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i
                                            class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    {{-- <a class="mobile-show logout-bar-icon" href="{{ route('logout') }}" style="color: red; position: absolute; right: 90px; top: 22px; z-index: 999; font-weight: bold;"><i class="fas fa-sign-out-alt"></i> Logout</a> --}}
                    @auth
                        <form action="{{ route('logout') }}" method="POST"
                            style="position: absolute; right: 90px; top: 22px; z-index: 999; font-weight: bold;"
                            class="d-lg-none d-inline">
                            @csrf
                            <button type="submit"
                                style="background:none; border:none; color:red;cursor:pointer; outline:none; font-weight:bold;">
                                <i class="fas fa-sign-out-alt"></i> {{ __('auth.logout') }}
                            </button>
                        </form>
                    @endauth
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->


@push('scripts')
    <script>
        function toggleDropdown(button) {
            const container = button.closest('.language-dropdown-container');
            container.classList.toggle('open');

            document.querySelectorAll('.language-dropdown-container.open').forEach(openContainer => {
                if (openContainer !== container) {
                    openContainer.classList.remove('open');
                }
            });
        }

        document.addEventListener('click', (event) => {
            if (!event.target.closest('.language-dropdown-container')) {
                document.querySelectorAll('.language-dropdown-container.open').forEach(openContainer => {
                    openContainer.classList.remove('open');
                });
            }
        });
    </script>
@endpush
