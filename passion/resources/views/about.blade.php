

@extends('layout.main')
@section('title')
    About us - Passionpredict.com
@endsection
@section('seo')
<meta name="description" content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
<link rel="canonical" href="https://passionpredict.com/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Passionpredict &raquo; Sure Football Prediction Site" />
<meta property="og:description" content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
<link rel="icon" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
<meta property="og:url" content="https://passionpredict.com/" />
<meta property="og:type" content="article" />

<meta property="og:image" content="{{ asset('favicon.png') }}" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="140" />
<meta property="og:image:height" content="140" />
@endsection
@section('levelCSS')
   
@endsection


@section('content')
   @include('partials.breadcrum', ['title'=>'About Us '])
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
    .mt30{

        margin-top: 30px;
    }

</style>

<div class="container container-bg px-3 pt-5">
    <div class="text-justify">
                    
        <blockquote>
            <strong>Howdy</strong>, warmed welcome to Passionpredict.<br>
            <strong>Passionpredict.com</strong>&nbsp;is the best&nbsp;free football prediction websites and sure football betting tips&nbsp;and prediction sites.
            If you have been wondering about who the <a href="https://sportstips.us">accurate football predictions</a> websites for today is providing top soccer predictions, bet9ja predictions and over 4.5 goals predictions for today and tomorrow.
            We do all football predictions, and as well provide tips and guidelines on how to predict football matches correctly.
            Our various range of prediction includes best over 1.5 soccer prediction which are provided by expert soccer predictors who have full and long term Football prediction experience and knowledge in research about how to carry out soccer predictions.
            You might love to take a look at the full description of&nbsp;<a href="https://sportstips.us">football prediction</a> on wikipedia&nbsp;
            Passionpredict is committed to providing high betting tips using our forecasts, we use relevant statistics and patterns.
            <center><h4>Top Accurate Football Prediction Websites.</h4></center>
            This is not boasting, we are on the journey to becoming overall best, but you can’t talk about it in terms of top accurate football prediction&nbsp;without thinking a fantastic source of joy and leisure for sport lovers.
            You should note, however, that prediction on football is a profitable investment only if it is done with&nbsp;accurate football prediction site like passionpredict.com.
            Passionpredict.com is an accurate sports prediction website with the best football prediction website in the world of soccer prediction and real football predictions
            Making accurate soccer predictions for our users is one top priority in this company, we take you through under 3.5 goals prediction, prediction tips, Free and sure banker of the day.
            <center><h4>Best Football Prediction websites in the World.</h4></center>
            To crown it all, Passionpredict.com has countless times proven to its users that we remain the&nbsp;Best prediction site in the world with the best prediction all over the world, giving our users unbiased services for satisfaction.
            <center><h4>Betting investment</h4></center>
            <a href="https://sportstips.us">Football prediction</a> and betting investment or simply put; sports betting investment is a lucrative investment to venture into but requires smartness. Why did I say so?
            Here is it, everything called success in life is not just about the desire to succeed, but it involves passion, good work, hard work and technical know-how.
            At passionpredict as a standard expert analyzed football prediction website, we make it our utmost goal to guide our visitors through smart and successful football betting investment.
            These and many more are done though our guaranteed betting forecasts such as Over 1.5 goals, Double Chance, Ties, Over 2.5 goals, Average for all teams and many more.
            You can expect the best football draws analysis with as our name and brand speaks for us and our&nbsp;Betting Investment.
            Now let’s take you on a walk to successful betting experience, register with PASSIONPREDICT, to reliably and correctly forecast football matches daily. Our best soccer prediction services covers numerous countries that legalizes betting in Africa such as Kenya, Tanzania, Uganda, Nigeria, South Africa and outside Africa e.g USA and UKE among others.
            </blockquote>
 
</div>

@endsection

