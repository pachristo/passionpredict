

@extends('layout.main')
@section('title')
    Disclaimer  - Passionpredict.com
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
   @include('partials.breadcrum', ['title'=>'Disclaimer'])
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

<div class="container container-bg px-3 pt-5 nopaddingsmall">
    <section>
        <div class="container" style="background-color: whitesmoke; text-align: justify;">
            <div class="row">
                <div class="col-sm-12 mt30">
                   
                        <blockquote>
                        Terms and Conditions of Use and Disclaimer
                        </blockquote>
                        <p>
                        Football betting is about passion and requires maturity to handle risks, and as such, <a href="https://passionpredict.com"> Passionpredict.com </a> does not guarantee winnings and shall not be held responsible for any decisions made, financial or otherwise.
                        Information provided here are expert driven and not GOD-derived, for that losses resulting from the use of information obtained from here are not to be blamed on individuals or corporate entity working with Passionpredict.com.
                        Secondly, we wish to reiterate that Passionpredict.com does not offer bookmaking or services related to bookmaking. In order to place bets, etc. you must access the bookmakers” web sites and comply with the bookmakers” terms and conditions. Any sort of information posted on our site from other websites, persons or organizations should be checked for accuracy and timeliness at the sources themselves and no reliance should be placed on the same as it appears on our site.
                        We also do not accept any responsibility or liability for the comments of our viewers as may be posted on certain pages, example: message boards. If you are offended or are in any way adversely affected by such contents, please contact us immediately and refrain from visiting those pages. we are not liable to remove any offending messages on any pages within our site. Please enter at your own risk!
                        </p>
                        <p><strong>WARNING:</strong> Betting can be very risky and users should only stake with such amount of money that they can comfortably afford to lose and should ensure that the risks involved are fully understood, seeking advice if necessary.
                        </p>
                        <p>
                        <strong>REFUND POLICY:</strong> Passionpredict.com does not offer refunds on our products or services. If you are having any issue with the subscription or have any questions, please contact us, we will do our best to resolve the problem.</p>
                        <br><br>
                        
                </div>
            </div>
        </div>
    </section>
</div>

@endsection




