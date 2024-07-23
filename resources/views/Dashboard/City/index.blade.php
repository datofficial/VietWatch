@extends('Dashboard.Layout.index')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Quản lý thành phố</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
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
                        <a href="{{ route('cities.create') }}" class="btn btn-primary" style="color: white">
                            Thêm thành phố
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Tên thành phố</th>
                                        <th style="text-align: center;">Chỉnh sửa</th>
                                        <th style="text-align: center;">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr>
                                            <td style="text-align: center;">{{ $city->id }}</td>
                                            <td style="text-align: center;">{{ $city->NameCity }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Chỉnh sửa
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <form method="POST" action="{{ route('cities.destroy', $city) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Xoá
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
                                return confirm("Bạn có chắc chắn muốn xoá?");
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
