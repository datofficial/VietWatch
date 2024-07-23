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
            <h3 class="fw-bold mb-3">Thêm phường/xã mới</h3>
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
                        <h4 class="card-title">Thêm phường/xã</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('wards.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="district_id">Tên quận/huyện</label>
                                <select name="district_id" class="form-control" id="district_id" required>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->NameDistrict }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('district_id'))
                                    <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="NameWard">Tên phường/xã</label>
                                <input type="text" name="NameWard" class="form-control" id="NameWard" value="{{ old('NameWard') }}" required>
                                @if ($errors->has('NameWard'))
                                    <span class="text-danger">{{ $errors->first('NameWard') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Thêm phường/xã</button>
                                <a href="{{ route('wards.index') }}" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
