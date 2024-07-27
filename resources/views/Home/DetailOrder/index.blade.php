@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h2>Chi tiết Đơn hàng</h2>

    <div class="card">
        <div class="card-header">
            <strong>Thông tin Đơn hàng</strong>
        </div>
        <div class="card-body">
            <p><strong>ID Đơn hàng:</strong> {{ $order->id }}</p>
            <p><strong>Tên Khách hàng:</strong> {{ $order->NameCustomer }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->PhoneCustomer }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->Address }}</p>
            <p><strong>Thành phố:</strong> {{ $order->city->NameCity }}</p>
            <p><strong>Quận/Huyện:</strong> {{ $order->district->NameDistrict }}</p>
            <p><strong>Xã/Phường:</strong> {{ $order->ward->NameWard }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->TotalPrice, 0, ',', '.') }} VND</p>
            <p><strong>Trạng thái:</strong> {{ $order->Status }}</p>

            {{-- <h3>Chi tiết Sản phẩm</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->detailOrders as $detail)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $detail->detailWatch->Image) }}" alt="{{ $detail->detailWatch->watch->Name }}" width="50">
                            </td>
                            <td>{{ $detail->detailWatch->watch->Name }}</td>
                            <td>{{ $detail->AmountOfWatch }}</td>
                            <td>{{ number_format($detail->detailWatch->Price, 0, ',', '.') }} VND</td>
                            <td>{{ number_format($detail->detailWatch->Price * $detail->AmountOfWatch, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('home.orders') }}" class="btn btn-primary">Quay lại Danh sách Đơn hàng</a>
    </div>
</div>
@endsection
