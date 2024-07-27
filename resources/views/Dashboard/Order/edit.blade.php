@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Chỉnh sửa trạng thái đơn hàng</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hiển thị thông tin đơn hàng -->
        <div class="form-group">
            <label for="orderID">Mã đơn hàng:</label>
            <input type="text" class="form-control" id="orderID" value="{{ $order->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="orderDate">Ngày đặt:</label>
            <input type="text" class="form-control" id="orderDate" value="{{ $order->created_at->format('d/m/Y') }}" readonly>
        </div>
        <div class="form-group">
            <label for="totalPrice">Tổng tiền:</label>
            <input type="text" class="form-control" id="totalPrice" value="{{ number_format($order->TotalPrice, 0, ',', '.') }} VND" readonly>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" {{ $order->Status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ $order->Status == 'processing' ? 'selected' : '' }}>Đang giao hàng</option>
                <option value="completed" {{ $order->Status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ $order->Status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection
