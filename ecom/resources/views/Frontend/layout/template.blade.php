<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.themesground.com/flipmart-demo/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2020 19:47:01 GMT -->
<head>
    @include('Frontend.includes.header')

    {{--CSS links--}}
    @include('Frontend.includes.css')
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
@include('Frontend.includes.topbar')
<!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
@include('Frontend.includes.menubar')
<!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
{{--    responsive menu included in the menubar.blade.php--}}
<!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">


            <!-- ============================================== CONTENT ============================================== -->
        @yield('body-content')
        <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png"
                                                                             src="assets/images/blank.gif" alt=""> </a>
                    </div>
                    <!--/.item-->

                    <div class="item m-t-10"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png"
                                                                             src="assets/images/blank.gif" alt=""> </a>
                    </div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                      src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('Frontend.includes.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

@include('Frontend.includes.script')
</body>

<!-- Mirrored from www.themesground.com/flipmart-demo/HTML/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2020 19:51:13 GMT -->
</html>
