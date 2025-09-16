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
                    <nav class="main-menu" dir="rtl">
                        <ul>
                            <li class="{{ request()->routeIs('home') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('home') }}">الرئيسية</a></li>
                            <li class="{{ request()->routeIs('products.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('products.index') }}">المنتجات</a></li>
                            <li class="{{ request()->routeIs('categories.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('categories.index') }}">الأقسام</a></li>
                            @auth
                                @can('is_admin')
                                    <li class="{{ request()->routeIs('products.create') ? 'current-list-item' : '' }}"><a
                                            href="{{ route('products.create') }}">اضافة منتج</a></li>
                                    <li class="{{ request()->routeIs('categories.create') ? 'current-list-item' : '' }}"><a
                                            href="{{ route('categories.create') }}">اضافة قسم</a></li>
                                @endcan
                            @endauth

                            <li class="{{ request()->routeIs('customers.index') ? 'current-list-item' : '' }}"><a
                                    href="{{ route('customers.index') }}"> أراء العملاء </a></li>
                            <li><a href="about.html">من نحن</a></li>
                            @if (!auth()->user())
                                <li><a href="{{ route('login') }}"> تسجيل الدخول </a></li>
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
                                                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                                            </button>
                                        </form>
                                    @endauth
                                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
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
                                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
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
