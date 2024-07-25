@extends('Home.Layout.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if($relatedDetailWatches->count() > 1)
                <div id="carouselDetailWatch" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($relatedDetailWatches as $index => $relatedDetailWatch)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $relatedDetailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselDetailWatch" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselDetailWatch" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @else
                <img id="watch-image" src="{{ asset('storage/' . $detailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $watch->Name }}</h2>
            <p>{{ $watch->Description }}</p>
            <h3 id="watch-price">{{ number_format($detailWatch->Price, 0, ',', '.') }} VND</h3>

            <div class="form-group">
                <label for="detailWatchVersion">Chọn phiên bản đồng hồ:</label>
                <select class="form-control" id="detailWatchVersion" name="detailWatchVersion" required onchange="updatePriceAndDetailWatchId()">
                    @foreach ($relatedDetailWatches as $relatedDetailWatch)
                        <option value="{{ $relatedDetailWatch->id }}" data-price="{{ $relatedDetailWatch->Price }}" data-image="{{ asset('storage/' . $relatedDetailWatch->Image) }}" {{ $relatedDetailWatch->id == $detailWatch->id ? 'selected' : '' }}>
                            {{ $relatedDetailWatch->materialStrap->Name }} - {{ $relatedDetailWatch->color->Name }} - {{ number_format($relatedDetailWatch->Price, 0, ',', '.') }} VND
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="product-details">
                <h4>Chi tiết sản phẩm</h4>
                <ul>
                    <li>Động cơ: {{ $watch->Engine }}</li>
                    <li>Chất liệu mặt kính: {{ $watch->MaterialGlass }}</li>
                    <li>Kích cỡ mặt kính: {{ $watch->SizeGlass }} mm</li>
                    <li>Kích cỡ dây đeo: {{ $watch->SizeStrap }} mm</li>
                    <li>Mức độ chống nước: {{ $watch->AvoidWater }}</li>
                </ul>
            </div>

            <form action="{{ route('home.addToCart', $detailWatch->id) }}" method="POST">
                @csrf
                <input type="hidden" name="detailWatchId" id="detailWatchId" value="{{ $detailWatch->id }}">
                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>
            
            <a href="{{ route('home.index') }}" class="btn btn-secondary">Trở về trang chủ</a>
        </div>
    </div>
</div>

<script>
    function updatePriceAndDetailWatchId() {
        const selectedOption = document.getElementById('detailWatchVersion').selectedOptions[0];
        const price = selectedOption.getAttribute('data-price');
        const image = selectedOption.getAttribute('data-image');
        const detailWatchId = selectedOption.value;
        document.getElementById('watch-price').innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(price);
        document.getElementById('detailWatchId').value = detailWatchId;
        
        if (document.getElementById('carouselDetailWatch')) {
            const carouselInner = document.querySelector('#carouselDetailWatch .carousel-inner');
            const carouselItems = carouselInner.querySelectorAll('.carousel-item');
            carouselItems.forEach(item => {
                item.classList.remove('active');
                const img = item.querySelector('img');
                if (img.getAttribute('src') === image) {
                    item.classList.add('active');
                }
            });
        } else {
            document.getElementById('watch-image').src = image;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        updatePriceAndDetailWatchId(); // Gọi hàm này khi trang được tải lần đầu để hiển thị giá đúng của phiên bản được chọn
    });
</script>
@endsection
