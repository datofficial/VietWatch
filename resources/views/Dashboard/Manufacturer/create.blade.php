@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
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
            <h3 class="fw-bold mb-3">Thêm nhà sản xuất mới</h3>
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
                        <h4 class="card-title">Thêm nhà sản xuất</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('manufacturers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Name">Tên nhà sản xuất</label>
                                <input type="text" name="Name" class="form-control" id="Name" value="{{ old('Name') }}" required>
                                @if ($errors->has('Name'))
                                    <span class="text-danger">{{ $errors->first('Name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Description">Mô tả nhà sản xuất</label>
                                <textarea name="Description" class="form-control" id="Description" required>{{ old('Description') }}</textarea>
                                @if ($errors->has('Description'))
                                    <span class="text-danger">{{ $errors->first('Description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm nhà sản xuất</button>
                                <a href="{{ route('manufacturers.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
