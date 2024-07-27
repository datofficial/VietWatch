@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h2>Danh sách đơn hàng</h2>
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

    @if($orders->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ number_format($order->TotalPrice, 0, ',', '.') }} VND</td>
                        <td>{{ $order->Status }}</td>
                        <td>
                            <a href="{{ route('home.orderDetail', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
                            @if($order->Status == 'pending')
                                <form action="{{ route('home.cancelOrder', $order->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="text-center mt-4">
    <a href="{{ route('home.index') }}" class="btn btn-primary">Trở về trang chủ</a>
</div>
@endsection
