<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/img/logo.png')}}" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu" dir="rtl">
                        <ul>
                            <li class="{{ request()->routeIs('home') ? 'current-list-item' : '' }}"><a href="{{route('home')}}">الرئيسية</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Static Home</a></li>
                                    <li><a href="index_2.html">Slider Home</a></li>
                                </ul>
                            </li>
                            <li class="{{ request()->routeIs('products.index') ? 'current-list-item' : '' }}"><a href="{{route('products.index')}}">المنتجات</a></li>
                            <li class="{{ request()->routeIs('categories.index') ? 'current-list-item' : '' }}"><a href="{{route('categories.index')}}">الأقسام</a></li>
                            <li class="{{ request()->routeIs('products.create') ? 'current-list-item' : '' }}"><a href="{{route('products.create')}}">اضافة منتج</a></li>
                            <li><a href="about.html">من نحن</a></li>
                            <li><a href="#">الصفحات</a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 page</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i
                                            class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
