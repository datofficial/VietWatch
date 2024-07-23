@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
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
            <h3 class="fw-bold mb-3">Thêm danh mục mới</h3>
            <ul class="breadcrumbs mb-3">
               
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm danh mục</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Name">Tên danh mục</label>
                                <input type="text" name="Name" class="form-control" id="Name" value="{{ old('Name') }}" required>
                                @if ($errors->has('Name'))
                                    <span class="text-danger">{{ $errors->first('Name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Description">Mô tả danh mục</label>
                                <textarea name="Description" class="form-control" id="Description" required>{{ old('Description') }}</textarea>
                                @if ($errors->has('Description'))
                                    <span class="text-danger">{{ $errors->first('Description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection