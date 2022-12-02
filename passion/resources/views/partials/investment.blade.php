<div class="container inupcoming-section " style="background:#07162f; background-size: cover;padding:0px;    background-size: cover;
padding: 0px;
background-position: bottom; ">
    <div class="">
        <div class="container-fluid text-white" style=" padding: 0px;">
            <div class="col-sm-12 " style="    border-radius: 0px;
                                                background-color: #061e46;
                                                margin-bottom: 0px;
                                                height: 100%;
                                                width: 100%;
                                                color: whitesmoke;
                                                text-align: center;
                                                padding: 17px 5px;">
                                                
                {{-- <div class="container-fluid" style="background-color: #171d27;"> --}}
                <div class="row">
                    <div class="col-sm-12 nopaddingsmall">
                        <div class="row">
                            <div class="col-sm-4 mt-1 text-center nopaddingsmall">
                                <h5><strong style="color:white;">Ready TO <span class="text-warning">INVEST</span>
                                    </strong></h5>
                                <p>The investment scheme is recommended for serious bettors who believe in the smart way
                                    of making profit steadily. In this scheme, we provide odds within the range of
                                    <strong> 1.50 - 2.00 odds</strong> daily.

                                </p>
                                <a href="{{ route('/pricing') }}" class="btn btn-danger">
                                    Join Here <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </a>

                            </div>

                            <div class="col-sm-4 text-center mt-1 nopaddingsmall">
                                <br class="hideLG">

                                <h3 class="p-2 text-white" style="    border-bottom: 2px dotted green;
                                         margin-bottom: 13px;"><strong> INVESTMENT RESULTS
                                    </strong></h3>

                                <div class="row " style="margin:0px!important;">


                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(6)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(6)->format('d') }}</span> <br>
                                        <?php
                                        $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(6)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first();
                                        ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(5)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(5)->format('d') }}</span> <br>
                                        <?php $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(5)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first(); ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(4)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(4)->format('d') }}</span> <br>
                                        <?php $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(4)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first(); ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(3)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(3)->format('d') }}</span> <br>
                                        <?php $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(3)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first(); ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(2)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(2)->format('d') }}</span> <br>
                                        <?php $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(2)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first(); ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <span
                                            style="font-size: 17px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay(1)->format('D') }}
                                            <br> {{ \Carbon\Carbon::today()->subDay(1)->format('d') }}</span> <br>
                                        <?php $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where(
                                                'gameDate',
                                                \Carbon\Carbon::today()
                                                    ->subDay(1)
                                                    ->format('d-m-Y'),
                                            )
                                            ->first(); ?>
                                        @if (isset($second) && $second->moreOption != '')
                                            @if ($second->moreOption == '1')
                                                <i class="fa fa-check-circle fa-2x text-success"></i>
                                            @elseif($second->moreOption == '2')
                                                <i class="fa fa-times-circle fa-2x text-danger"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-circle-o fa-2x"></i>
                                        @endif
                                    </div>


                                    <?php $first = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                        ->where('superInvestment', 'Yes')
                                        ->where('gameDate', \Carbon\Carbon::today()->format('d-m-Y'))
                                        ->first();
                                    
                                    $invfirst = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                        ->where('superInvestment', 'Yes')
                                        ->where('gameDate', \Carbon\Carbon::today()->format('d-m-Y'))
                                        ->get();
                                    $yyOdds = 1;
                                    
                                    foreach ($invfirst as $key => $item) {
                                        if (isset($item->superInvestmentOdds)) {
                                            $yyOdds = $yyOdds * $item->superInvestmentOdds;
                                        }
                                    }
                                    
                                    ?>


                                </div>
                            </div>
                            <style>
                                .timer li {
                                    display: inline-block;
                                    font-size: 0.8em;
                                    list-style-type: none;
                                    padding: 0.5em;
                                    text-transform: uppercase;
                                }

                                .timer li span {
                                    display: block;
                                    font-size: 1.3rem;
                                }

                            </style>

                            <div class="col-sm-4">
                                <br class="hideLG">

                                <div class="col-sm-12 "
                                    style="background-color: whitesmoke; border-radius: 7px; margin-top: 2px; color: black; padding-top: 8px; padding-bottom: 8px;">
                                    <h5 class="text-center "><strong>INVESTMENT TIPS </strong></h5>
                                    @if (isset($first))
                                        <center>
                                            <h6><strong><small>TOTAL ODDS:</small> <span class="text-success">
                                                        {{ number_format($yyOdds, 2) }}</span></strong></h6>
                                            <a href="{{ route('/super_investment_tip') }}"><button
                                                    class="btn btn-md btn-success"><i class="fa fa-eye"></i> VIEW
                                                    TIP</button></a>
                                        </center>
                                        <hr style="margin: 4px;">
                                        <?php $time = strtotime(
                                            \Carbon\Carbon::now()
                                                ->addHour('1')
                                                ->format('h:i A'),
                                        ); ?>
                                        <center>
                                            @if ($time >= strtotime($first->gameTime))
                                                <h3 class="alert alert-success" style="margin-bottom: -20px!important;">
                                                    Today's
                                                    Game Already Started!</h3>
                                            @else
                                                <div class="containerCT">
                                                    <h5 id="head" class="alert alert-success"><strong>Game
                                                            Starts</strong></h5>
                                                    <ul class="timer">
                                                        <li><span id="hours"></span>Hours</li>
                                                        <li><span id="minutes"></span>Minutes</li>
                                                        <li><span id="seconds"></span>Seconds</li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </center>
                                    @else
                                        <h6 class="alert alert-warning text-center">Today's Investment Tip is not yet
                                            available!
                                        </h6>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
