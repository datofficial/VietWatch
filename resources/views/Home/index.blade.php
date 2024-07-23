@extends('Home.Layout.index')

@section('content')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url('{{ asset('Home/images/sliderwatch1.jpeg') }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Bộ sưu tập</h1>
                                    <h2 class="head-2">Đồng hồ</h2>
                                    <h2 class="head-3">Nam</h2>
                                    <p><a href="#" class="btn btn-primary">Tìm hiểu ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('{{ asset('Home/images/sliderwatch2.jpeg') }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Các thương hiệu</h1>
                                    <h2 class="head-2">đồng hồ</h2>
                                    <h2 class="category"><span>Thuỵ Sĩ</span></h2>
                                    <p><a href="#" class="btn btn-primary">Mua ngay tại đây</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('{{ asset('Home/images/sliderwatch3.jpeg') }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Các thương hiệu</h1>
                                    <h2 class="head-2">đồng hồ</h2>
                                    <h2 class="category"><span>Nhật Bản</span></h2>
                                    <p><a href="#" class="btn btn-primary">Khám phá ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

{{-- Danh mục --}}
{{-- <div class="colorlib-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="intro">DANH MỤC ĐỒNG HỒ</h2>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="colorlib-product">
    <div class="container-fluid">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-sm-6 text-center">
                    <div class="featured">
                        <a href="{{ route('home.category', $category->id) }}" class="featured-img" style="background-image: url('{{ asset('Home/images/menwatch.jpeg') }}');"></a>
                        <div class="desc">
                            <h2><a href="{{ route('home.category', $category->id) }}">{{ $category->Name }}</a></h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}

<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>ĐỒNG HỒ DÀNH CHO BẠN</h2>
            </div>
        </div>
        <div class="row row-pb-md">
            @foreach($watches as $watch)
                <div class="col-lg-3 mb-4 text-center">
                    <div class="product-entry border">
                        <a href="{{ route('home.detailwatch', $watch->id) }}" class="prod-img">
                            <img src="{{ asset('storage/' . $watch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                        </a>
                        <div class="desc">
                            <h2><a href="{{ route('home.detailwatch', $watch->id) }}">{{ $watch->manufacturer->Name }}</a></h2>
                            <h2><a href="{{ route('home.detailwatch', $watch->id) }}">{{ $watch->Name }}</a></h2>
                            {{-- <span class="price">${{ number_format($watch->price, 2) }}</span> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="{{ route('home.index') }}" class="btn btn-primary btn-lg">HIỂN THỊ TẤT CẢ ĐỒNG HỒ</a></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                <h2>THƯƠNG HIỆU</h2>
            </div>
        </div>
        <div class="row">
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Tissot-logo.jpg') }}" class="img-fluid" alt="Tissot">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Rolex-logo.jpg') }}" class="img-fluid" alt="Rolex">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Longines-logo.jpg') }}" class="img-fluid" alt="Longines">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/PatekPhilippe-logo.png') }}" class="img-fluid" alt="Patek Philippe">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Seiko-logo.png') }}" class="img-fluid" alt="Seiko">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Citizen-logo.jpg') }}" class="img-fluid" alt="Citizen">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Omega-logo.png') }}" class="img-fluid" alt="Omega">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/Casio-logo.jpg') }}" class="img-fluid" alt="Casio">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
