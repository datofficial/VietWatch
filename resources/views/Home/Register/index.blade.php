@extends('Home.Layout.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đăng ký</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('home.registerProcess') }}">
                        @csrf

                        <!-- Tên đăng nhập -->
                        <div class="form-group">
                            <label for="name">Tên đăng nhập</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Số điện thoại -->
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Thành phố -->
                        <div class="form-group">
                            <label for="city">Thành phố</label>
                            <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" required>
                                <option value="">Chọn thành phố</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->NameCity }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Quận/Huyện -->
                        <div class="form-group">
                            <label for="district">Quận/Huyện</label>
                            <select id="district" class="form-control @error('district') is-invalid @enderror" name="district" required>
                                <option value="">Chọn quận/huyện</option>
                            </select>
                            @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Xã/Phường -->
                        <div class="form-group">
                            <label for="ward">Xã/Phường</label>
                            <select id="ward" class="form-control @error('ward') is-invalid @enderror" name="ward" required>
                                <option value="">Chọn xã/phường</option>
                            </select>
                            @error('ward')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Địa chỉ cụ thể -->
                        <div class="form-group">
                            <label for="address">Địa chỉ cụ thể</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Nút đăng ký -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        </div>

                        <!-- Link đăng nhập -->
                        <div class="form-group">
                            <p>Đã có tài khoản? <a href="{{ route('home.loginCustomer') }}">Đăng nhập tại đây</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var citySelect = document.getElementById('city');
        var districtSelect = document.getElementById('district');
        var wardSelect = document.getElementById('ward');

        citySelect.addEventListener('change', function () {
            var cityId = this.value;
            if (cityId) {
                fetch('/getDistricts/' + cityId)
                    .then(response => response.json())
                    .then(data => {
                        districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
                        wardSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
                        for (const [key, value] of Object.entries(data)) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.textContent = value;
                            districtSelect.appendChild(option);
                        }
                    });
            } else {
                districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
                wardSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
            }
        });

        districtSelect.addEventListener('change', function () {
            var districtId = this.value;
            if (districtId) {
                fetch('/getWards/' + districtId)
                    .then(response => response.json())
                    .then(data => {
                        wardSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
                        for (const [key, value] of Object.entries(data)) {
                            var option = document.createElement('option');
                            option.value = key;
                            option.textContent = value;
                            wardSelect.appendChild(option);
                        }
                    });
            } else {
                wardSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
            }
        });
    });
</script>
@endsection
