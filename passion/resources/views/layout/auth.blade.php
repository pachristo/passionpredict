<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <meta name="csrf-token"  content="{{csrf_token()}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    @yield('seo')
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/assets/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/assets/fonts/flaticon/font/flaticon.css') }}">

    <!-- Favicon icon -->
    <link href="{{ asset('sweetalert/sweetalert.css') }}?version={{ \Str::random(56) }}" rel="stylesheet">
    {{-- <link href="{{asset('bootsnav/css/style.css')}}" rel="stylesheet"> --}}

    <link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}?version={{ \Str::random(56) }}"> --}}


    <!-- Google fonts -->
    <link href="../../../../../../fonts.googleapis.com/css22962.css?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/assets/css/style.css') }}?version{{ \Str::random(67) }}">

</head>
<body id="top">
{{-- <div class="page_loader"></div> --}}

<!-- Login 18 start -->
<div class="login-18">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form-section">
                    <div class="logo-2">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('logo.png') }}" alt="logo">
                        </a>
                    </div>
                 @yield('body')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 18 end -->

<!-- External JS libraries -->
<script src="{{ asset('auth/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('auth/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('auth/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('auth/assets/js/app.js') }}"></script>
<!-- Custom JS Script -->

<script type="text/javascript"  src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('region_selector/jquery.crs.min.js')}}"></script>
<script type="text/javascript" src="{{asset('select2/js/select2.min.js')}}"></script>
    <script type="text/javascript"  src="{{asset('script/native.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Select country'
        });
    });
</script>
</body>

</html>
