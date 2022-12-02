



@extends('layout.main')
@section('title')
    Blog - Passionpredict.com
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
@section('blog', 'active')
@section('levelCSS')
   
@endsection


@section('content')
   @include('partials.breadcrum', ['title'=>'Blog '])
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

<div class="container-fluid container-bg">
    <section>
        <style>
            :root {
                --color-mode: "light";
                --color-primary: #5869DA;
                --color-secondary: #2d3d8b;
                --color-success: #09815C;
                --color-danger: #e3363e;
                --color-warning: #e38836;
                --color-info: #4da7d4;
                --color-light: #f8f9f9;
                --color-grey: #f7f8f9;
                --color-dark: #000c2d;
                --color-muted: #687385;
                --color-white: #FFFFFF;
                --primary-border-color: #9b9b9b;
                --secondary-border-color: #f0f8ff;
                --mutted-border-color: #eaecee;
                --box-shadow-normal: 0 10px 10px rgba(19, 15, 15, 0.08);
                --box-shadow-hover: 0 4px 60px 0 rgba(0, 0, 0, 0.2);
                --button-shadow-color-normal: hsla(0, 0%, 42.4%, 0.2);
                --button-shadow-color-hover: hsla(0, 0%, 42.4%, 0.3);
            }

            .hover-up:hover {
                transform: translateY(-5px);
                box-shadow: var(--box-shadow-hover), 0 0 0 transparent;
            }

            .card-img {
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
                /* border-radius: 11px; */
            }

            .card {
    padding-top: 0px !important;
    margin-bottom: 8px;
    border-radius: 10px;
    /* background: white; */
}
            .post-card-1 {
                border: 1px solid gray;
                z-index: 12;
                transition: all .25s cubic-bezier(.02, .01, .47, 1);
                position: relative;
                background: #fff;
            }




            .card-title {
                margin-bottom: 0.3rem;
            }

            .cat {
                display: inline-block;
                margin-bottom: 1rem;
            }

            .fa-users {
                margin-left: 1rem;
            }

            .card-footer {
                font-size: 0.8rem;
            }

            .card-img {
                width: 100%;
                height: 235px;
            }

            .body-lg {
                   height: 115px;

            }
            .card-title>a{
                color:black!important;
            }

            @media only screen and (max-width:600px) and (min-width:100px) {
                .card-body {
                    margin-top: 0px !important;
                    padding: 0px !important;
                }
                .container-blog{
                    padding:0px !important;
                }

                .card {
                    padding-top: 0px !important;
                    border-radius: 5px;
                }

                .card-img {
                    height: 80px;
                    width: 120px;
                }

                .body-lg {
                    height: 100%;
    padding-top: 14px;

                }

                .image-section {
                    padding-top: 4px;
                    padding:2px!important;
                    padding-bottom: 4px;
                }

                .image-section>a>img {
                    border-radius: 5px;
                }

                .card {
                    background: white;
                    padding: 4px;
                    padding-bottom: 0px;
                }
            }

        </style>
        @php
          $blog = \DB::table('blogs')->latest('created_at')
                                    ->where('status', 'Publish')
                                    ->paginate(12);
        @endphp
        {{-- id creator title slug category content display_image status likes other created_at updated_at --}}
        <div class="container container-blog">
            <br class="hideSM"><br class="hideSM"><br class="hideSM">
            <div class="row">
                @if (count($blog) > 0)
                    @foreach ($blog as $key => $value)
                        @php
                            
                            $title = $value->title;
                            if (strlen($value->title) > 50) {
                                $title = substr($value->title, 0, 50) . '...';
                            }
                            
                        @endphp
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="card hover-up">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-5 image-section">

                                        <a href="{{ url('/blog') }}/{{ $value->slug }}">
                                            <img class="card-img"
                                                src="{{ $path }}/blog/{{ $value->display_image }}"
                                                alt="{{ $value->title }}">
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-7 body-lg">
                                        <div class=" hideSM">
                                            <a href="#" class="btn btn-light btn-sm">{{ $value->category }}</a>
                                            {{-- <div class="card-footer  justify-content-between bg-transparent border-top-0 hideSM"> --}}
                                            <small class="text-danger"
                                                style="    float: right;
                                                        padding-right: 9px;">{{ \Carbon\Carbon::parse($value->created_at)->format('d M , Y') }}
                                            </small>
                                            {{-- <div class="stats">
                                            <i class="far fa-eye"></i> 1347
                                            <i class="far fa-comment"></i> 12
                                        </div> --}}

                                            {{-- </div> --}}
                                        </div>

                                        <div class="card-body pt-0">
                                            <h6 class="card-title hideLG"><a
                                                    href="{{ url('/blog') }}/{{ $value->slug }}">{{ $title }}</a>
                                            </h6>
                                            <h6 class="card-title hideSM"><a
                                                    href="{{ url('/blog') }}/{{ $value->slug }}">{{ $value->title }}</a>
                                            </h6>
                                            {{-- <p class="card-text hideSM" >I love quick, simple pasta dishes, and this is one of my favorite.</p> --}}
                                            {{-- <div class="text-center col-sm-12">
                                                <br class="hideSM">
                                                <a href="{{ url('/blog') }}/{{ $value->slug }}"
                                                    class="btn btn-danger hideSM">
                                                    <li class="fa fa-eye"></li> Read
                                                </a>
                                            </div> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <div class="container">
                        <nav aria-label="Page navigation">
                            {{ $blog->render() }}
                        </nav>
                    </div>
                @else
                    <span>
                        <center>
                            <h4 class="alert alert-warning">NO BLOG POST YET</h4>
                        </center>
                    </span>

                @endif


            </div>
        </div>
    </section>
</div>

@endsection


