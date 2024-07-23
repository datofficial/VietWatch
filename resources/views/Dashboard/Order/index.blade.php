@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Danh sách đơn hàng</h1>
    <!-- Bảng hiển thị danh sách đơn hàng -->
    <div class="card mb-4">
        <div class="card-header">
            Danh sách đơn hàng
        </div>
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
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>2</th>
                        <th>Nguyễn Văn B</th>
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
                            <a href="#" class="btn btn-sm btn-secondary">Đang vận chuyển</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger">Huỷ</a>
                        </td>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>Nguyễn Văn A</th>
                        <td>2024-06-30 20:15:00</td>
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
                            <a href="#" class="btn btn-sm btn-danger">Đã huỷ</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger">Huỷ</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
