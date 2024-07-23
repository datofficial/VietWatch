<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Home/css/style.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="card-body">
                        {{-- @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif --}}
                        <form action="{{route('home.loginProcess')}}">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ tôi</label>
                            </div>
                            <button class="btn btn-primary w-100">Đăng nhập</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('home.registerCustomer')}}">Chưa có tài khoản? Đăng ký tại đây</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('Home/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
