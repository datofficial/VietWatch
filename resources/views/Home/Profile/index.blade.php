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
            {{-- <h2>Tên: {{ session('customer.name') }}</h2> --}}
            <h2>Email: {{ session('customer.email') }}</h2>
            <h2>Số điện thoại: {{ session('customer.PhoneNumber') }}</h2>
            <h2>Địa chỉ: {{ session('customer.Address') }}</h2>
            <h2>Thành phố: {{ \App\Models\City::find(session('customer.IDCity'))->NameCity }}</h2>
            <h2>Quận/Huyện: {{ \App\Models\District::find(session('customer.IDDistrict'))->NameDistrict }}</h2>
            <h2>Xã/Phường: {{ \App\Models\Ward::find(session('customer.IDWard'))->NameWard }}</h2>
            <span class="price">Ngày tham gia: {{ \Carbon\Carbon::parse(session('customer.created_at'))->format('d/m/Y') }}</span>
        </div>
    </div>

    <!-- Nút quản lý lịch sử mua hàng và mật khẩu -->
    <div class="mt-4 text-center">
        {{-- <a href="{{ route('home.profile.edit') }}" class="btn btn-success">Thay đổi thông tin cá nhân</a> --}}
        <a href="{{ route('home.index') }}" class="btn btn-primary">Trở về trang chủ</a>
        <a href="{{ route('home.orders') }}" class="btn btn-danger">Lịch sử mua hàng</a>
    </div>
</div>
@endsection
