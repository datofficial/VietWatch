<!-- resources/views/Dashboard/DetailWatch/create.blade.php -->

@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1 class="my-4">Thêm Chi tiết Đồng hồ</h1>
    <form action="{{ route('detail_watches.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="IDWatch">Đồng hồ</label>
            <select class="form-control" id="IDWatch" name="IDWatch" required>
                <option value="">Chọn Đồng hồ</option>
                @foreach ($watches as $watch)
                    <option value="{{ $watch->id }}">{{ $watch->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IDMaterialStrap">Dây đeo</label>
            <select class="form-control" id="IDMaterialStrap" name="IDMaterialStrap" required>
                <option value="">Chọn Dây đeo</option>
                @foreach ($materialStraps as $materialStrap)
                    <option value="{{ $materialStrap->id }}">{{ $materialStrap->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IDColor">Màu sắc</label>
            <select class="form-control" id="IDColor" name="IDColor" required>
                <option value="">Chọn Màu sắc</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Price">Giá</label>
            <input type="text" class="form-control" id="Price" name="Price" value="{{ old('Price') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{ route('detail_watches.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
