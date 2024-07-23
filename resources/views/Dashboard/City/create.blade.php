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
            <h3 class="fw-bold mb-3">Thêm thành phố mới</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
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
                        <h4 class="card-title">Thêm thành phố</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cities.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="NameCity">Tên thành phố</label>
                                <input type="text" name="NameCity" class="form-control" id="NameCity" value="{{ old('NameCity') }}" required>
                                @if ($errors->has('NameCity'))
                                    <span class="text-danger">{{ $errors->first('NameCity') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm thành phố</button>
                                <a href="{{ route('cities.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
