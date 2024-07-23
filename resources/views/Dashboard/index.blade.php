<!-- resources/views/Dashboard/index.blade.php -->

@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Thẻ thống kê -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Người dùng</div>
                <div class="card-body">
                    <h5 class="card-title">1000</h5>
                    <p class="card-text">Tổng số người dùng</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Đơn hàng</div>
                <div class="card-body">
                    <h5 class="card-title">500</h5>
                    <p class="card-text">Tổng số đơn hàng</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Sản phẩm</div>
                <div class="card-body">
                    <h5 class="card-title">200</h5>
                    <p class="card-text">Tổng số sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Báo cáo thống kê</div>
                <div class="card-body">
                    <h5 class="card-title">$5.000,00</h5>
                    <p class="card-text">Doanh thu theo tháng</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Đơn hàng mới</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Thời gian</th>
                                <th>Tên đồng hồ</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Chi tiết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dữ liệu giả -->
                            <tr>
                                <th>1</th>
                                <th>Nguyễn Văn A</th>
                                <td>2024-07-01 09:15:00</td>
                                <td>Rolex COSMOGRAPH DAYTONA</td>
                                <td>
                                    <a href="#" class="prod-img">
                                        <img src="{{ asset('Home/images/Rolex COSMOGRAPH DAYTONA.png') }}" class="img-fluid" alt="Rolex COSMOGRAPH DAYTONA">
                                    </a>
                                </td>
                                <td>1</td>
                                <td>$65,000.00</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Xem</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Thay đổi trạng thái</a>
                                    <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                                </td>
                            </tr>
                            <!-- Thêm các hàng dữ liệu khác ở đây -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
