<!-- resources/views/Home/Profile/index.blade.php -->

@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h1>Thông tin cá nhân</h1>

    <!-- Hiển thị thông tin cá nhân -->
    <div class="product-entry border">
        {{-- <a href="#" class="prod-img">
            <img src="{{ asset('Home/images/profile-placeholder.png') }}" class="img-fluid" alt="Profile Picture">
        </a> --}}
        <div class="desc">
            <h2>Tên: {{ $user->NameUser }}</h2>
            <h2>Email: {{ $user->email }}</h2>
            <h2>Số điện thoại: {{ $user->PhoneNumber }}</h2>
            <h2>Địa chỉ: {{ $user->Address }}</h2>
            <span class="price">Ngày tham gia: {{ $user->created_at->format('d/m/Y') }}</span>
        </div>
    </div>

    <!-- Nút quản lý lịch sử mua hàng và mật khẩu -->
    <div class="mt-4 text-center">
        <a href="{{ url('/profile/edit') }}" class="btn btn-success">Thay đổi thông tin cá nhân</a>
        <a href="{{ url('/order-history') }}" class="btn btn-danger">Lịch sử mua hàng</a>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-primary">Trở về trang chủ</a>
    </div>
</div>
@endsection
