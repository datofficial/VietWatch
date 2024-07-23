@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1 class="my-4">Danh sách Đồng hồ</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('watches.create') }}" class="btn btn-primary mb-3">Thêm Đồng hồ</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Động cơ</th>
                <th>Khả năng chống nước</th>
                <th>Nhà sản xuất</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watches as $watch)
                <tr>
                    <td>{{ $watch->id }}</td>
                    <td>{{ $watch->Name }}</td>
                    <td><img src="{{ asset('storage/' . $watch->Image) }}" alt="{{ $watch->Name }}" width="50"></td>
                    <td>{{ $watch->Engine }}</td>
                    <td>{{ $watch->AvoidWater }}</td>
                    <td>{{ $watch->manufacturer->Name }}</td>
                    <td>{{ $watch->category->Name }}</td>
                    <td>
                        <a href="{{ route('watches.edit', $watch->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                        <form action="{{ route('watches.destroy', $watch->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
