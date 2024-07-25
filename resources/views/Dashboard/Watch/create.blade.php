@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1 class="my-4">Thêm Đồng hồ mới</h1>
    @if (session('success'))
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
    <form action="{{ route('watches.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Name">Tên Đồng hồ</label>
            <input type="text" class="form-control" id="Name" name="Name" value="{{ old('Name') }}" required>
        </div>

        <div class="form-group">
            <label for="Description">Mô tả</label>
            <textarea class="form-control" id="Description" name="Description" required>{{ old('Description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="Engine">Động cơ</label>
            <input type="text" class="form-control" id="Engine" name="Engine" value="{{ old('Engine') }}" required>
        </div>

        <div class="form-group">
            <label for="AvoidWater">Khả năng chống nước</label>
            <input type="text" class="form-control" id="AvoidWater" name="AvoidWater" value="{{ old('AvoidWater') }}" required>
        </div>

        <div class="form-group">
            <label for="SizeStrap">Kích cỡ dây đeo</label>
            <input type="text" class="form-control" id="SizeStrap" name="SizeStrap" value="{{ old('SizeStrap') }}" required>
        </div>

        <div class="form-group">
            <label for="SizeGlass">Kích cỡ mặt kính</label>
            <input type="text" class="form-control" id="SizeGlass" name="SizeGlass" value="{{ old('SizeGlass') }}" required>
        </div>

        <div class="form-group">
            <label for="MaterialGlass">Chất liệu mặt kính</label>
            <input type="text" class="form-control" id="MaterialGlass" name="MaterialGlass" value="{{ old('MaterialGlass') }}" required>
        </div>

        <div class="form-group">
            <label for="IDManufacturer">Nhà sản xuất</label>
            <select class="form-control" id="IDManufacturer" name="IDManufacturer" required>
                <option value="">Chọn Nhà sản xuất</option>
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{ $manufacturer->id }}" {{ old('IDManufacturer') == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->Name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="IDCategory">Danh mục</label>
            <select class="form-control" id="IDCategory" name="IDCategory" required>
                <option value="">Chọn Danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('IDCategory') == $category->id ? 'selected' : '' }}>{{ $category->Name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{ route('watches.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
