@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Quản lý Chi tiết Đồng hồ</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('detail_watches.create') }}" class="btn btn-primary" style="color: white">
                            Thêm Chi tiết Đồng hồ
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Giá</th>
                                        <th style="text-align: center;">Đồng hồ</th>
                                        <th style="text-align: center;">Dây đeo</th>
                                        <th style="text-align: center;">Màu sắc</th>
                                        <th style="text-align: center;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailWatches as $detailWatch)
                                        <tr>
                                            <td style="text-align: center;">{{ $detailWatch->id }}</td>
                                            <td style="text-align: center;">{{ number_format($detailWatch->Price, 2) }}</td>
                                            <td style="text-align: center;">{{ $detailWatch->watch ? $detailWatch->watch->Name : 'N/A' }}</td>
                                            <td style="text-align: center;">{{ $detailWatch->strap ? $detailWatch->strap->Name : 'N/A' }}</td>
                                            <td style="text-align: center;">{{ $detailWatch->color ? $detailWatch->color->Name : 'N/A' }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('detail_watches.edit', $detailWatch->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Chỉnh sửa
                                                </a>
                                                <form method="POST" action="{{ route('detail_watches.destroy', $detailWatch->id) }}" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            function confirmDelete() {
                                return confirm("Bạn có chắc chắn muốn xóa?");
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
