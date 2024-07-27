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

</div>
@endsection
