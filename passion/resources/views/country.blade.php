


@extends('layout.main')
@section('title')
Select Country - Passionpredict.com
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
@section('store', 'active')

@section('content')
   @include('partials.breadcrum', ['title'=>' Select Country '])
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

</style>

<div class="container container-bg px-3 pt-5">
   


    <style>
        .pricing {
            text-align: center;
    
        }
        .well {
        min-height: 6px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        /* background: linear-gradient(
    180deg, #111111, #eaeef2); */
        color: white;
    }
    .btn-success:hover,.btn-success{
        color: #fff;
        background-color: #114d63;
        border-color: #124d63;
    }
    </style>
    
    <div class="container ">
      
    
                        <div class="col-sm-10 offset-sm-1 text-justify section-head">
                            <br>
                            <h5 style="    color: white;
                            text-align: center;" class="well py-2">Set Your Country</h5>
                            
                            <p style="text-align: center;">Kindly select your country below to proceed.</p>
                          
                            <form action="{{route('/select_country')}}" method="post">
                                <div class="form-group">
                                    <select name="country" class="form-control crs-country select2form" data-region-id="one" required id=""></select>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button class="btn btn-md btn-success btn-block" id="countryBtn">PROCEED <i class="fa fa-arrow-circle-o-right"></i></button>
                                </div>
                            </form>
                            <br><br>
                        </div>
    
    </div>
    
    <br>
<br>
<br>

</div>

@endsection

@section('levelJS')

    <script>
        $(document).ready(function () {
            $('#countryForm').submit(function (e) {
                e.preventDefault();
                $('#countryBtn').prop('disabled', true).html("SETTING COUNTRY <i class='fa fa-spinner fa-spin'></i>");
                var url =  $(this).attr('action');
                var method = $(this).attr('method');
                var formData = $(this).serialize();

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status == 1) {
                            $('#countryBtn').prop('disabled', false).html("PROCEED <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        else {
                            window.location.href="";
                        }
                    },
                    failure: function (e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        });
    </script>

@endsection