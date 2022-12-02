<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <meta name="csrf-token"  content="{{csrf_token()}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    @yield('seo')
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('boostrap/bootstrap.min.css') }}?version={{ \Str::random(56) }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/font-awesome.min.css') }}?version={{ \Str::random(56) }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/animate.css') }}?version={{ \Str::random(56) }}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/rsmenu-main.css') }}?version={{ \Str::random(56) }}">
    <!-- rsmenu transitions css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/rsmenu-transitions.css') }}?version={{ \Str::random(56) }}">
    <!-- hover-min css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/hover-min.css') }}?version={{ \Str::random(56) }}">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/magnific-popup.css') }}?version={{ \Str::random(56) }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/owl.carousel.css') }}?version={{ \Str::random(56) }}">
    <link rel="stylesheet" href="{{ asset('soccer/css/time-circles.css') }}?version={{ \Str::random(56) }}">
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ asset('soccer/css/slick.css') }}?version={{ \Str::random(56) }}">
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}?version={{ \Str::random(56) }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('soccer/style.css') }}">
    <!-- responsive css -->
    <link href="{{ asset('sweetalert/sweetalert.css') }}?version={{ \Str::random(56) }}" rel="stylesheet">
    {{-- <link href="{{asset('bootsnav/css/style.css')}}" rel="stylesheet"> --}}

    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}?version={{ \Str::random(56) }}">
    <link rel="stylesheet" href="{{ asset('soccer/css/responsive.css') }}?version={{ \Str::random(56) }}">


    <link rel="stylesheet" href="{{ asset('css/main.css') }}?version={{ \Str::random(56) }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('file_upload/bootstrap-fileupload.min.css') }}">

    @yield('levelCSS')
<style>
    
</style>

</head>

<body class="home-two">
    <div class="container-fluid">
         <nav class="navbar navbar-expand-lg  navbar-light bg-dark  fixed-top ">
        <a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive logo_image" src="{{ asset('logo.png') }}"
               ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item @yield('home')">
                    <a class="nav-link " href="{{ url('/') }}">Home </a>
                </li>
                <li class="nav-item @yield('price') ">
                    <a class="nav-link" href="{{ route('/pricing') }}">Pricing </a>
                </li>
                <li class="nav-item @yield('store') ">
                    <a class="nav-link" href="{{ url('/tips-store') }}">Tips Stores </a>
                </li>
                <li class="nav-item @yield('winning') ">
                    <a class="nav-link" href="{{ url('/testimonial') }}">Testimonial </a>
                </li>
                {{--
                    <li class="nav-item @yield('blog') ">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="nav-item @yield('about') ">
                    <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                </li>
                --}}
                <li class="nav-item @yield('contact') ">
                    <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
                </li>
                <li class="nav-item ">
                    @if (!currentUser())
                        <a class="text-success  nav-link" href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    @else
                        <a class="text-danger  nav-link" href="{{ url('/dashboard') }}" ><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a>
                    @endif

                </li>





            </ul>

        </div>
    </nav>
    </div>

    <div class="row" style="margin:0px">
        {{-- <div class="col-sm-2"></div>
<div class="col-sm-8"></div>
<div class="col-sm-2"></div> --}}
        <!--Header area start here-->

        <!--Header area end here-->

        @yield('content')
    </div>
    </div>

    </div>

    </div>




    </div>
    <!-- Footer Start -->
    <footer id="footer-section " class="footer-section ">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-title">about us</h4>
                        <div class="about-widget">
                            <p>Passionpredict is an online service that provides the most accurate football
                                prediction,
                                soccer betting tips as well as news to it's users.</p>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <h4 class="footer-title">Quick Links</h4>
                        <ul class="sitemap-widget">
                            <li class="active"><a href="{{ url('/tip-stores') }}">Tips Store</a></li>
                            <li><a href="{{ url('/testimonial') }}">Testimonial</a></li>
                            <li><a href="{{ url('/pricing') }}">Pricing</a>
                            </li>
                            <li><a href="{{ url('/dashboard') }}">Account</a></li>
                            <li><a href="{{ route('/how_to_pay',['country'=>'']) }}" class="text-danger">How To Pay</a></li>


                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-title">Useful Links</h4>
                        <ul class="sitemap-widget">
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about-us') }}">About</a></li>
                            <li><a href="{{ url('/contact-us') }}">Contact us</a>
                            </li>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li><a href="{{ url('/disclaimer') }}">Disclaimer</a></li>

                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-title"> Reach us on </h4>
                        <ul class="sitemap-widget">
                            <li class="active"><a href="tel:+{{ $callno }}"> <i class="fa fa-phone"></i>
                                    For Calls
                                    &nbsp;+{{ $callno }}</a> </li>


                            <li> <a href="https://api.whatsapp.com/send?phone={{ $whatsappno }}&text=Hello" target="_blank"
                                    style="color:#03ea03"> Whatsapp Only: +{{ $whatsappno }}</a> </li>
                            <li><a href="mailto:{{ $advertmail }}" target="_blank"> For Advert: <i
                                        class="fa fa-envelope"></i>&nbsp;{{ $advertmail }}</a></li>
                            <li><a title="Chat with us on Skype" style="    color: #12e9ff;"
                                    href="{{ $skypelink }}" target="_blank"> For Advert:
                                    <i class="fa fa-skype" aria-hidden="true"></i>&nbsp; Reach us on Skype</a>
                            </li>



                        </ul>
                    </div>
                    <div class="col-lg-12 justify-content-center" style="    text-align: center;
    padding-top: 23px;">
                       {{-- <div class="col-md-12">
                           <img class="payment_method" src="{{ asset('payment/1.png') }}">
                       </div> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="copyright">

                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <div class="text-right ft-bottom-right">
                            <div class="footer-bottom-share">
                                <ul>




                                    <li><a href="{{ $telegramlink }}"><i
                                                class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="{{ $twitterlink }}"><i
                                                class="fa fa-twitter"></i></a>
                                    </li>

                                    <li><a href="{{ $telegramlink }}"><i class="fa fa-telegram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->





    <!-- End scrollUp  -->

    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="{{ asset('soccer/js/jquery.min.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- Menu js -->
    <script src="{{ asset('soccer/js/rsmenu-main.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- jquery-ui js -->
    <script src="{{ asset('soccer/js/jquery-ui.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('boostrap/bootstrap.bundle.min.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('soccer/js/jquery.meanmenu.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- wow js -->
    <script src="{{ asset('soccer/js/wow.min.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('soccer/js/slick.min.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- masonry js -->
    <script src="{{ asset('soccer/js/masonry.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- magnific-popup js -->
    <!-- owl.carousel js -->
    <script src="{{ asset('soccer/js/owl.carousel.min.js') }}?version={{ \Str::random(56) }}"></script>
    <script src="{{ asset('soccer/js/time-circle.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('soccer/js/jquery.magnific-popup.js') }}?version={{ \Str::random(56) }}"></script>
    <!-- main js -->
    <script src="{{ asset('soccer/js/main.js') }}?version={{ \Str::random(56) }}"></script>

    <script type="text/javascript" src="{{ asset('sweetalert/sweetalert.min.js') }}?version={{ \Str::random(56) }}"></script>
    <script type="text/javascript" src="{{ asset('script/native.js') }}?version={{ \Str::random(56) }}"></script>

    {{-- <script src="{{asset('bootsnav/js/bootsnav.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('region_selector/jquery.crs.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('select2/js/select2.min.js') }}"></script>
    @yield('levelJS')
    <script>
        $(document).ready(function() {
            $('.select2form').select2({
                placeholder: 'Select Your Country'
            });
        });
    </script>

</body>


</html>
