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
            <h3 class="fw-bold mb-3">Chỉnh sửa quận/huyện</h3>
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
                    <div class="card-body">
                        <form method="POST" action="{{ route('districts.update', $district->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="city_id">Tên thành phố:</label>
                                <select name="city_id" class="form-control" id="city_id" required>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $city->id == $district->city_id ? 'selected' : '' }}>{{ $city->NameCity }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="NameDistrict">Tên quận/huyện:</label>
                                <input type="text" class="form-control" id="NameDistrict" name="NameDistrict" value="{{ old('NameDistrict', $district->NameDistrict) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="{{ route('districts.index') }}" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
