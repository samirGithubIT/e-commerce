<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontEnd.Inc.head')
</head>

<body>

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-5) -->
   @include('frontEnd.Inc.header')
    <!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
    @include('frontEnd.Inc.cart_menu')
    <!-- Utilize Cart Menu End -->

    @include('frontEnd.Inc.content')

    @yield('content')
    
    
    <div id="load_modal"></div>

    <!-- FOOTER AREA START -->
    @include('frontEnd.Inc.footer')
    <!-- FOOTER AREA END -->

</div>
<!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="{{ asset('front_asset/js/plugins.js') }}"></script>
    {{-- sweet alart --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS -->
    <script src="{{ asset('front_asset/js/main.js') }}"></script>

    
    @include('frontEnd.pages.particles.cart_script')

    @include('backend.common.message')
  
</body>
</html>
