@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h2>Giỏ hàng của bạn</h2>
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

    @if(isset($cart) && count($cart) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Phiên bản</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng cộng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>
                            @if(isset($item['image']))
                                <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid" style="max-width: 50px;" alt="{{ $item['name'] }}">
                            @endif
                            <div>{{ $item['name'] }}</div>
                        </td>
                        <td>
                            <div>{{ $item['material'] ?? '' }}</div>
                            <div>{{ $item['color'] ?? '' }}</div>
                        </td>
                        <td>
                            @if(isset($item['id']))
                                <form action="{{ route('home.updateCart', $item['id']) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                    <button type="submit" class="btn btn-secondary">Cập nhật</button>
                                </form>
                            @endif
                        </td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND</td>
                        <td>
                            @if(isset($item['id']))
                                <form action="{{ route('home.removeFromCart', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('home.index') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
            </div>
            <div class="col-md-6 text-right">
                <button onclick="checkCart()" class="btn btn-success">Thanh toán</button>
            </div>
        </div>
    @else
        <p>Giỏ hàng của bạn đang trống.</p>
        <a href="{{ route('home.index') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
    @endif
</div>

<script>
    function checkCart() {
        const quantities = document.querySelectorAll('input[name="quantity"]');
        let valid = true;
        quantities.forEach(input => {
            if (parseInt(input.value) < 1) {
                valid = false;
            }
        });
        if (!valid) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Số lượng sản phẩm không hợp lệ. Vui lòng cập nhật giỏ hàng.'
            });
        } else {
            window.location.href = "{{ route('home.checkout') }}";
        }
    }
</script>
@endsection
