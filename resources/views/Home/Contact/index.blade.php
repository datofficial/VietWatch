@extends('Home.Layout.index')

@section('content')
<div class="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Liên hệ</h2>
                <p class="text-center">Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua biểu mẫu dưới đây.</p>
            </div>
        </div>
        <div class="row contact-info">
            <div class="col-md-4">
                <div class="info-box">
                    <div class="icon">
                        <i class="icon-location"></i>
                    </div>
                    <h3>Địa chỉ</h3>
                    <p>24 Hai Bà Trưng, Tràng Tiền, Hoàn Kiếm, Hà Nội</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="icon">
                        <i class="icon-phone"></i>
                    </div>
                    <h3>Số điện thoại</h3>
                    <p>024 6666 8888</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="icon">
                        <i class="icon-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>vietwatch@gmail.com</p>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung:</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</div>
@endsection

<style>
.colorlib-contact {
    padding: 50px 0;
}

.contact-info .info-box {
    margin-bottom: 30px;
    text-align: center;
}

.contact-info .info-box .icon {
    font-size: 40px;
    color: #00BFFF;
    margin-bottom: 15px;
}

.contact-info .info-box h3 {
    font-size: 20px;
    font-weight: bold;
}

.contact-info .info-box p {
    font-size: 16px;
}

.form-group label {
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    border: 1px solid #ddd;
    border-radius: 5px;
}

.btn-primary {
    background-color: #00BFFF;
    border-color: #00BFFF;
}

.btn-primary:hover {
    background-color: #008CBA;
    border-color: #008CBA;
}

.contact-info ul {
    list-style-type: none;
    padding: 0;
}

.contact-info ul li {
    padding: 5px 0;
}

.contact-info ul li a {
    color: #000;
    text-decoration: none;
}

.contact-info ul li a:hover {
    text-decoration: underline;
}
</style>
