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
                                    <h1 class="head-1" style="color: #0e564a;">Bộ sưu tập đồng hồ Thuỵ Sĩ</h1>
                                    <p><a href="{{ route('home.allCategories') }}" class="btn btn-primary">Tìm hiểu ngay</a></p>
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
                                    <h1 class="head-1" style="color: rgb(208, 250, 255);">Bộ sưu tập đồng hồ Nhật Bản</h1>
                                    <p><a href="{{ route('home.allCategories') }}" class="btn btn-primary">Mua ngay tại đây</a></p>
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
                                    <h1 class="head-1" style="color: #0e564a;">Các thương hiệu đồng hồ Thuỵ Sĩ</h1>
                                    <p><a href="{{ route('home.allCategories') }}" class="btn btn-primary">Khám phá ngay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('{{ asset('Home/images/sliderwatch4.jpeg') }}');">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1" style="color: rgb(208, 250, 255;">Bộ sưu tập đồng hồ Nhật Bản</h1>
                                    <p><a href="{{ route('home.allCategories') }}" class="btn btn-primary">Tìm hiểu tại đây</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

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
                        @if($watch->detailWatches->count() > 1)
                            <div id="carousel-{{ $watch->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($watch->detailWatches as $index => $detailWatch)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <a href="{{ route('home.detailwatch', $watch->id) }}" class="prod-img">
                                                <img src="{{ asset('storage/' . $detailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel-{{ $watch->id }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-{{ $watch->id }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            @foreach($watch->detailWatches as $detailWatch)
                                <a href="{{ route('home.detailwatch', $watch->id) }}" class="prod-img">
                                    <img src="{{ asset('storage/' . $detailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                                </a>
                            @endforeach
                        @endif
                        <div class="desc">
                            <h2><a href="{{ route('home.detailwatch', $watch->id) }}">{{ $watch->manufacturer->Name }}</a></h2>
                            <h2><a href="{{ route('home.detailwatch', $watch->id) }}">{{ $watch->Name }}</a></h2>
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
                    <img src="{{ asset('Home/images/tissot-logo.jpg') }}" class="img-fluid" alt="Tissot">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/rolex-logo.jpg') }}" class="img-fluid" alt="Rolex">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/longines-logo.jpg') }}" class="img-fluid" alt="Longines">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/patek-philippe-logo.jpg') }}" class="img-fluid" alt="Patek Philippe">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/seiko-logo.jpg') }}" class="img-fluid" alt="Seiko">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/citizen-logo.jpg') }}" class="img-fluid" alt="Citizen">
                </a>
            </div>
            <div class="col partner-col text-center">
                <a href="#" class="prod-img">
                    <img src="{{ asset('Home/images/omega-logo.jpg') }}" class="img-fluid" alt="Omega">
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
