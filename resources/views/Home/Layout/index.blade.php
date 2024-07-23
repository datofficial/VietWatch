<!DOCTYPE HTML>
<html>
<head>
    <title>VietWatch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('Home/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('Home/css/icomoon.css') }}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('Home/css/ionicons.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap.min.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('Home/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('Home/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('Home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Home/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('Home/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('Home/css/style.css') }}">

</head>
<body>
    
<div class="colorlib-loader"></div>

<div id="page">
    @include('Home.Layout.header')

    @yield('content')

    @include('Home.Layout.footer')
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('Home/js/jquery.min.js') }}"></script>
<!-- popper -->
<script src="{{ asset('Home/js/popper.min.js') }}"></script>
<!-- bootstrap 4.1 -->
<script src="{{ asset('Home/js/bootstrap.min.js') }}"></script>
<!-- jQuery easing -->
<script src="{{ asset('Home/js/jquery.easing.1.3.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('Home/js/jquery.waypoints.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('Home/js/jquery.flexslider-min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('Home/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('Home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('Home/js/magnific-popup-options.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset('Home/js/bootstrap-datepicker.js') }}"></script>
<!-- Stellar Parallax -->
<script src="{{ asset('Home/js/jquery.stellar.min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('Home/js/main.js') }}"></script>

</body>
</html>