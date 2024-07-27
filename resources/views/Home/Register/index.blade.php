<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            margin-top: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            font-size: 24px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
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
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->NameDistrict }}</option>
                                    @endforeach
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
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}">{{ $ward->NameWard }}</option>
                                    @endforeach
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
                                <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                            </div>

                            <!-- Link đăng nhập -->
                            <div class="form-group text-center">
                                <p>Đã có tài khoản? <a href="{{ route('home.loginCustomer') }}">Đăng nhập tại đây</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
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
                } else {
                    wardSelect.innerHTML = '<option value="">Chọn xã/phường</option>';
                }
            });
        });
    </script> --}}
</body>
</html>
