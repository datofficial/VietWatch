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
            <h3 class="fw-bold mb-3">Chỉnh sửa phường/xã</h3>
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
                        <form method="POST" action="{{ route('wards.update', $ward->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="district_id">Tên quận/huyện:</label>
                                <select name="district_id" class="form-control" id="district_id" required>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}" {{ $district->id == $ward->district_id ? 'selected' : '' }}>{{ $district->NameDistrict }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="NameWard">Tên phường/xã:</label>
                                <input type="text" class="form-control" id="NameWard" name="NameWard" value="{{ old('NameWard', $ward->NameWard) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="{{ route('wards.index') }}" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
