<!-- resources/views/Home/Layout/header.blade.php -->

<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a href="{{ url('/') }}">VietWatch</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <form action="#" class="search-wrap">
                        <div class="form-group">
                            <input type="search" class="form-control search" placeholder="Tìm kiếm">
                            <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                        <li class="has-dropdown {{ request()->is('categories') || request()->is('category/*') ? 'active' : '' }}">
                            <a href="{{ route('home.allCategories') }}">Danh mục</a>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('home.category', $category->id) }}">{{ $category->Name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-dropdown {{ request()->is('manufacturers') || request()->is('manufacturer/*') ? 'active' : '' }}">
                            <a href="{{ route('home.allManufacturers') }}">Thương hiệu</a>
                            <ul class="dropdown">
                                @foreach($manufacturers as $manufacturer)
                                    <li><a href="{{ route('home.manufacturer', $manufacturer->id) }}">{{ $manufacturer->Name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('home.contact') }}">Liên hệ</a></li>
                        <li class="cart {{ request()->is('cart') ? 'active' : '' }}"><a href="{{ url('/cart') }}"><i class="icon-shopping-cart"></i>Giỏ hàng [0]</a></li>
                        <li class="has-dropdown {{ request()->is('profile') ? 'active' : '' }}">
                            <a href="{{ url('/profile') }}"><i class="icon-user"></i> Tôi</a>
                            <ul class="dropdown">
                                <li><a href="{{ url('/profile') }}">Thông tin cá nhân</a></li>
                                <li><a href="{{ url('/order-history') }}">Lịch sử đơn hàng</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    {{-- <h3><a href="#">Các mẫu Đồng hồ sang trọng</a></h3> --}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    {{-- <h3><a href="#">Những sản phẩm đồng hồ bán chạy nhất</a></h3> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .colorlib-nav .menu-1 ul li a {
        color: #000;
    }

    .colorlib-nav .menu-1 ul li.active a,
    .colorlib-nav .menu-1 ul li a:hover {
        color: #00BFFF;
    }
</style>
