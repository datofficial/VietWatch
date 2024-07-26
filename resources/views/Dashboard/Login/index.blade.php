
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đăng nhập Admin</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.loginProcess') }}">
                        @csrf
                        <input type="hidden" value="">

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Nút đăng nhập -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>

                        <!-- Link quên mật khẩu -->
                        <div class="form-group">
                            {{-- <p><a href="{{ route('admin.password.request') }}">Quên mật khẩu?</a></p> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

