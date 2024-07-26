@extends('Dashboard.Layout.index')

@section('content')
<div class="container">
    <h1>Chỉnh sửa khách hàng</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tên Người dùng -->
        <div class="form-group">
            <label for="NameUser">Tên khách hàng</label>
            <input type="text" class="form-control" id="NameUser" name="NameUser" value="{{ $user->NameUser }}" required>
            @if ($errors->has('NameUser'))
                <span class="text-danger">{{ $errors->first('NameUser') }}</span>
            @endif
        </div>

        <!-- Mật khẩu -->
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label for="PhoneNumber">Số điện thoại</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{ $user->PhoneNumber }}" required>
            @if ($errors->has('PhoneNumber'))
                <span class="text-danger">{{ $errors->first('PhoneNumber') }}</span>
            @endif
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        {{-- <!-- Vai trò -->
        <div class="form-group">
            <label for="Role">Vai trò</label>
            <select class="form-control" id="Role" name="Role" required>
                <option value="">Chọn vai trò</option>
                <option value="0" {{ $user->Role == '0' ? 'selected' : '' }}>Nhân viên</option>
                <option value="1" {{ $user->Role == '1' ? 'selected' : '' }}>Admin</option>
            </select>
            @if ($errors->has('Role'))
                <span class="text-danger">{{ $errors->first('Role') }}</span>
            @endif
        </div> --}}

        <!-- Thành phố -->
        <div class="form-group">
            <label for="IDCity">Thành phố</label>
            <select class="form-control" id="IDCity" name="IDCity" required>
                <option value="">Chọn thành phố</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $user->IDCity ? 'selected' : '' }}>{{ $city->NameCity }}</option>
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
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}" {{ $district->id == $user->IDDistrict ? 'selected' : '' }}>{{ $district->NameDistrict }}</option>
                @endforeach
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
                @foreach ($wards as $ward)
                    <option value="{{ $ward->id }}" {{ $ward->id == $user->IDWard ? 'selected' : '' }}>{{ $ward->NameWard }}</option>
                @endforeach
            </select>
            @if ($errors->has('IDWard'))
                <span class="text-danger">{{ $errors->first('IDWard') }}</span>
            @endif
        </div>

        <!-- Địa chỉ cụ thể -->
        <div class="form-group">
            <label for="Address">Địa chỉ cụ thể</label>
            <input type="text" class="form-control" id="Address" name="Address" value="{{ $user->Address }}" required>
            @if ($errors->has('Address'))
                <span class="text-danger">{{ $errors->first('Address') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var user = @json($user);
        
        function loadDistricts(cityID, selectedDistrictID = null) {
            if (cityID) {
                $.ajax({
                    url: '/getDistricts/' + cityID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#IDDistrict').empty();
                        $('#IDDistrict').append('<option value="">Chọn Quận/Huyện</option>');
                        $.each(data, function(key, value) {
                            $('#IDDistrict').append('<option value="' + key + '"' + (key == selectedDistrictID ? ' selected' : '') + '>' + value + '</option>');
                        });
                        if (selectedDistrictID) {
                            loadWards(selectedDistrictID, user.IDWard);
                        }
                    }
                });
            } else {
                $('#IDDistrict').empty();
                $('#IDWard').empty();
            }
        }

        function loadWards(districtID, selectedWardID = null) {
            if (districtID) {
                $.ajax({
                    url: '/getWards/' + districtID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#IDWard').empty();
                        $('#IDWard').append('<option value="">Chọn Phường/Xã</option>');
                        $.each(data, function(key, value) {
                            $('#IDWard').append('<option value="' + key + '"' + (key == selectedWardID ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#IDWard').empty();
            }
        }

        $('#IDCity').change(function() {
            var cityID = $(this).val();
            loadDistricts(cityID);
        });

        $('#IDDistrict').change(function() {
            var districtID = $(this).val();
            loadWards(districtID);
        });

        loadDistricts(user.IDCity, user.IDDistrict);
    });
</script>
@endsection
