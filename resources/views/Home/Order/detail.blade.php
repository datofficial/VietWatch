@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h2>Chi tiết đơn hàng</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="order-details">
        <h3>Thông tin đơn hàng</h3>
        <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
        <p><strong>Tên khách hàng:</strong> {{ $order->NameCustomer }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->PhoneCustomer }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->Address }}</p>
        <p><strong>Thành phố:</strong> {{ $order->city->NameCity }}</p>
        <p><strong>Quận/Huyện:</strong> {{ $order->district->NameDistrict }}</p>
        <p><strong>Xã/Phường:</strong> {{ $order->ward->NameWard }}</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->paymentMethod->Name }}</p>
        <p><strong>Tổng tiền:</strong> {{ number_format($order->TotalPrice, 0, ',', '.') }} VND</p>
        <p><strong>Trạng thái:</strong> {{ $order->Status }}</p>
    </div>

    <div class="order-products">
        <h3>Chi tiết sản phẩm</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->watch->Name }}</td>
                        <td>{{ $detail->AmountOfWatch }}</td>
                        <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($detail->price * $detail->AmountOfWatch, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('home.orders') }}" class="btn btn-secondary">Quay lại</a>
        @if($order->Status == 'pending')
            <form action="{{ route('home.cancelOrder', $order->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
            </form>
        @endif
    </div>
</div>
@endsection
