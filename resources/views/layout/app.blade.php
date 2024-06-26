<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta http-equiv="x-ua-compatible" content="ie=edge">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>
    <meta name="Description" content="@yield('page-meta-description')">
    <meta name="Keywords" content="@yield('page-meta-keywords')">
    <meta property="og:title" content="@yield('page-og-title')" />
    <meta property="og:description" content="@yield('page-og-description')" />
    <meta property="og:image" content="@yield('page-og-image-path')" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="@yield('page-og-title')" />



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/dist/images/favicon.png')}}">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{asset('/dist/css/material-design-iconic-font.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/dist/css/font-awesome.min.css')}}">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{asset('/dist/css/fontawesome-stars.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/meanmenu.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/owl.carousel.min.css')}}">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/slick.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/animate.css')}}">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/jquery-ui.min.css')}}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/venobox.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/nice-select.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/magnific-popup.css')}}">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{asset("/dist/css/bootstrap.min.css")}}">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/helper.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/dist/css/responsive.css')}}">
    <!-- Modernizr js -->
    <script src="{{asset('/dist/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>



<!-- Begin Body Wrapper -->
<div class="body-wrapper">

{{--    header also includes navbar menu --}}
@include('layout.partials.header')


@yield('content')



@include('layout.partials.footer')


</div>





<!-- Body Wrapper End Here -->
<!-- jQuery-V1.12.4 -->
<script src="{{asset('/dist/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('/dist/js/vendor/popper.min.js')}}"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="{{asset('/dist/js/bootstrap.min.js')}}"></script>
<!-- Ajax Mail js -->
<script src="{{asset('/dist/js/ajax-mail.js')}}"></script>
<!-- Meanmenu js -->
<script src="{{asset('/dist/js/jquery.meanmenu.min.js')}}"></script>
<!-- Wow.min js -->
<script src="{{asset('/dist/js/wow.min.js')}}"></script>
<!-- Slick Carousel js -->
<script src="{{asset('/dist/slick.min.js')}}"></script>
<!-- Owl Carousel-2 js -->
<script src="{{asset('/dist/js/owl.carousel.min.js')}}"></script>
<!-- Magnific popup js -->
<script src="{{asset('/dist/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Isotope js -->
<script src="{{asset('/dist/js/isotope.pkgd.min.js')}}"></script>
<!-- Imagesloaded js -->
<script src="{{asset('/dist/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Mixitup js -->
<script src="{{asset('/dist/js/jquery.mixitup.min.js')}}"></script>
<!-- Countdown -->
<script src="{{asset('/dist/js/jquery.countdown.min.js')}}"></script>
<!-- Counterup -->
<script src="{{asset('/dist/js/jquery.counterup.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('/dist/js/waypoints.min.js')}}"></script>
<!-- Barrating -->
<script src="{{asset('/dist/js/jquery.barrating.min.js')}}"></script>
<!-- Jquery-ui -->
<script src="{{asset('/dist/js/jquery-ui.min.js')}}"></script>
<!-- Venobox -->
<script src="{{asset('/dist/js/venobox.min.js')}}"></script>
<!-- Nice Select js -->
<script src="{{asset('/dist/js/jquery.nice-select.min.js')}}"></script>
<!-- ScrollUp js -->
<script src="{{asset('/dist/js/scrollUp.min.js')}}"></script>
<!-- Main/Activator js -->
<script src="{{asset('/dist/js/main.js')}}"></script>
</body>

<!-- index30:23-->
</html>
