@extends('layout.main')

@section('title')
    Passionpredict - Best Soccer Predictions
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
@section('home', 'active')
@section('levelCSS')


@endsection
@section('lower_header')
    @include('partials.lower_header')

@endsection
@section('content')
    <!-- Slider Section Start Here -->
    @include('partials.welcome_header')
    <!-- Slider Section end Here -->
    <div class="container container-bg" style="padding:1px;background:#ffffff;">
        <div style="padding:0px; " class="mb-3">



            {{-- code ads --}}

            <?php
            $country = COUNTRYNAME;
            $ad2 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad2a', $country);

            ?>


            @if (count($ad2) > 0)
                @foreach ($ad2 as $key => $ad2)
                    <div class=" col-lg-12  hideSM py-1">
                        {!! $ad2->website !!}

                    </div>
                @endforeach

            @endif



            <center>
                <?php
                $country = COUNTRYNAME;
                $ad3 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad2b', $country);

                ?>

                @if (count($ad3) > 0)
                    passion
                    @foreach ($ad3 as $key => $ad3)
                        <div class="hideLG">
                            <br>

                            {!! $ad3->website !!}
                            <br>

                        </div>
                    @endforeach
                @endif



            </center>





            {{-- ads column --}}
            <div class="col-sm-12 px-0 mt10">
                <?php
                $country = COUNTRYNAME;
                $ad2 = \App\Solos\Modules\Ad\Model\Ad::getAds('ad2a', $country);

                ?>

                <div class="hideSM">
                    <center>
                        @if (count($ad2) > 0)
                            @foreach ($ad2 as $key => $ad2)
                                <br>
                                <a href="{{ $ad2->website }}" class="hideSM" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt=""
                                        class="img-responsive"></a>

                                <br>
                            @endforeach

                        @endif
                    </center>
                </div>

                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad3 = \App\Solos\Modules\Ad\Model\Ad::getAds('ad2b', $country);

                    ?>
                    <div class="hideLG">
                        @if (count($ad3) > 0)
                            @foreach ($ad3 as $key => $ad3)
                                <br>
                                <a href="{{ $ad3->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad3->ads_image }}" alt=""
                                        class="img-responsive"></a>

                                <br>
                            @endforeach


                        @endif
                    </div>


                </center>



            </div>



        </div>

        <div class="row ">
            {{-- tips --}}
            <div class=" col-lg-8 col-sm-12 border-right-dt mt10 nopaddingsmall px-0 pb-3"
                style="background-color: #FFFFFF;">
                @include('partials.freepicks', [
                    'freeToday' => $freeToday,
                    'freeTomorrow' => $freeTomorrow,
                    'todayCode' => $todayCode,
                    'tomorrowCode' => $tomorrowCode,
                    'freeYesterday' => $freeYesterday,
                ]);
                <div class="col-12 px-0">
                    @include('partials.passion_investment', [])
                </div>
            </div>


            <div class="col-lg-4 mt-3">
                <?php
                $country = COUNTRYNAME;

                $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'code_mad1')
                    ->where('status', '0')
                    ->inRandomOrder()
                    ->first();
                ?>
                @if (isset($ad1))
                    <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">


                        {!! $ad1->website !!}


                    </div>
                @endif


                <?php
                $country = COUNTRYNAME;

                $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'mad1')
                    ->where('status', '0')
                    ->inRandomOrder()
                    ->first();

                ?>
                @if (isset($ad1))
                    <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">

                        <a href="{{ $ad1->website }}" target="_blank"><img
                                src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt=""
                                class="img-responsive"></a>


                    </div>
                @endif
            </div>
            {{-- <div class="col-sm-1"></div> --}}

            @include('partials.sportnews')

        </div>





        <div class="col-sm-12 nopaddingsmall mt10 pb-3">
            <div class="container">

                <div class="col-sm-12 mt10">
                    <center>
                        <?php
                        $country = COUNTRYNAME;
                        $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad3a', $country);

                        //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();

                        ?>
                        <div class="hideSM">
                            @if (count($ad4) > 0)
                                @foreach ($ad4 as $key => $ad4)
                                    <br>
                                    {!! $ad4->website !!}
                                    <br>
                                @endforeach

                            @endif

                        </div>
                    </center>
                    <center>
                        <?php
                        $country = COUNTRYNAME;
                        $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad3b', $country);

                        ?>
                        <div class="hideLG">
                            @if (count($ad4b) > 0)

                                @foreach ($ad4b as $key => $ad4b)
                                    <br>
                                    {!! $ad4b->website !!}
                                    <br>
                                @endforeach
                            @endif

                        </div>


                    </center>






                    <center>
                        <?php
                        $country = COUNTRYNAME;
                        $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('ad3a', $country);

                        ?>
                        <div class="hideSM">
                            @if (count($ad4) > 0)
                                @foreach ($ad4 as $key => $ad4)
                                    <br>
                                    <a href="{{ $ad4->website }}" target="_blank"><img
                                            src="{{ $path }}/ads/{{ $ad4->ads_image }}" alt=""
                                            class="img-responsive"></a> <br>
                                @endforeach
                            @endif

                        </div>
                    </center>
                    <center>
                        <?php
                        $country = COUNTRYNAME;
                        $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('ad3b', $country);
                        //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                        ?>
                        <div class="hideLG">
                            @if (count($ad4b) > 0)
                                @foreach ($ad4b as $key => $ad4b)
                                    <br>
                                    <a href="{{ $ad4b->website }}" target="_blank"><img
                                            src="{{ $path }}/ads/{{ $ad4b->ads_image }}" alt=""
                                            class="img-responsive"></a><br>
                                @endforeach

                            @endif

                        </div>


                    </center>
                </div>

            </div>
            {{-- <div class="row"> --}}

        </div>


    </div>
    </div>

    <!-- INVESTMENT TIPS-->
    {{-- @include('partials.investment') --}}
    <!-- ENDINVESTMENT TIPS-->


    <div class="col-sm-12 nopaddingsmall mt10">
        <div class="container container-bg">

            <div class="col-sm-12 mt10">
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_uis', $country);

                    //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();

                    ?>
                    <div class="hideSM">
                        @if (count($ad4) > 0)
                            @foreach ($ad4 as $key => $ad4)
                                <br>
                                {!! $ad4->website !!}
                                <br>
                            @endforeach

                        @endif

                    </div>
                </center>
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('mcode_uis', $country);
                    //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                    ?>
                    <div class="hideLG">
                        @if (count($ad4b) > 0)
                            @foreach ($ad4b as $key => $ad4b)
                                <br>
                                {!! $ad4b->website !!}
                                <br>
                            @endforeach

                        @endif

                    </div>


                </center>






                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $uuu = \App\Solos\Modules\Ad\Model\Ad::getAds('uis', $country);

                    //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();

                    ?>
                    <div class="hideSM">
                        @if (count($uuu) > 0)
                            @foreach ($uuu as $key => $ad4)
                                <br>
                                <a href="{{ $ad4->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad4->ads_image }}" alt=""
                                        class="img-responsive"></a> <br>
                            @endforeach

                        @endif

                    </div>
                </center>
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('muis', $country);
                    //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                    ?>
                    <div class="hideLG">
                        @if (count($ad4b) > 0)
                            @foreach ($ad4b as $key => $ad4b)
                                <br>
                                <a href="{{ $ad4b->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad4b->ads_image }}" alt=""
                                        class="img-responsive"></a><br>
                            @endforeach

                        @endif

                    </div>


                </center>
            </div>

        </div>

    </div>

    <div class="container  pt-4"
        style="    padding-top: 55px;
                                                                padding-bottom: 40px;">

        <div class="row">
            <div class="col-lg-6 px-0 col-sm-12 col-xs-12 mt10  border-right-dt px-0 nopaddingsmall ">
                @include('partials.upcoming', ['inview' => $inview])
            </div>
            <div class="col-lg-6 col-sm-12">

            </div>



           
            <div class="clearfix"></div>
        </div>
    </div>


    @include('partials.vip_packages', [
        // 'silver' => $silver,
        'gold' => $gold,
        'investment' => $investment,
    ])





    <div class="container ">
        <div class="container">

            <div class="col-sm-12 mt10 ">
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad5a', $country);

                    ?>
                    <div class="hideSM">
                        @if (count($ad4) > 0)
                            @foreach ($ad4 as $key => $ad4)
                                <br>
                                {!! $ad4->website !!}
                                <br>
                            @endforeach

                        @endif

                    </div>
                </center>
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad5b', $country);
                    //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                    ?>
                    <div class="hideLG">
                        @if (count($ad4b) > 0)
                            @foreach ($ad4b as $key => $ad4b)
                                <br>
                                {!! $ad4b->website !!}
                                <br>
                            @endforeach

                        @endif

                    </div>


                </center>






                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('ad5a', $country);

                    //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();

                    ?>
                    <div class="hideSM">
                        @if (count($ad4) > 0)
                            @foreach ($ad4 as $key => $ad4)
                                <br>
                                <a href="{{ $ad4->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad4->ads_image }}" alt=""
                                        class="img-responsive"></a> <br>
                            @endforeach

                        @endif

                    </div>
                </center>
                <center>
                    <?php
                    $country = COUNTRYNAME;
                    $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('ad5b', $country);
                    //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                    ?>
                    <div class="hideLG">
                        @if (count($ad4b) > 0)
                            @foreach ($ad4b as $key => $ad4b)
                                <br>
                                <a href="{{ $ad4b->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad4b->ads_image }}" alt=""
                                        class="img-responsive"></a><br>
                            @endforeach

                        @endif

                    </div>


                </center>
            </div>

        </div>


    </div>

    <div class="container container-bg container-store-bg">



        @include('stores.store_list')

    </div>

    <div class="container container-bg" style="    padding: 0px 12px;">
        <div class="section">
            <div class="wojo-grid px-3 pb-5">
                <div class="row gutters ">
                    <hr>
{{-- HOMEPAGE FOOTER CONTENT BEGINS --}}












{{-- HOMEPAGE FOOTER CONTENT ENDS --}}
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection

@section('levelJS')
    <script>
        var today = '';
        @if (isset($first))
            var today = "{{ \Carbon\Carbon::parse($first->gameTime)->format('M d, Y H:i:s') }}";
        @endif
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        var countDown = new Date(today).getTime(),
            x = setInterval(function() {

                var now = new Date().getTime(),
                    distance = countDown - now;
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                // do something later when date is reached
                if (distance < 0) {
                    clearInterval(x);
                    // 'ITS MY BIRTHDAY!';
                }
            }, second);
    </script>

@endsection
