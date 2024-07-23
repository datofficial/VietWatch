@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hiển thị thông báo lỗi nếu có -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chỉnh sửa danh mục</h3>
            <ul class="breadcrumbs mb-3">
                
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', $category->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="Name">Tên danh mục:</label>
                                <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name', $category->Name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="Description">Mô tả:</label>
                                <textarea class="form-control" id="Description" name="Description" rows="3">{{ old('Description', $category->Description) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection