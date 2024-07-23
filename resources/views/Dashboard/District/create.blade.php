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
            <h3 class="fw-bold mb-3">Thêm quận/huyện mới</h3>
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
                        <h4 class="card-title">Thêm quận/huyện</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('districts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="city_id">Tên thành phố</label>
                                <select name="city_id" class="form-control" id="city_id" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->NameCity }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('city_id'))
                                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="NameDistrict">Tên quận/huyện</label>
                                <input type="text" name="NameDistrict" class="form-control" id="NameDistrict" value="{{ old('NameDistrict') }}" required>
                                @if ($errors->has('NameDistrict'))
                                    <span class="text-danger">{{ $errors->first('NameDistrict') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm quận/huyện</button>
                                <a href="{{ route('districts.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
