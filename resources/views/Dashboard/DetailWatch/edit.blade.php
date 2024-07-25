@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1 class="my-4">Chỉnh sửa Chi tiết Đồng hồ</h1>
    <form action="{{ route('detail_watches.update', $detailWatch->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="IDWatch">Đồng hồ</label>
            <select class="form-control" id="IDWatch" name="IDWatch" required>
                <option value="">Chọn Đồng hồ</option>
                @foreach ($watches as $watch)
                    <option value="{{ $watch->id }}" {{ $detailWatch->IDWatch == $watch->id ? 'selected' : '' }}>{{ $watch->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IDMaterialStrap">Dây đeo</label>
            <select class="form-control" id="IDMaterialStrap" name="IDMaterialStrap" required>
                <option value="">Chọn Dây đeo</option>
                @foreach ($materialStraps as $materialStrap)
                    <option value="{{ $materialStrap->id }}" {{ $detailWatch->IDMaterialStrap == $materialStrap->id ? 'selected' : '' }}>{{ $materialStrap->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IDColor">Màu sắc</label>
            <select class="form-control" id="IDColor" name="IDColor" required>
                <option value="">Chọn Màu sắc</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" {{ $detailWatch->IDColor == $color->id ? 'selected' : '' }}>{{ $color->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Price">Giá</label>
            <input type="text" class="form-control" id="Price" name="Price" value="{{ old('Price', $detailWatch->Price) }}" required>
        </div>

        <div class="form-group">
            <label for="Quantity">Số lượng</label>
            <input type="number" class="form-control" id="Quantity" name="Quantity" value="{{ old('Quantity', $detailWatch->Quantity) }}" required>
        </div>

        <div class="form-group">
            <label for="Image">Hình ảnh</label>
            <input type="file" class="form-control-file" id="Image" name="Image">
            @if ($detailWatch->Image)
                <img src="{{ asset('storage/' . $detailWatch->Image) }}" alt="{{ $detailWatch->watch ? $detailWatch->watch->Name : 'N/A' }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('detail_watches.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
