<!-- resources/views/Home/Category/index.blade.php -->

@extends('Home.Layout.index')

@section('content')
<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>Tất cả Danh mục</h2>
            </div>
        </div>
        @foreach($categories as $category)
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>{{ $category->Name }}</h2>
                    <p>{{ $category->Description }}</p>
                </div>
            </div>
            <div class="row row-pb-md">
                @foreach($category->watches->take(4) as $watch)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            @if($watch->detailWatches->count() > 1)
                                <div id="carousel-{{ $watch->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($watch->detailWatches as $index => $detailWatch)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <a href="{{ route('home.detailwatch', $watch->id) }}" class="prod-img">
                                                    <img src="{{ asset('storage/' . $detailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-{{ $watch->id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-{{ $watch->id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            @else
                                @foreach($watch->detailWatches as $detailWatch)
                                    <a href="{{ route('home.detailwatch', $watch->id) }}" class="prod-img">
                                        <img src="{{ asset('storage/' . $detailWatch->Image) }}" class="img-fluid" alt="{{ $watch->Name }}">
                                    </a>
                                @endforeach
                            @endif
                            <div class="desc">
                                <h2><a href="{{ route('home.detailwatch', $watch->id) }}">{{ $watch->Name }}</a></h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><a href="{{ route('home.category', $category->id) }}" class="btn btn-primary btn-lg">Hiển thị thêm</a></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
