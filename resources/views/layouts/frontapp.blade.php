<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIG Group</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon_xoft.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/tailwind/tailwind.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{ asset('assets/tailwind/tailwind.js') }}"></script>
    <!-- my font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!-- my icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- transaction midtrans js -->
    
        <script
			  src="https://code.jquery.com/jquery-3.7.1.slim.js"
			  integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc="
			  crossorigin="anonymous"></script>
        </head>

<body>
    <!--<button class="scroll-top scroll-to-target" data-target="html">-->
    <!--    <i class="far fa-angle-double-up"></i>-->
    <!--</button>-->


    <div class="it-offcanvas-area">
        <div class="itoffcanvas">
            <div class="it-offcanva-bottom-shape d-none d-xxl-block">
            </div>
            <div class="itoffcanvas__close-btn">
                <button class="close-btn"><i class="fal fa-times"></i></button>
            </div>
            <div class="itoffcanvas__logo">
                <a href="/">
                    {{-- <img src="assets/img/logo/logo-white.png" alt> --}}
                </a>
            </div>
            <div class="itoffcanvas__text">
                <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh
                    cras pulvinar suspen.</p>
            </div>
            <div class="it-menu-mobile"></div>
            <div class="itoffcanvas__info">
                <h3 class="offcanva-title">Get In Touch</h3>
                <div class="it-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-envelope"></i></a>
                    </div>
                </div>
                <div class="it-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-phone-alt"></i></a>
                    </div>
                    <div class="itoffcanvas__info-address">
                        <span>Phone</span>
                        <a href="tel:(00)45611227890">-</a>
                    </div>
                </div>
                <div class="it-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                    </div>
                    <div class="itoffcanvas__info-address">
                        <span>Location</span>
                        <a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Bandung, West Java </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    @if(request()->routeIs('verification.notice'))
    @elseif(request()->routeIs('login'))
    @elseif(request()->routeIs('register'))
    @else
    <header>
      @include('layouts.nav')
    </header>
    @endif
    <main>
        @yield('content')
    </main>
    <footer>

        <div class="it-footer-area it-footer-bg black-bg pt-120 pb-70"
            data-background="assets/img/footer/bg-1-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-50">
                        <div class="it-footer-widget footer-col-1">
                            <div class="it-footer-logo pb-25">
                            </div>
                            <div class="it-footer-text pb-5">
                                <p>Jl. TB Simatupang No.Kav 1, Cilandak Tim., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430</p>
                            </div>
                            <div class="it-footer-social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-50">
                        <div class="it-footer-widget footer-col-2">
                            <h4 class="it-footer-title">our services:</h4>
                            <div class="it-footer-list">
                                <!-- <ul>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Web
                                            development</a></li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>UI/UX Design</a>
                                    </li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Management</a>
                                    </li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Digital
                                            Marketing</a></li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Blog News</a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 mb-50">
                        <div class="it-footer-widget footer-col-3">
                            <h4 class="it-footer-title">quick links:</h4>
                            <div class="it-footer-list">
                                <ul>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Home</a>
                                    </li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>About</a></li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>Core SIG</a>
                                    </li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>News</a></li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>SIG Institute</a></li>
                                    <li><a href="#"><i class="fa-regular fa-angle-right"></i>SIG Community</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-50">
                        <div class="it-footer-widget footer-col-4">
                            <!--<h4 class="it-footer-title">Gallery</h4>-->
                            <div class="it-footer-gallery-box">
                                <div class="row gx-5">
                                    <div class="col-md-4 col-4">
                                        <!--<div class="it-footer-thumb mb-10">-->
                                        <!--    <img src="assets/img/footer/thumb-1-1.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <!--<div class="it-footer-thumb mb-10">-->
                                        <!--    <img src="assets/img/footer/thumb-1-2.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-md-4 col-4 mb-10">
                                        <!--<div class="it-footer-thumb">-->
                                        <!--    <img src="assets/img/footer/thumb-1-3.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <!--<div class="it-footer-thumb">-->
                                        <!--    <img src="assets/img/footer/thumb-1-4.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <!--<div class="it-footer-thumb">-->
                                        <!--    <img src="assets/img/footer/thumb-1-5.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <!--<div class="it-footer-thumb">-->
                                        <!--    <img src="assets/img/footer/thumb-1-6.png" alt>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="it-copyright-area it-copyright-height">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                        <div class="it-copyright-text text-center">
                            <p>Copyright © 2023 <a href="#">Sig Institute </a> || All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    @yield('scripts')
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/purecounter.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      feather.replace();
    </script>
</body>

<!-- Mirrored from ordainit.com/educate/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Dec 2023 05:03:05 GMT -->

</html>
