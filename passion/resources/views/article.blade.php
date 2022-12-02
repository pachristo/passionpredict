



@extends('layout.main')
@section('title')
    {{ $art->slug }} - Passionpredict.com
@endsection
@section('seo')
<meta property="og:url" content="{{ url('/blog') }}/" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$art->title}}" />
<meta property="og:description" content="{{$art->title}}" />
<meta property="og:image" content="{{$path}}blog/{{$art->display_image}}" />

<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="140" />
<meta property="og:image:height" content="140" />
@endsection
@section('blog', 'active')
@section('levelCSS')
   
@endsection


@section('content')
   @include('partials.breadcrum', ['title'=>'Blog Post' ])
   <div class="container text-center">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5>{!! session()->get('error') !!}</h5>  
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">>
            <h5>{!! session()->get('warning') !!}</h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
   
    </div>
<style>
    .pricing {
        text-align: center;

    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {}

    a,
    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
    }

    a,
    a:active,
    a:focus {
        color: #333;
        text-decoration: none;
        transition-timing-function: ease-in-out;
        -ms-transition-timing-function: ease-in-out;
        -moz-transition-timing-function: ease-in-out;
        -webkit-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        transition-duration: 0.2s;
        -ms-transition-duration: 0.2s;
        -moz-transition-duration: 0.2s;
        -webkit-transition-duration: 0.2s;
        -o-transition-duration: 0.2s;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .sec-title-style1 {
        position: relative;
        display: block;
        margin-top: -9px;
        padding-bottom: 50px;
    }

    .sec-title-style1.max-width {
        position: relative;
        display: block;
        max-width: 770px;
        margin: -9px auto 0;
        padding-bottom: 52px;
    }

    .sec-title-style1.pabottom50 {
        padding-bottom: 42px;
    }

    .sec-title-style1 .title {
        position: relative;
        display: block;
        color: #131313;
        font-size: 36px;
        line-height: 46px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .sec-title-style1 .title.clr-white {
        color: #ffffff;
    }

    .sec-title-style1 .decor {
        position: relative;
        display: block;
        width: 70px;
        height: 5px;
        margin: 19px 0 0;
    }

    .sec-title-style1 .decor:before {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .decor:after {
        position: absolute;
        top: 0;
        right: 10px;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .decor span {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 1px;
        background: #9db532;
        margin: 2px 0;
    }

    .sec-title-style1 .text {
        position: relative;
        display: block;
        margin: 7px 0 0;
    }

    .sec-title-style1 .text p {
        position: relative;
        display: inline-block;
        padding: 0 15px;
        color: #131313;
        font-size: 14px;
        line-height: 16px;
        font-weight: 700;
        text-transform: uppercase;
        margin: 0;
    }

    .sec-title-style1 .text.clr-yellow p {
        color: #9db532;
    }

    .sec-title-style1 .text .decor-left {
        position: relative;
        top: -2px;
        display: inline-block;
        width: 70px;
        height: 5px;
        background: transparent;
    }

    .sec-title-style1 .text .decor-left span {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 1px;
        background: #9db532;
        content: "";
        margin: 2px 0;
    }

    .sec-title-style1 .text .decor-left:before {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .text .decor-left:after {
        position: absolute;
        top: 0;
        right: 10px;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .text .decor-right {
        position: relative;
        top: -2px;
        display: inline-block;
        width: 70px;
        height: 5px;
        background: transparent;
    }

    .sec-title-style1 .text .decor-right span {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 50px;
        height: 1px;
        background: #9db532;
        content: "";
        margin: 2px 0;
    }

    .sec-title-style1 .text .decor-right:before {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .text .decor-right:after {
        position: absolute;
        top: 0;
        left: 10px;
        bottom: 0;
        width: 5px;
        height: 5px;
        background: #9db532;
        border-radius: 50%;
        content: "";
    }

    .sec-title-style1 .bottom-text {
        position: relative;
        display: block;
        padding-top: 16px;
    }

    .sec-title-style1 .bottom-text p {
        color: #848484;
        font-size: 16px;
        line-height: 26px;
        font-weight: 400;
        margin: 0;
    }

    .sec-title-style1 .bottom-text.clr-gray p {
        color: #cdcdcd;
    }

    .contact-address-area {
        position: relative;
        display: block;
        background: #ffffff;
        padding: 100px 0 120px;
    }

    .contact-address-area .sec-title-style1.max-width {
        padding-bottom: 72px;
    }

    .contact-address-box {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
    }

    .single-contact-address-box {
        position: relative;
        display: block;
        background: #131313;
        padding: 85px 30px 77px;
    }

    .single-contact-address-box .icon-holder {
        position: relative;
        display: block;
        padding-bottom: 24px;
    }

    .single-contact-address-box .icon-holder span:before {
        font-size: 75px;
    }

    .single-contact-address-box h3 {
        color: #ffffff;
        margin: 0px 0 9px;
    }

    .single-contact-address-box h2 {
        color: #9db532;
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 19px;
    }

    .single-contact-address-box a {
        color: #ffffff;
    }

    .single-contact-address-box.main-branch {
        background: #9db532;
        padding: 53px 30px 51px;
        margin-top: -20px;
        margin-bottom: -20px;
    }

    .single-contact-address-box.main-branch h3 {
        color: #131313;
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 38px;
        text-transform: uppercase;
        text-align: center;
    }

    .single-contact-address-box.main-branch .inner {
        position: relative;
        display: block;
    }

    .single-contact-address-box.main-branch .inner ul {
        position: relative;
        display: block;
        overflow: hidden;
    }

    .single-contact-address-box.main-branch .inner ul li {
        position: relative;
        display: block;
        padding-left: 110px;
        /* border-bottom: 1px solid #737373; */
        padding-bottom: 23px;
        margin-bottom: 24px;
    }

    .single-contact-address-box.main-branch .inner ul li:last-child {
        border: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .single-contact-address-box.main-branch .inner ul li .title {
        position: absolute;
        top: 2px;
        left: 0;
        display: inline-block;
    }

    .single-contact-address-box.main-branch .inner ul li .title h4 {
        color: #131313;
        font-size: 18px;
        font-weight: 600;
        line-height: 24px;
        text-transform: capitalize;
        /* border-bottom: 2px solid #a5821e; */
    }

    .single-contact-address-box.main-branch .inner ul li .text {
        position: relative;
        display: block;
    }

    .single-contact-address-box.main-branch .inner ul li .text p {
        color: #131313;
        font-size: 16px;
        line-height: 24px;
        font-weight: 600;
        margin: 0;
    }

    .contact-info-area {
        position: relative;
        display: block;
        background: #ffffff;
    }

    .contact-form {
        position: relative;
        display: block;
        background: #ffffff;
        padding: 100px 60px 80px;
        -webkit-box-shadow: 0px 3px 8px 2px #ededed;
        box-shadow: 0px 3px 8px 2px #ededed;
        z-index: 3;
    }

    .contact-form .sec-title-style1 {
        position: relative;
        display: block;
        padding-bottom: 51px;
        width: 50%;
    }

    .contact-form .text-box {
        position: relative;
        display: block;
        margin-top: 19px;
        width: 50%;
    }

    .contact-form .text p {
        color: #848484;
        line-height: 26px;
        margin: 0;
    }

    .contact-form .inner-box {
        position: relative;
        display: block;
        background: #ffffff;
    }

    .contact-form form {
        position: relative;
        display: block;
    }

    .contact-form form .input-box {
        position: relative;
        display: block;
    }

    .contact-form form input[type="text"],
    .contact-form form input[type="email"],
    .contact-form form textarea {
        position: relative;
        display: block;
        background: #ffffff;
        border: 1px solid #eeeeee;
        width: 100%;
        height: 55px;
        font-size: 16px;
        padding-left: 19px;
        padding-right: 15px;
        border-radius: 0px;
        margin-bottom: 20px;
        transition: all 500ms ease;
    }

    .contact-form form textarea {
        height: 130px;
        padding-left: 19px;
        padding-right: 15px;
        padding-top: 14px;
        padding-bottom: 15px;
    }

    .contact-form form input[type="text"]:focus {
        color: #222222;
        border-color: #d4d4d4;
    }

    .contact-form form input[type="email"]:focus {
        color: #222222;
        border-color: #d4d4d4;
    }

    .contact-form form textarea:focus {
        color: #222222;
        border-color: #d4d4d4;
    }

    .contact-form form input[type="text"]::-webkit-input-placeholder {
        color: #848484;
    }

    .contact-form form input[type="text"]:-moz-placeholder {
        color: #848484;
    }

    .contact-form form input[type="text"]::-moz-placeholder {
        color: #848484;
    }

    .contact-form form input[type="text"]:-ms-input-placeholder {
        color: #848484;
    }

    .contact-form form input[type="email"]::-webkit-input-placeholder {
        color: #848484;
    }

    .contact-form form input[type="email"]:-moz-placeholder {
        color: #848484;
    }

    .contact-form form input[type="email"]::-moz-placeholder {
        color: #848484;
    }

    .contact-form form input[type="email"]:-ms-input-placeholder {
        color: #848484;
    }

    .contact-form form button {
        position: relative;
        display: block;
        width: 100%;
        background: #9db532;
        border: 1px solid #9db532;
        color: #131313;
        font-size: 16px;
        line-height: 55px;
        font-weight: 600;
        text-align: center;
        text-transform: capitalize;
        transition: all 200ms linear;
        transition-delay: 0.1s;
        cursor: pointer;
    }

    .contact-form form button:hover {
        color: #ffffff;
        background: #131313;
    }

    .single-contact-address-box.main-branch {
        background: #ffffff;
        padding: 53px 30px 51px;
        margin-top: -20px;
        margin-bottom: -20px;
    }

    .single-contact-address-box.main-branch {
        background: #ffffff;
        padding: 20px 30px 51px;
        margin-top: -20px;
        margin-bottom: -20px;
    }

    .contact-address-area .sec-title-style1.max-width {
        padding-bottom: 16px;
    }

</style>

<div class="container-fluid container-bg">
  

  
        <section id="why-us" >
            <div class="container">
    
                <div class="row wow fadInUp justify-content-center margin-top-xl " style="margin-top: 10px">
    
                    <div class="col-sm-12 nopaddingsmall" >
                        <div class="sec-title-style1 text-center max-width">
                            <br>
                        <br>
             
                            <div class="text"><div class="decor-left"><span></span></div><p><h4>{{$art->title}}</h4></p><div class="decor-right"><span></span></div></div>
                            <div class="bottom-text">
                                <p></p>
                            </div>
                        </div>
                    <!--<center><h3></h3></center>-->
                        <center>
                            <img src="{{$path}}/blog/{{$art->display_image}}" class="img-fluid" width="100%" alt="{{$art->title}}">
                            <br>
                            <p>{{\Carbon\Carbon::parse($art->created_at)->format('jS M, Y @ h:i a')}}</p>
                        </center>
    <!-- AddToAny BEGIN -->
   <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    <a class="a2a_button_whatsapp"></a>
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_email"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_button_telegram"></a>
    </div>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->
        <!-- AddToAny END -->
                        <hr>
                        {!! $art->content !!}
                       
         
                        <br>
                                                        <!-- AddToAny BEGIN -->
    <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    <a class="a2a_button_whatsapp"></a>
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_email"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_button_telegram"></a>
    </div>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->
        <!-- AddToAny END -->
                    </div>
                    <style>#M679409ScriptRootC1073006 {min-height: 300px;}</style>
    
                </div>
    
            </div>
            <br>
            <br>
        </section>
</div>

@endsection

