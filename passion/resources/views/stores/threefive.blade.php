@extends('layout.main')
@section('title')
    3.5 Goals - Passionpredict.com
@endsection
@section('seo')
@endsection
@section('levelCSS')
@endsection


@section('content')
@include('partials.breadcrum', ['title' =>$title])
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
    <style>
        .pricing {
            text-align: center;

        }

    </style>

    <div class="container container-bg">
        <div class="row">
            @include('partials.headerAdvert')


            <div class="col-sm-10  offset-sm-1 tips-spacing ">
                @include('partials.tipstore_table', ['yy' => $yy, 'tt' => $tt, 'tm' => $tm])
            </div>
            <div class="col-sm-10 offset-sm-1 text-justify">

                <br><br>
                </div>
        </div>



        <div class="container container-bg container-store-bg">


            @include('stores.store_list')

        </div>

    </div>
@endsection
