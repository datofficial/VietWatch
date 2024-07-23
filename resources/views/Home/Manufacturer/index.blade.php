@extends('Home.Layout.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>Tất cả Thương hiệu</h2>
            </div>
        </div>
        @foreach($manufacturers as $manufacturer)
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>{{ $manufacturer->Name }}</h2>
                    <p>{{ $manufacturer->Description }}</p>
                </div>
            </div>
            <div class="row row-pb-md">
                @foreach($manufacturer->watches->take(4) as $watch)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="{{ url('/detailwatch', $watch->id) }}" class="prod-img">
                                <img src="{{ asset('Home/images/' . $watch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                            </a>
                            <div class="desc">
                                <h2><a href="#">{{ $watch->Name }}</a></h2>
                                <span class="price">{{ number_format($watch->price, 2) }} VND</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><a href="{{ route('home.manufacturer', $manufacturer->id) }}" class="btn btn-primary btn-lg">Hiển thị thêm</a></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
