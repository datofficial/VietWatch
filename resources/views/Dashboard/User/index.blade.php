@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Quản lý khách hàng</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm khách hàng</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Thành phố</th>
                <th>Quận/Huyện</th>
                <th>Xã/Phường</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->NameUser }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->city->NameCity }}</td>
                <td>{{ $user->district->NameDistrict }}</td>
                <td>{{ $user->ward->NameWard }}</td>
                <td>{{ $user->Role }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
