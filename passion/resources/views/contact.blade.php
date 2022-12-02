@extends('layout.main')
@section('title')
    contact us - Passionpredict.com
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
@section('contact', 'active')
@section('levelCSS')

@endsection


@section('content')
    @include('partials.breadcrum', ['title'=>' Contact us '])
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




    <div class="container container-bg  pt-5">
        
        <p>&nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp;For Calls:<a href="tel:+{{ $callno }}">&nbsp;<span style="color: #000000;">&nbsp;+{{ $callno }}</span></a></strong></p>
        <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; Whatsapp Only: <span style="color: #339966;"><a style="color: #339966;" href="https://api.whatsapp.com/send?phone={{ $whatsappno }}&amp;text=Hello" target="_blank">&nbsp;+{{ $whatsappno }}</a>&nbsp;</span></strong></p>
        <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; For Enquiry:<span style="color: black;"><a style="color: black;" href="mailto:{{ $contactmail }}" target="_blank">&nbsp;{{ $contactmail }}</a>&nbsp;</span></strong></p>
        <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; For Advert:&nbsp;<span style="color: black;"><a style="color: black;" href="mailto:{{ $advertmail }}" target="_blank">&nbsp;{{ $advertmail }}</a></span></strong></p>
        <p><strong>&nbsp;</strong></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>

@endsection
