<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="christian umanah">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <meta name="google-site-verification" content="zPf5Oaq7uw0SM3YnAmZ-rclf_JtnFHDM58VGyFkhzm0" />

    @yield('seo')
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quantico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/app-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('user/app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('user/app-assets/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/app-assets/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/app-assets/vendors/css/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/app-assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('file_upload/bootstrap-fileupload.min.css') }}">
    <link href="{{ asset('css/tabs.css') }}" rel="stylesheet">

    <style>
        .alert-warning {
            background-color: #9db5325e;
            border-color: #faebcc;
            font-size: 14px;
            color: #3d0604;
        }

        .alert {
            padding: 6px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: center;
        }

        .font-small-2 {
            font-size: 1.8rem !important;
        }

        .card-header .bar-info {
            border-color: #ffffff !important;
        }

        .card .card-header {
            /* padding: 1.5rem; */
            border-bottom: none;
            background-color: #f4f5fa;
            padding-bottom: 0px;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #0c200c;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #9db532;
            border-color: #9db532;
        }

        .card {
            border: 0;
            margin: 15px 0;
            -webkit-box-shadow: 0 6px 0 0 rgb(0 0 0 / 1%), 0 15px 32px 0 rgb(0 0 0 / 6%);
            box-shadow: 0 6px 0 0 rgb(0 0 0 / 12%), 0 15px 32px 0 rgb(167 157 157 / 62%);
            border-radius: 8px;
        }

        .pricebox {
            height: 194px;
            background: #08313f;
            padding-top: 12px
        }

        .panel {
            height: 71px;
            background: black;
            color: white;
            margin-bottom: 8px;
            padding: 15px 35px;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 978px) {
            .nopaddingsmall {
                padding: 0px !important;
            }

            .myTableSmall {
                font-size: 12px !important;
            }

            .newEmbed {
                height: 380px !important;
            }

            .hideSM {
                display: none;
            }

            .hideLG {
                display: block !important;
            }
        }

        .hideLG {
            display: none
        }

        .newEmbed {
            width: 100%;
            padding-top: 20px;
        }

        .list-groupUpNone {
            margin-bottom: 2px;
        }

        .blink_text {
            animation: blink 1s infinite;
        }

        .blink_black_friday {
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1.0;
            }

            50% {
                opacity: 0.0;
            }

            100% {
                opacity: 1.0;
            }
        }

        .btn-group-vertical button {
            height: 40px !important;
        }

    </style>
    <style>
        .footer-title {

            margin-bottom: 35px;
            padding-bottom: 12px;
            margin-top: 20px;
            border-bottom: 2px solid #999;
            color: #fff;
            font-size: 18px;
            position: relative;
            font-weight: 500;
            text-transform: capitalize;

        }

        .footer-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 2px;
            width: 50px;
            background-color: #05252f;
        }

        .sitemap-widget {
            overflow: hidden;
        }

        ul {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }

        .footer-section {
            background-color: #05252f;
            color: #afb0b2;
            border-top: 1px solid #d55b27;
        }

        .sitemap-widget li a {
            color: #afb0b2;
            display: block;
            border-bottom: 1px solid rgba(102, 102, 102, 0.5);
            position: relative;
            padding: 4px 0 4px 14px;
        }

        .sitemap-widget li a:after {
            content: "\f105";
            font-family: "FontAwesome";
            font-size: 14px;
            left: 0;
            position: absolute;
            top: 4px;
            color: #afb0b2;
            font-weight: 400;
        }

        .nb-copyright {
            background: black;
            padding: 8px;
        }

        .footer-bottom {
            padding: 20px 0;
            border-top: 1px solid #303030;
            font-size: 14px;
            background: #0c200c !important;
        }

        .footer-bottom .copyright p {
            margin-bottom: 0;
        }

        .footer-bottom .footer-bottom-share {
            display: inline-block;
        }

        .footer-bottom .footer-bottom-share ul {
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -ms-flex-wrap: wrap;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .footer-bottom .footer-bottom-share ul li {
            display: inline-block;
        }

        .footer-bottom .footer-bottom-share ul li a {
            font-size: 15px;
            display: block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            line-height: 32px;
            text-align: center;
            color: #fff;
            transition: all 0.4s ease 0s;
            background: black;
        }

        @media (min-width: 992px) {
            footer.footer {
                padding-left: 0px;
            }
        }

        .btn-primary {
            background-color: #05252f !important;
            color: #FFFFFF !important;
            border-color: #05252f;
        }

        .app-sidebar[data-background-color='black'] .navigation li a,
        .off-canvas-sidebar[data-background-color='black'] .navigation li a {
            color: #ffffff;
        }

        .footer-section {
            background-color: #040703;
            color: #afb0b2;
            border-top: 1px solid #d55b27;
        }

        .footer-bottom {
            padding: 20px 0;
            border-top: 1px solid #05252f;
            font-size: 14px;
            background: #05252f;
        }

        .footer-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 2px;
            width: 50px;
            background-color: #de4302;
        }

        .footer-section .footer-top {
            padding: 100px 0 95px;
            padding-bottom: 13px;
        }

        @media only screen and (max-width: 991px) {
            .footer-section .footer-top {
                padding: 25px 0;
            }

        }

        .app-sidebar[data-background-color='black'] .navigation li a,
        .off-canvas-sidebar[data-background-color='black'] .navigation li a {
            color: #467a12;
        }

        .pricebox {
            height: 194px;
            background: #0c200c;
            padding-top: 12px;
        }

        form .form-control {
            border: 0.5px solid #467a12;
            color: #1b1919;
        }

        .wrapper {
            position: relative;
            top: 0;
            height: 100vh;
            background: white;
        }

    </style>
    @yield('levelCSS')
</head>

<body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        <div data-active-color="white" data-background-color="black" data-image="{{ asset('dark.jpeg') }}"
            class="app-sidebar">
            <div class="sidebar-header">
                <div class="logo clearfix"><a href="{{ url('/') }}" class="logo-text float-left">
                        <div class="logo-img"><img src="{{ asset('favicon.png') }}" alt="Convex Logo" /></div>
                        <span class="text align-middle">Passionpredict</span>
                    </a><a id="sidebarToggle" href="javascript:;"
                        class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded"
                            class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                        class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a>
                </div>
            </div>
            <div class="sidebar-content">
                <div class="nav-container">
                    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                        <li class=" nav-item "><a href="{{ url('/dashboard') }}"><i
                                    class="icon-home"></i><span data-i18n=""
                                    class="menu-title">Dashboard</span></a>

                        </li>
                        <li class="has-sub nav-item"><a href="#"><i class="fa fa-user"></i><span data-i18n=""
                                    class="menu-title">Profile</span></a>
                            <ul class="menu-content">
                                <li><a href="{{ url('/profile/update') }}" class="menu-item"> <i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a>


                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="#"><i class="fa fa-ge "></i><span data-i18n=""
                                    class="menu-title">Free Tips</span></a>
                            <ul class="menu-content">
                                <li><a href="{{ route('/double_chance') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i> Double Chance</a>
                                </li>
                                <li><a href="{{ route('/over_15_goals') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i> Over 1.5 Goals</a>
                                </li>
                                <li><a href="{{ route('/over_25_goals') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i> Over 2.5 Goals</a>
                                </li>
                                <li><a href=" {{ route('/btts_gg') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i>
                                        GG/Btts</a>
                                </li>
                                <li><a href=" {{ route('/draw_no_bet') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i>
                                        Draw No Bet</a>
                                </li>
                                <li><a href=" {{ route('/draws') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i>
                                        Draws</a>
                                </li>
                                <li><a href=" {{ route('/handicap') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i>
                                        Handicap</a>
                                </li>
                                <li><a href=" {{ route('/banker_of_the_day') }}" class="menu-item"> <i
                                            class="fa fa-check-square-o Grid"></i>
                                        Banker of The Day</a>
                                </li>



                            </ul>
                        </li>



                        @if (currentUser()->subscription_status == '1')
                            <li class="has-sub nav-item"><a href="#">💎<span data-i18n="" class="menu-title">PREMIUM
                                        TIPS</span></a>
                                <ul class="menu-content">



                                    @if (currentUser()->sub->category == 'Silver Plan')
                                        <li><a href="{{ route('/sureTwoOdds') }}" class="menu-item"> <i
                                                    class="fa fa-check-square-o Grid"></i> Sure 2-3 Odds</a>
                                        </li>
                                        {{-- <li><a href="{{ route('/weekend_tips') }}" class="menu-item">  <i class="fa fa-check-square-o Grid"></i> Weekend Tips</a>
                      </li> --}}
                                    @endif
                                    @if (currentUser()->sub->category == 'Gold Plan')
                                        <li><a href="{{ route('/sureFiveOdds') }}" class="menu-item"> <i
                                                    class="fa fa-check-square-o Grid"></i> Sure 5+ Odds</a>
                                        </li>
                                        {{-- <li><a href="{{ route('/weekend_tips') }}" class="menu-item">  <i class="fa fa-check-square-o Grid"></i> Weekend Tips</a>
                  </li> --}}
                                    @endif

                                    @if (currentUser()->sub->category == 'Super Investment Tip')
                                        <li><a href=" {{ route('/super_investment_tip') }}" class="menu-item">
                                                <i class="fa fa-check-square-o Grid"></i>
                                                Investment Tips</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        <li class=" nav-item"><a href="{{ url('/logout') }}"><i class="icon-logout"></i><span
                                    data-i18n="" class="menu-title">Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-background"></div>
        </div>


        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <a href="{{ url('/') }}" class="logo-text float-left hideLG" style="    position: absolute;
            left: 30%;">
                <div class="logo-img"><img src="{{ asset('logo.png') }}" height="33" alt="Convex Logo" /> <span
                        class="text align-middle" style="font-size: 16px;
                    color: black;
    "></span></div>

            </a>
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span
                            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button><span
                        class="d-lg-none navbar-right navbar-collapse-toggle"><a class="open-navbar-container"><i
                                class="ft-more-vertical"></i></a></span>
                    <div class="dropdown ml-2 display-inline-block">
                        <div class="apps dropdown-menu">
                            <div class="arrow_box"></div>

                        </div>
                    </div>
                </div>
                <div class="navbar-container">
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-1 navbar-search text-left dropdown">
                                <div aria-labelledby="search" class="search dropdown-menu dropdown-menu-right">
                                    <div class="arrow_box_right">
                                        <div><img id="navbar-avatar" src="{{ asset('logo.png') }}"
                                                alt="{{ currentUser()->full_name }}" /></div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown nav-item mt-1">
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="arrow_box_right"></div>
                                </div>
                            </li>
                            <li class="dropdown nav-item mt-1">
                                <div class="notification-dropdown dropdown-menu dropdown-menu-right">


                                </div>
                            </li>
                            <li class="nav-item mt-1 d-none d-lg-block">

                            </li>
                            <li class="dropdown nav-item mr-0">
                                <a id="dropdownBasic3" href="#" data-toggle="dropdown"
                                    class="nav-link position-relative dropdown-user-link dropdown-toggle"><span
                                        class="avatar avatar-online"><img id="navbar-avatar"
                                            src="{{ img(currentUser()->passport, 'users/') }}"
                                            alt="{{ currentUser()->full_name }}" /></span>
                                    <p class="d-none">User Settings</p>
                                </a>
                                <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                                    <div class="arrow_box_right"><a href="{{ url('/profile/update') }}"
                                            class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>My
                                                Profile</span></a>
                                        <div class="dropdown-divider"></div><a href="{{ url('/logout') }}"
                                            class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">


                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <h5>{!! session()->get('error') !!}</h5>
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                <h5>{!! session()->get('warning') !!}</h5>
                            </div>
                        @endif
                        @yield('body')


                    </div>


                </div>
                <footer class="footer footer-static footer-light" style="background:#0c200c;">
                    <div class="col-xl-12 col-lg-12">

                        <!--About div starts-->
                        <div id="about" style="     background:#0c200c;
                            padding-top: 32px;
                            padding-bottom: 40px;
                        ">


                            <div class="row" style="margin:0px;">
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
                                        <li class="active"><a href="{{ url('/tip-stores') }}">Tips Store</a>
                                        </li>
                                        <li><a href="{{ url('/testimonial') }}">Testimonial</a></li>
                                        <li><a href="{{ url('/pricing') }}">Pricing</a>
                                        </li>
                                        <li><a href="{{ url('/dashboard') }}">Account</a></li>
                                        <li><a href="{{ url('/terms') }}">Terms And Conditon</a></li>
                                        <li><a href="{{ url('/sitemap.xml') }}">Sitemap</a></li>
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
                                        <li><a href="{{ route('/how_to_pay') }}" class="text-danger">How To
                                                Pay</a></li>

                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="footer-title"> Reach us on </h4>
                                    <ul class="sitemap-widget">
                                        <li class="active"><a href="tel:+{{ $callno }}"> <i
                                                    class="fa fa-phone"></i>
                                                For Calls
                                                &nbsp;+{{ $callno }}</a> </li>


                                        <li> <a href="https://api.whatsapp.com/send?phone={{ $whatsappno }}&text=Hello"
                                                target="_blank" style="color:#03ea03"> Whatsapp Only:
                                                +{{ $whatsappno }}</a> </li>
                                        <li><a href="mailto:{{ $advertmail }}" target="_blank"> For Advert: <i
                                                    class="fa fa-envelope"></i>&nbsp;{{ $advertmail }}</a></li>
                                        <li><a title="Chat with us on Skype" style="    color: #12e9ff;"
                                                href="{{ $skypelink }}" target="_blank"> For Advert:
                                                <i class="fa fa-skype" aria-hidden="true"></i>&nbsp; Reach us on
                                                Skype</a>
                                        </li>



                                    </ul>
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




                                                    <li><a href="{{ $facebooklink }}"><i
                                                                class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="{{ $twitterlink }}"><i
                                                                class="fa fa-twitter"></i></a>
                                                    </li>

                                                    <li><a href="{{ $telegramlink }}"><i
                                                                class="fa fa-telegram"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </footer>

            </div>


        </div>
    </div>


    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('user/app-assets/vendors/js/core/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/prism.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/screenfull.min.js') }}"></script>
    <script src="{{ asset('user/app-assets/vendors/js/pace/pace.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="{{ asset('user/app-assets/js/app-sidebar.js') }}"></script>
    <script src="{{ asset('user/app-assets/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('user/app-assets/js/customizer.js') }}"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{ asset('user/app-assets/js/dashboard-ecommerce.js') }}"></script> --}}

 
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('file_upload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('region_selector/jquery.crs.min.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript" src="{{ asset('script/native.js') }}"></script>
    @yield('levelJS')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {

            $('#updateProfile').submit(function(e) {
                e.preventDefault();
                $('#updateBtn').prop('disabled', true).html("SAVING <i class='fa fa-spinner fa-spin'></i>");
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 1) {
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        if (data.status == 0) {
                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        }
                        if (data.status == 9) {

                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            setTimeout(window.location.href = data.post, 3000);
                        }

                    },
                    failure: function(e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        })(jQuery);
    </script>
</body>

</html>
