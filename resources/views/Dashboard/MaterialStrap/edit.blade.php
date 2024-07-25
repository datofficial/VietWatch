@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
            <h3 class="fw-bold mb-3">Chỉnh sửa chất liệu dây</h3>
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
                        <form method="POST" action="{{ route('material_straps.update', $materialStrap->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="Name">Tên chất liệu dây:</label>
                                <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name', $materialStrap->Name) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="{{ route('material_straps.index') }}" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
