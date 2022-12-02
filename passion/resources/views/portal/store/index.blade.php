@extends('layout.main')

@section('title')
    Dashboard - Passionpredict.com
@endsection
@section('seo')
    <meta name="description"
        content="Passionpredict is the best on line service of football statistics that provides accurate and free football prediction. We are planet predict give soccer forecast to every one of the best alliances across the world.">
    <meta name=" keywords"
        content="football prediction, soccer prediction site, site that predict football matches correctly, soccer prediction, best football prediction site free, tips 180, sure prediction, predictz" />
@endsection
@section('home', 'active')
@section('levelCSS')
<style>
    .alert-danger {
    background-color: #ec4357;
    border-color: #ebccd19e;
    color: #fbf6f3;
}
</style>

@endsection
@section('lower_header')
    @include('partials.lower_header')

@endsection
@section('content')
    <!-- Slider Section Start Here -->
    @include('partials.dashboard_header')
    <!-- Slider Section end Here -->




    <div class="col-sm-12 nopaddingsmall mt10">
        <div class="container container-bg pt-3">
            <div class="col-sm-12 mb-2 mt-2">
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


    @if (currentUser()->subscription_status =='0')

        @include('partials.vip_packages', [
            'silver' => $silver,
            'gold' => $gold,
            'investment' => $investment,
        ])
    @else
        <div class="container container-bg pb-5 pt-3">
            <div class="col-sm-12 mb-2  ">
                <h6 class="black_bar">OUR PREMIUM TIPS</h6>
            </div>
            <div class="tabs">
                <input type="radio" id="tab1" name="tab-control">
                <input type="radio" id="tab2" name="tab-control" checked>
                <input type="radio" id="tab3" name="tab-control">
                <ul style="
                                                                        
                                                    padding-top: 6px;
                                                ">
                    <li title="Yesterday">
                        <label for="tab1" role="button">
                            <span>Yesterday</span>
                        </label>
                    </li>
                    <li title="Today">
                        <label for="tab2" role="button">
                            <span>Today</span></label>
                    </li>
                    <li title="Tomorrow">
                        <label for="tab3" role="button">
                            <span>Tomorrow</span></label>
                    </li>
                </ul>

                <div class="content">
                    <section>
                        <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET ONE</span></h4>
                        @if (count($yy) > 0)
                            <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;" width="100%"
                                class="table table-striped myTableSmall">
                                <thead
                                    style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                    <tr>
                                        <td style="width: 8%;">Time</td>
                                        <td style="width: 8%;">League</td>
                                        <td style="width: 64%;">Match</td>
                                        <td style="width: 9%;">Tip</td>
                                        {{-- <td style="width: 9%;">Odd</td> --}}
                                        <td style="width: 9%;">Result</td>
                                        {{-- <td style="width: 11%;">Book- Maker</td> --}}
                                    </tr>
                                </thead>
                                <tbody style="text-align: center!important;">
                                    <?php $yyOdds = 1; ?>
                                    @foreach ($yy as $key => $item)
                                        <tr style="height: 21px;">
                                            <td style="background-color: #ffffff;">
                                                <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                            </td>
                                            <td><span>{{ $item->league }}</span></td>
                                            <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                        style="color: #ff0000;"><strong>VS</strong></span>
                                                    {{ $item->teamTwo }}</span></td>
                                            @if ($keys == 'sure2')
                                                <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                            @elseif($keys == 'sure3')
                                                <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                            @elseif($keys == 'ov3')
                                                <td><span><strong>Ov3.5</strong></span></td>
                                            @elseif($keys == 'ssingles')
                                                <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                            @elseif($keys == 'sure5')
                                                <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                            @elseif($keys == 'fifty')
                                                <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                            @elseif($keys == 'wt')
                                                <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                            @elseif($keys == 'ht')
                                                <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                            @elseif($keys == 'suInTip')
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                                <td><span><strong>{{ $item->superInvestmentTip }}</strong></span></td>
                                            @elseif($keys == 'jackpot')
                                                <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                            @endif
                                            <td>{{ $item->teamOneScore }}@if ($item->teamOneScore != 'pstp')
                                                    :
                                                @endif{{ $item->teamTwoScore }}</td>
                                        </tr>
                                        @if ($keys == 'sure2')
                                            <?php if (isset($item->sure2OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure2OddsOdds;
                                            } ?>
                                        @elseif($keys == 'sure3')
                                            <?php if (isset($item->sure3OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure3OddsOdds;
                                            } ?>
                                        @elseif($keys == 'ov3')
                                            <?php if (isset($item->overThreeOdds)) {
                                                $yyOdds = $yyOdds * $item->overThreeOdds;
                                            } ?>
                                        @elseif($keys == 'ssingles')
                                            <?php if (isset($item->superSingleOdds)) {
                                                $yyOdds = $yyOdds * $item->superSingleOdds;
                                            } ?>
                                        @elseif($keys == 'sure5')
                                            <?php if (isset($item->sure5OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure5OddsOdds;
                                            } ?>
                                        @elseif($keys == 'fifty')
                                            <?php if (isset($item->fiftyPlusOdds)) {
                                                $yyOdds = $yyOdds * $item->fiftyPlusOdds;
                                            } ?>
                                        @elseif($keys == 'wt')
                                            <?php if (isset($item->weekendOdds)) {
                                                $yyOdds = $yyOdds * $item->weekendOdds;
                                            } ?>
                                        @elseif($keys == 'ht')
                                            <?php if (isset($item->HTFTOdds)) {
                                                $yyOdds = $yyOdds * $item->HTFTOdds;
                                            } ?>
                                        @elseif($keys == 'suInTip')
                                            <?php if (isset($item->superInvestmentOdds)) {
                                                $yyOdds = $yyOdds * $item->superInvestmentOdds;
                                            } ?>
                                        @elseif($keys == 'jackpot')
                                            <?php if (isset($item->jackpotOdds)) {
                                                $yyOdds = $yyOdds * $item->jackpotOdds;
                                            } ?>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12 text-center">
                                            <h5 class="text-success"> Total Odds:
                                                <strong>{{ number_format($yyOdds, 2) }}</strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <span>
                                <center>
                                    <h4 class="alert alert-warning">OOPS! NO GAME WAS HERE</h4>
                                </center>
                            </span>
                        @endif
                        {{-- @if (isset($cy))
                            <hr>
                            <h4 class="alert alert-success text-center">
                                Code: <strong>{{ $cy->bookingCode }} - ({{ $cy->bookMaker }})</strong>
                            </h4>
                        @endif --}}

                        @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'fifty' || $keys == 'ht' || $keys == 'wt')
                        @else
                            <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET TWO</span></h4>
                            @if (count($yy2) > 0)
                                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                                    width="100%" class="table table-striped myTableSmall">
                                    <thead
                                        style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                        <tr>
                                            <td style="width: 8%;">Time</td>
                                            <td style="width: 8%;">League</td>
                                            <td style="width: 64%;">Match</td>
                                            <td style="width: 9%;">Tip</td>
                                            {{-- <td style="width: 9%;">Odd</td> --}}
                                            <td style="width: 9%;">Result</td>
                                            {{-- <td style="width: 11%;">Book- Maker</td> --}}
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center!important;">
                                        <?php $yyOdds = 1; ?>
                                        @foreach ($yy2 as $key => $item)
                                            <tr style="height: 21px;">
                                                <td style="background-color: #ffffff;">
                                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                                </td>
                                                <td><span>{{ $item->league }}</span></td>
                                                <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                            style="color: #ff0000;"><strong>VS</strong></span>
                                                        {{ $item->teamTwo }}</span></td>
                                                @if ($keys == 'sure2')
                                                    <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                                @elseif($keys == 'sure3')
                                                    <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                                @elseif($keys == 'ov3')
                                                    <td><span><strong>Ov3.5</strong></span></td>
                                                @elseif($keys == 'ssingles')
                                                    <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                                @elseif($keys == 'sure5')
                                                    <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                                @elseif($keys == 'fifty')
                                                    <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                                @elseif($keys == 'wt')
                                                    <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                                @elseif($keys == 'ht')
                                                    <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                                @elseif($keys == 'suInTip')
                                                    <td><span><strong>{{ $item->superInvestmentTip }}</strong></span>
                                                    </td>
                                                @elseif($keys == 'jackpot')
                                                    <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                                    {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                                @endif
                                                <td>{{ $item->teamOneScore }}@if ($item->teamOneScore != 'pstp')
                                                        :
                                                    @endif{{ $item->teamTwoScore }}</td>
                                            </tr>
                                            @if ($keys == 'sure2')
                                                <?php if (isset($item->sure2OddsOdds)) {
                                                    $yyOdds = $yyOdds * $item->sure2OddsOdds;
                                                } ?>
                                            @elseif($keys == 'sure3')
                                                <?php if (isset($item->sure3OddsOdds)) {
                                                    $yyOdds = $yyOdds * $item->sure3OddsOdds;
                                                } ?>
                                            @elseif($keys == 'ov3')
                                                <?php if (isset($item->overThreeOdds)) {
                                                    $yyOdds = $yyOdds * $item->overThreeOdds;
                                                } ?>
                                            @elseif($keys == 'ssingles')
                                                <?php if (isset($item->superSingleOdds)) {
                                                    $yyOdds = $yyOdds * $item->superSingleOdds;
                                                } ?>
                                            @elseif($keys == 'sure5')
                                                <?php if (isset($item->sure5OddsOdds)) {
                                                    $yyOdds = $yyOdds * $item->sure5OddsOdds;
                                                } ?>
                                            @elseif($keys == 'fifty')
                                                <?php if (isset($item->fiftyPlusOdds)) {
                                                    $yyOdds = $yyOdds * $item->fiftyPlusOdds;
                                                } ?>
                                            @elseif($keys == 'wt')
                                                <?php if (isset($item->weekendOdds)) {
                                                    $yyOdds = $yyOdds * $item->weekendOdds;
                                                } ?>
                                            @elseif($keys == 'ht')
                                                <?php if (isset($item->HTFTOdds)) {
                                                    $yyOdds = $yyOdds * $item->HTFTOdds;
                                                } ?>
                                            @elseif($keys == 'suInTip')
                                                <?php if (isset($item->superInvestmentOdds)) {
                                                    $yyOdds = $yyOdds * $item->superInvestmentOdds;
                                                } ?>
                                            @elseif($keys == 'jackpot')
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                                <?php if (isset($item->jackpotOdds)) {
                                                    $yyOdds = $yyOdds * $item->jackpotOdds;
                                                } ?>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                                @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 text-center">
                                                <h5 class="text-success"> Total Odds:
                                                    <strong>{{ number_format($yyOdds, 2) }}</strong>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <span>
                                    <center>
                                        <h4 class="alert alert-warning">OOPS! NO GAME WAS HERE</h4>
                                    </center>
                                </span>
                            @endif
                            {{-- @if (isset($cy2))
                                <hr>
                                <h4 class="alert alert-success text-center">
                                    Code: <strong>{{ $cy2->bookingCode }} - ({{ $cy2->bookMaker }})</strong>
                                </h4>
                            @endif --}}
                        @endif
                    </section>
                    <section>
                        <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET ONE</span></h4>
                        @if (count($tt) > 0)
                            <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;" width="100%"
                                class="table table-striped myTableSmall">
                                <thead
                                    style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                    <tr>
                                        <td style="width: 8%;">Time</td>
                                        <td style="width: 8%;">League</td>
                                        <td style="width: 64%;">Match</td>
                                        <td style="width: 9%;">Tip</td>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center!important;">
                                    <?php $ttOdds = 1; ?>
                                    @foreach ($tt as $key => $item)
                                        <tr style="height: 21px;">
                                            <td style="background-color: #ffffff;">
                                                <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                            </td>
                                            <td><span>{{ $item->league }}</span></td>
                                            <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                        style="color: #ff0000;"><strong>VS</strong></span>
                                                    {{ $item->teamTwo }}</span></td>
                                            @if ($keys == 'sure2')
                                                <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                            @elseif($keys == 'sure3')
                                                <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                            @elseif($keys == 'ov3')
                                                <td><span><strong>Ov3.5</strong></span></td>
                                            @elseif($keys == 'ssingles')
                                                <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                            @elseif($keys == 'sure5')
                                                <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                            @elseif($keys == 'fifty')
                                                <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                            @elseif($keys == 'wt')
                                                <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                            @elseif($keys == 'ht')
                                                <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                            @elseif($keys == 'suInTip')
                                                <td><span><strong>{{ $item->superInvestmentTip }}</strong></span></td>
                                            @elseif($keys == 'jackpot')
                                                <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            @endif
                                        </tr>
                                        @if ($keys == 'sure2')
                                            <?php if (isset($item->sure2OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure2OddsOdds;
                                            } ?>
                                        @elseif($keys == 'sure3')
                                            <?php if (isset($item->sure3OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure3OddsOdds;
                                            } ?>
                                        @elseif($keys == 'ov3')
                                            <?php if (isset($item->overThreeOdds)) {
                                                $ttOdds = $ttOdds * $item->overThreeOdds;
                                            } ?>
                                        @elseif($keys == 'ssingles')
                                            <?php if (isset($item->superSingleOdds)) {
                                                $ttOdds = $ttOdds * $item->superSingleOdds;
                                            } ?>
                                        @elseif($keys == 'sure5')
                                            <?php if (isset($item->sure5OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure5OddsOdds;
                                            } ?>
                                        @elseif($keys == 'fifty')
                                            <?php if (isset($item->fiftyPlusOdds)) {
                                                $ttOdds = $ttOdds * $item->fiftyPlusOdds;
                                            } ?>
                                        @elseif($keys == 'wt')
                                            <?php if (isset($item->weekendOdds)) {
                                                $yyOdds = $ttOdds * $item->weekendOdds;
                                            } ?>
                                        @elseif($keys == 'ht')
                                            <?php if (isset($item->HTFTOdds)) {
                                                $ttOdds = $ttOdds * $item->HTFTOdds;
                                            } ?>
                                        @elseif($keys == 'suInTip')
                                            {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            <?php if (isset($item->superInvestmentOdds)) {
                                                $ttOdds = $ttOdds * $item->superInvestmentOdds;
                                            } ?>
                                        @elseif($keys == 'jackpot')
                                            {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            <?php if (isset($item->jackpotOdds)) {
                                                $ttOdds = $ttOdds * $item->jackpotOdds;
                                            } ?>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12 text-center">
                                            <h5 class="text-success"> Total Odds:
                                                <strong>{{ number_format($ttOdds, 2) }}</strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <span>
                                <center>
                                    <h4 class="alert alert-warning">
                                        @if ($keys == 'wt' || $keys == 'fifty')
                                            <span class="text-uppercase">Games under this category is available only on
                                                weekends
                                                (Saturdays & Sundays)</span>
                                        @else
                                            @if (gameThereIs())
                                                OOPS, NO GAMES ON THIS CATEGORY FOR TODAY!
                                            @else
                                                OUR EXPERTS ARE STILL WORKING ON TIPS. PLEASE CHECK BACK!
                                            @endif
                                        @endif
                                    </h4>
                                </center>
                            </span>
                        @endif
                        {{-- @if (isset($ct))
                            <hr>
                            <h4 class="alert alert-success text-center">
                                Code: <strong>{{ $ct->bookingCode }} - ({{ $ct->bookMaker }})</strong>
                            </h4>
                        @endif --}}

                        @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'fifty' || $keys == 'ht' || $keys == 'wt')
                        @else
                            <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET TWO</span></h4>
                            @if (count($tt2) > 0)
                                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                                    width="100%" class="table table-striped myTableSmall">
                                    <thead
                                        style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                        <tr>
                                            <td style="width: 8%;">Time</td>
                                            <td style="width: 8%;">League</td>
                                            <td style="width: 64%;">Match</td>
                                            <td style="width: 9%;">Tip</td>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center!important;">
                                        <?php $ttOdds = 1; ?>
                                        @foreach ($tt2 as $key => $item)
                                            <tr style="height: 21px;">
                                                <td style="background-color: #ffffff;">
                                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                                </td>
                                                <td><span>{{ $item->league }}</span></td>
                                                <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                            style="color: #ff0000;"><strong>VS</strong></span>
                                                        {{ $item->teamTwo }}</span></td>
                                                @if ($keys == 'sure2')
                                                    <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                                @elseif($keys == 'sure3')
                                                    <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                                @elseif($keys == 'ov3')
                                                    <td><span><strong>Ov3.5</strong></span></td>
                                                @elseif($keys == 'ssingles')
                                                    <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                                @elseif($keys == 'sure5')
                                                    <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                                @elseif($keys == 'fifty')
                                                    <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                                @elseif($keys == 'wt')
                                                    <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                                @elseif($keys == 'ht')
                                                    <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                                @elseif($keys == 'suInTip')
                                                    <td><span><strong>{{ $item->superInvestmentTip }}</strong></span>
                                                    </td>
                                                    {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                                @elseif($keys == 'jackpot')
                                                    <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                                @endif
                                            </tr>
                                            @if ($keys == 'sure2')
                                                <?php if (isset($item->sure2OddsOdds)) {
                                                    $ttOdds = $ttOdds * $item->sure2OddsOdds;
                                                } ?>
                                            @elseif($keys == 'sure3')
                                                <?php if (isset($item->sure3OddsOdds)) {
                                                    $ttOdds = $ttOdds * $item->sure3OddsOdds;
                                                } ?>
                                            @elseif($keys == 'ov3')
                                                <?php if (isset($item->overThreeOdds)) {
                                                    $ttOdds = $ttOdds * $item->overThreeOdds;
                                                } ?>
                                            @elseif($keys == 'ssingles')
                                                <?php if (isset($item->superSingleOdds)) {
                                                    $ttOdds = $ttOdds * $item->superSingleOdds;
                                                } ?>
                                            @elseif($keys == 'sure5')
                                                <?php if (isset($item->sure5OddsOdds)) {
                                                    $ttOdds = $ttOdds * $item->sure5OddsOdds;
                                                } ?>
                                            @elseif($keys == 'fifty')
                                                <?php if (isset($item->fiftyPlusOdds)) {
                                                    $ttOdds = $ttOdds * $item->fiftyPlusOdds;
                                                } ?>
                                            @elseif($keys == 'wt')
                                                <?php if (isset($item->weekendOdds)) {
                                                    $yyOdds = $ttOdds * $item->weekendOdds;
                                                } ?>
                                            @elseif($keys == 'ht')
                                                <?php if (isset($item->HTFTOdds)) {
                                                    $ttOdds = $ttOdds * $item->HTFTOdds;
                                                } ?>
                                            @elseif($keys == 'suInTip')
                                                <?php if (isset($item->superInvestmentOdds)) {
                                                    $ttOdds = $ttOdds * $item->superInvestmentOdds;
                                                } ?>
                                            @elseif($keys == 'jackpot')
                                                <?php if (isset($item->jackpotOdds)) {
                                                    $ttOdds = $ttOdds * $item->jackpotOdds;
                                                } ?>
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                                @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 text-center">
                                                <h5 class="text-success"> Total Odds:
                                                    <strong>{{ number_format($ttOdds, 2) }}</strong>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <span>
                                    <center>
                                        <h4 class="alert alert-warning">
                                            @if ($keys == 'wt' || $keys == 'fifty')
                                                <span class="text-uppercase">Games under this category is available only on
                                                    weekends (Saturdays & Sundays)</span>
                                            @else
                                                @if (gameThereIs())
                                                    OOPS, NO GAMES ON THIS CATEGORY FOR TODAY!
                                                @else
                                                    OUR EXPERTS ARE STILL WORKING ON TIPS. PLEASE CHECK BACK!
                                                @endif
                                            @endif
                                        </h4>
                                    </center>
                                </span>
                            @endif
                            {{-- @if (isset($ct2))
                                <hr>
                                <h4 class="alert alert-success text-center">
                                    Code: <strong>{{ $ct2->bookingCode }} - ({{ $ct2->bookMaker }})</strong>
                                </h4>
                            @endif --}}
                        @endif
                    </section>
                    <section>
                        <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET ONE</span></h4>
                        @if (count($tm) > 0)
                            <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;" width="100%"
                                class="table table-striped myTableSmall">
                                <thead
                                    style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                    <tr>
                                        <td style="width: 8%;">Time</td>
                                        <td style="width: 8%;">League</td>
                                        <td style="width: 64%;">Match</td>
                                        <td style="width: 9%;">Tip</td>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center!important;">
                                    <?php $tmOdds = 1; ?>
                                    @foreach ($tm as $key => $item)
                                        <tr style="height: 21px;">
                                            <td style="background-color: #ffffff;">
                                                <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                            </td>
                                            <td><span>{{ $item->league }}</span></td>
                                            <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                        style="color: #ff0000;"><strong>VS</strong></span>
                                                    {{ $item->teamTwo }}</span></td>
                                            @if ($keys == 'sure2')
                                                <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                            @elseif($keys == 'sure3')
                                                <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                            @elseif($keys == 'ov3')
                                                <td><span><strong>Ov3.5</strong></span></td>
                                            @elseif($keys == 'ssingles')
                                                <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                            @elseif($keys == 'sure5')
                                                <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                            @elseif($keys == 'fifty')
                                                <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                            @elseif($keys == 'wt')
                                                <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                            @elseif($keys == 'ht')
                                                <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                            @elseif($keys == 'suInTip')
                                                <td><span><strong>{{ $item->superInvestmentTip }}</strong></span></td>
                                            @elseif($keys == 'jackpot')
                                                <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            @endif
                                        </tr>
                                        @if ($keys == 'sure2')
                                            <?php if (isset($item->sure2OddsOdds)) {
                                                $tmOdds = $tmOdds * $item->sure2OddsOdds;
                                            } ?>
                                        @elseif($keys == 'sure3')
                                            <?php if (isset($item->sure3OddsOdds)) {
                                                $tmOdds = $tmOdds * $item->sure3OddsOdds;
                                            } ?>
                                        @elseif($keys == 'ov3')
                                            <?php if (isset($item->overThreeOdds)) {
                                                $tmOdds = $tmOdds * $item->overThreeOdds;
                                            } ?>
                                        @elseif($keys == 'ssingles')
                                            <?php if (isset($item->superSingleOdds)) {
                                                $tmOdds = $tmOdds * $item->superSingleOdds;
                                            } ?>
                                        @elseif($keys == 'sure5')
                                            <?php if (isset($item->sure5OddsOdds)) {
                                                $tmOdds = $tmOdds * $item->sure5OddsOdds;
                                            } ?>
                                        @elseif($keys == 'fifty')
                                            <?php if (isset($item->fiftyPlusOdds)) {
                                                $tmOdds = $tmOdds * $item->fiftyPlusOdds;
                                            } ?>
                                        @elseif($keys == 'wt')
                                            <?php if (isset($item->weekendOdds)) {
                                                $tmOdds = $tmOdds * $item->weekendOdds;
                                            } ?>
                                        @elseif($keys == 'ht')
                                            <?php if (isset($item->HTFTOdds)) {
                                                $tmOdds = $tmOdds * $item->HTFTOdds;
                                            } ?>
                                        @elseif($keys == 'suInTip')
                                            <?php if (isset($item->superInvestmentOdds)) {
                                                $tmOdds = $tmOdds * $item->superInvestmentOdds;
                                            } ?>
                                        @elseif($keys == 'jackpot')
                                            <?php if (isset($item->jackpotOdds)) {
                                                $tmOdds = $tmOdds * $item->jackpotOdds;
                                            } ?>
                                            {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12 text-center">
                                            <h5 class="text-success"> Total Odds:
                                                <strong>{{ number_format($tmOdds, 2) }}</strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <span>
                                <center>
                                    <h4 class="alert alert-warning">WE ARE YET TO ADD GAMES FOR TOMORROW. PLEASE CHECK BACK!
                                    </h4>
                                </center>
                            </span>
                        @endif
                        {{-- @if (isset($ctm))
                            <hr>
                            <h4 class="alert alert-success text-center">
                                Code: <strong>{{ $ctm->bookingCode }} - ({{ $ctm->bookMaker }})</strong>
                            </h4>
                        @endif --}}

                        @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'fifty' || $keys == 'ht' || $keys == 'wt')
                        @else
                            <h4 class="alert alert-warning text-center" style="margin-bottom: 0px;"><span class="text-danger">SET TWO</span></h4>
                            @if (count($tm2) > 0)
                                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                                    width="100%" class="table table-striped myTableSmall">
                                    <thead
                                        style="text-align: center!important; color: whitesmoke; background-color: #7B241C!important;">
                                        <tr>
                                            <td style="width: 8%;">Time</td>
                                            <td style="width: 8%;">League</td>
                                            <td style="width: 64%;">Match</td>
                                            <td style="width: 9%;">Tip</td>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center!important;">
                                        <?php $tmOdds = 1; ?>
                                        @foreach ($tm2 as $key => $item)
                                            <tr style="height: 21px;">
                                                <td style="background-color: #ffffff;">
                                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                                </td>
                                                <td><span>{{ $item->league }}</span></td>
                                                <td style="background-color: #ffffff;"><span>{{ $item->teamOne }} <span
                                                            style="color: #ff0000;"><strong>VS</strong></span>
                                                        {{ $item->teamTwo }}</span></td>
                                                @if ($keys == 'sure2')
                                                    <td><span><strong>{{ $item->sure2OddsTip }}</strong></span></td>
                                                @elseif($keys == 'sure3')
                                                    <td><span><strong>{{ $item->sure3OddsTip }}</strong></span></td>
                                                @elseif($keys == 'ov3')
                                                    <td><span><strong>Ov3.5</strong></span></td>
                                                @elseif($keys == 'ssingles')
                                                    <td><span><strong>{{ $item->superSingleTip }}</strong></span></td>
                                                @elseif($keys == 'sure5')
                                                    <td><span><strong>{{ $item->sure5OddsTip }}</strong></span></td>
                                                @elseif($keys == 'fifty')
                                                    <td><span><strong>{{ $item->fiftyPlusTip }}</strong></span></td>
                                                @elseif($keys == 'wt')
                                                    <td><span><strong>{{ $item->weekendTip }}</strong></span></td>
                                                @elseif($keys == 'ht')
                                                    <td><span><strong>{{ $item->HTFT }}</strong></span></td>
                                                @elseif($keys == 'suInTip')
                                                    <td><span><strong>{{ $item->superInvestmentTip }}</strong></span>
                                                    </td>
                                                @elseif($keys == 'jackpot')
                                                    <td><span><strong>{{ $item->jackpotTips }}</strong></span></td>
                                                    {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                                @endif
                                            </tr>
                                            @if ($keys == 'sure2')
                                                <?php if (isset($item->sure2OddsOdds)) {
                                                    $tmOdds = $tmOdds * $item->sure2OddsOdds;
                                                } ?>
                                            @elseif($keys == 'sure3')
                                                <?php if (isset($item->sure3OddsOdds)) {
                                                    $tmOdds = $tmOdds * $item->sure3OddsOdds;
                                                } ?>
                                            @elseif($keys == 'ov3')
                                                <?php if (isset($item->overThreeOdds)) {
                                                    $tmOdds = $tmOdds * $item->overThreeOdds;
                                                } ?>
                                            @elseif($keys == 'ssingles')
                                                <?php if (isset($item->superSingleOdds)) {
                                                    $tmOdds = $tmOdds * $item->superSingleOdds;
                                                } ?>
                                            @elseif($keys == 'sure5')
                                                <?php if (isset($item->sure5OddsOdds)) {
                                                    $tmOdds = $tmOdds * $item->sure5OddsOdds;
                                                } ?>
                                            @elseif($keys == 'fifty')
                                                <?php if (isset($item->fiftyPlusOdds)) {
                                                    $tmOdds = $tmOdds * $item->fiftyPlusOdds;
                                                } ?>
                                            @elseif($keys == 'wt')
                                                <?php if (isset($item->weekendOdds)) {
                                                    $tmOdds = $tmOdds * $item->weekendOdds;
                                                } ?>
                                            @elseif($keys == 'ht')
                                                <?php if (isset($item->HTFTOdds)) {
                                                    $tmOdds = $tmOdds * $item->HTFTOdds;
                                                } ?>
                                            @elseif($keys == 'suInTip')
                                                <?php if (isset($item->superInvestmentOdds)) {
                                                    $tmOdds = $tmOdds * $item->superInvestmentOdds;
                                                } ?>
                                                {{-- // `jackpot`, `jackpotTips`, `jackpotOdds` --}}
                                            @elseif($keys == 'jackpot')
                                                <?php if (isset($item->jackpotOdds)) {
                                                    $tmOdds = $tmOdds * $item->jackpotOdds;
                                                } ?>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($keys == 'ov3' || $keys == 'ssingles' || $keys == 'wt' || $keys == 'ht')
                                @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-12 text-center">
                                                <h5 class="text-success"> Total Odds:
                                                    <strong>{{ number_format($tmOdds, 2) }}</strong>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <span>
                                    <center>
                                        <h4 class="alert alert-warning">WE ARE YET TO ADD GAMES FOR TOMORROW. PLEASE CHECK
                                            BACK!
                                        </h4>
                                    </center>
                                </span>
                            @endif
                            {{-- @if ($ctm2)
                                <hr>
                                <h4 class="alert alert-success text-center">
                                    Code: <strong>{{ $ctm2->bookingCode }} - ({{ $ctm2->bookMaker }})</strong>
                                </h4>
                            @endif --}}
                        @endif
                    </section>
                </div>
            </div>
        </div>


    @endif



    <div class="container container-bg container-store-bg">



        @include('stores.store_list')

    </div>


    </div>



@endsection

@section('levelJS')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {

            $('#updateProfile').submit(function(e) {
                e.preventDefault();
                $('#updateBtn').prop('disabled', true).html("SAVING <i class='fa fa-spinner fa-spin'></i>");
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 1) {
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        if (data.status == 0) {
                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        }
                        if (data.status == 9) {

                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            setTimeout(window.location.href = data.post, 3000);
                        }

                    },
                    failure: function(e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        })(jQuery);
    </script>
@endsection
