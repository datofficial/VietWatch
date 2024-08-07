@extends('Home.Layout.index')

@section('content')
<div class="container">
    <h1>Thông tin cá nhân</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('home.profile.update') }}" method="POST">
        @csrf
        @method('PUT') <!-- Thêm dòng này để spoof phương thức PUT -->

        <!-- Tên Người dùng -->
        <div class="form-group">
            <label for="NameUser">Tên khách hàng</label>
            <input type="text" class="form-control" id="NameUser" name="NameUser" value="{{ $user->NameUser }}" required>
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label for="PhoneNumber">Số điện thoại</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{ $user->PhoneNumber }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Thành phố -->
        <div class="form-group">
            <label for="IDCity">Thành phố</label>
            <select class="form-control" id="IDCity" name="IDCity" required>
                <option value="">Chọn thành phố</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $user->IDCity ? 'selected' : '' }}>{{ $city->NameCity }}</option>
                @endforeach
            </select>
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
        </div>

        <!-- Địa chỉ cụ thể -->
        <div class="form-group">
            <label for="Address">Địa chỉ cụ thể</label>
            <input type="text" class="form-control" id="Address" name="Address" value="{{ $user->Address }}" required>
        </div>

        {{-- <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
        <a href="{{ route('home.profile') }}" class="btn btn-secondary">Trở về</a>
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
