@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h1>Giỏ hàng của bạn</h1>
    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bảng thanh toán với thông tin sản phẩm -->
    <div class="card mb-4">
        <div class="card-header">
            Thông tin thanh toán
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Hành động</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Citizen AW1720-51E</th>
                        <td>
                            <img src="{{ asset('Home/images/Citizen AW1720-51E.png') }}" class="img-fluid" alt="Citizen AW1720-51E" style="width: 100px;">
                        </td>
                        <td>1</td>
                        <td>$470.00</td>
                        <td>
                            <button type="submit" class="btn btn-warning btn-sm">Thông tin chi tiết</button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <!-- Thêm các sản phẩm khác ở đây -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><strong>Tổng cộng</strong></td>
                        <td><strong>$470.00</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
        <a href="{{ url('/checkout') }}" class="btn btn-success">Thanh toán</a>
    </div>
</div>
@endsection
