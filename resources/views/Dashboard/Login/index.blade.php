<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
        }
        .form-control {
            border-radius: 5px;
            font-size: 16px;
            padding: 10px;
        }
        .btn-block {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
        .text-primary {
            font-size: 14px;
            color: #e01212;
            text-decoration: none;
        }
        .text-primary:hover {
            color: #e01212;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Đăng nhập</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.loginProcess') }}">
                            @csrf
                            <!-- Email -->
                            <div class="form-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Tài khoản Garena, Email hoặc số điện thoại" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Mật khẩu -->
                            <div class="form-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Nút đăng nhập -->
                            <div class="form-group mb-3 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                            <!-- Link quên mật khẩu -->
                            {{-- <div class="form-group text-center">
                                <a href="{{ route('admin.password.request') }}" class="text-primary">Quên mật khẩu?</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
