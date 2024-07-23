@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Thêm Nhân viên</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <!-- Tên Người dùng -->
        <div class="form-group">
            <label for="NameUser">Tên Nhân viên</label>
            <input type="text" class="form-control" id="NameUser" name="NameUser" required>
            @if ($errors->has('NameUser'))
                <span class="text-danger">{{ $errors->first('NameUser') }}</span>
            @endif
        </div>

        <!-- Mật khẩu -->
        <div class="form-group">
            <label for="Password">Mật khẩu</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
            @if ($errors->has('Password'))
                <span class="text-danger">{{ $errors->first('Password') }}</span>
            @endif
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label for="PhoneNumber">Số điện thoại</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
            @if ($errors->has('PhoneNumber'))
                <span class="text-danger">{{ $errors->first('PhoneNumber') }}</span>
            @endif
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
            @if ($errors->has('Email'))
                <span class="text-danger">{{ $errors->first('Email') }}</span>
            @endif
        </div>

        <!-- Vai trò -->
        <div class="form-group">
            <label for="Role">Vai trò</label>
            <select class="form-control" id="Role" name="Role" required>
                <option value="">Chọn vai trò</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @if ($errors->has('Role'))
                <span class="text-danger">{{ $errors->first('Role') }}</span>
            @endif
        </div>

        <!-- Thành phố -->
        <div class="form-group">
            <label for="IDCity">Thành phố</label>
            <select class="form-control" id="IDCity" name="IDCity" required>
                <option value="">Chọn thành phố</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->NameCity }}</option>
                @endforeach
            </select>
            @if ($errors->has('IDCity'))
                <span class="text-danger">{{ $errors->first('IDCity') }}</span>
            @endif
        </div>

        <!-- Quận/Huyện -->
        <div class="form-group">
            <label for="IDDistrict">Quận/Huyện</label>
            <select class="form-control" id="IDDistrict" name="IDDistrict" required>
                <option value="">Chọn quận/huyện</option>
            </select>
            @if ($errors->has('IDDistrict'))
                <span class="text-danger">{{ $errors->first('IDDistrict') }}</span>
            @endif
        </div>

        <!-- Xã/Phường -->
        <div class="form-group">
            <label for="IDWard">Xã/Phường</label>
            <select class="form-control" id="IDWard" name="IDWard" required>
                <option value="">Chọn xã/phường</option>
            </select>
            @if ($errors->has('IDWard'))
                <span class="text-danger">{{ $errors->first('IDWard') }}</span>
            @endif
        </div>

        <!-- Địa chỉ cụ thể -->
        <div class="form-group">
            <label for="Address">Địa chỉ cụ thể</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
            @if ($errors->has('Address'))
                <span class="text-danger">{{ $errors->first('Address') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Khi thay đổi thành phố
        $('#IDCity').on('change', function() {
            var city_id = $(this).val();
            if(city_id) {
                $.ajax({
                    url: '/getDistricts/' + city_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#IDDistrict').empty().append('<option value="">Chọn quận/huyện</option>');
                        $('#IDWard').empty().append('<option value="">Chọn xã/phường</option>');
                        $.each(data, function(key, value) {
                            $('#IDDistrict').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#IDDistrict').empty().append('<option value="">Chọn quận/huyện</option>');
                $('#IDWard').empty().append('<option value="">Chọn xã/phường</option>');
            }
        });

        // Khi thay đổi quận/huyện
        $('#IDDistrict').on('change', function() {
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: '/getWards/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#IDWard').empty().append('<option value="">Chọn xã/phường</option>');
                        $.each(data, function(key, value) {
                            $('#IDWard').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#IDWard').empty().append('<option value="">Chọn xã/phường</option>');
            }
        });
    });
</script>
@endsection
