<!-- resources/views/Home/DetailWatch/index.blade.php -->

@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Chi tiết đồng hồ</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $watch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
        </div>
        <div class="col-md-6">
            <h3 class="my-3">{{ $watch->Name }}</h3>
            <p>{{ $watch->Description }}</p>
            <h4 class="my-3">{{ number_format($watch->price, 0, ',', '.') }} VND</h4>
            <div class="form-group">
                {{-- <label for="strap_material">Chọn loại dây đeo:</label>
                <select id="strap_material" class="form-control">
                    <option>{{ $watch->MaterialStrap }}</option>
                </select> --}}
            </div>
            <div class="form-group">
                <label for="color">Chọn phiên bản đồng hồ:</label>
                <select id="color" class="form-control">
                    <option>{{ $watch->Color }}</option>
                </select>
            </div>
            <h3 class="my-3">Chi tiết sản phẩm</h3>
            <ul class="list-group">
                <li class="list-group-item">Động cơ: {{ $watch->Engine }}</li>
                <li class="list-group-item">Chất liệu mặt kính: {{ $watch->MaterialGlass }}</li>
                <li class="list-group-item">Kích cỡ mặt kính: {{ $watch->SizeGlass }} mm</li>
                <li class="list-group-item">Kích cỡ dây đeo: {{ $watch->SizeStrap }} mm</li>
                <li class="list-group-item">Mức độ chống nước: {{ $watch->AvoidWater }}</li>
            </ul>
            <div class="mt-4">
                <button class="btn btn-primary">Thêm vào giỏ hàng</button>
                <a href="{{ url('/') }}" class="btn btn-secondary">Trở về trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection
