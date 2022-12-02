@extends('layout.main')
@section('title')
    Pricing Plan - Passionpredict.com
@endsection
@section('seo')
    <meta name="description"
        content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
    <link rel="canonical" href="https://passionpredict.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Passionpredict &raquo; Sure Football Prediction Site" />
    <meta property="og:description"
        content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
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
@section('price', 'active')
@section('levelCSS')
    <style>
        .well {
            min-height: 20px;
            padding: 14px 21px !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px dotted rgb(233 233 233 / 29%);
        }
    </style>
@endsection


@section('content')
    @include('partials.breadcrum', ['title' => 'Pricing '])
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

    <div class="container container-bg">
        <br>
        @include('partials.vip_packages', ['gold'=>$gold,'investment'=>$investment])

    </div>



@endsection
