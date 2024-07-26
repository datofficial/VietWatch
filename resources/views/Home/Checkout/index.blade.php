@extends('Home.Layout.index')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    <h2>Thanh toán</h2>
    @if(isset($cart) && count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" width="50"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Tổng tiền: {{ number_format($total, 0, ',', '.') }} VND</h3>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên khách hàng:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->NameUser }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" class="form-control" value="{{ $user->Address }}" required>
            </div>
            <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
            <a href="{{ route('home.cart') }}" class="btn btn-secondary">Quay lại giỏ hàng</a>
        </form>
    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection
