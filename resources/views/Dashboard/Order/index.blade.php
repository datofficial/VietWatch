@extends('Dashboard.Layout.index')

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
        <p>Không có đơn hàng nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->NameCustomer }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->PhoneCustomer }}</td>
                        <td>{{ $order->Address }}</td>
                        <td>{{ number_format($order->TotalPrice, 0, ',', '.') }} VND</td>
                        <td>
                            <span class="badge badge-{{ $order->status_color }}">
                                {{ $order->status_in_vietnamese }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $orders->links() }} <!-- Thêm dòng này để hiển thị phân trang -->
</div>
@endsection
