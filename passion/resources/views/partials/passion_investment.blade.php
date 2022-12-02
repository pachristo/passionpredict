<div class="col-12 mt-3  investment-bar px-0">
    <div class="row mx-0 justify-content-center">

        <div class="col-sm-12 investment-bar-first text-center winning-tap"
            style="padding: 17px;color: white!important;   ">


            <h2><strong class="to-begin-time pb-1 mb-1 text-white">Don't Gamble, INVEST!!!
            </strong></h2>
            <p><span clas="text-white" style="color:white!important;"><span class="text-white">
                Join INVESTMENT SCHEME!!!, Invest and make profit 🤑 steadily. Have Access to Sure 2 Odds within the range of 1.50 To 2.00 Odds Daily.

                </span>
                </span></p>

            <div class="text-center mt-3">
                <a href="{{ route('/pricing') }}" class=" btn-join p-2 btn text-white">
                    <strong class="blink_me">
                        Join Now!
                    </strong>
                </a>
            </div>


        </div>
        <style>
            .timer li {
                display: inline-block;
                font-size: 1.0em;
                list-style-type: none;
                padding: 0.5em;
                text-transform: uppercase;
            }

            .timer li span {
                display: block;
                font-size: 3.5rem;
            }

            #timerdemo div {
                background: gray;
                border-radius: 79px;
            }
        </style>
        <div class="col-sm-12     bg-dark" style="padding: 17px;padding-left: 3px;    padding-right: 8px;">
            <div class="text-center">
                <h3><strong class="to-begin-time pb-1 mb-1 text-white">INVESTMENT RESULT</strong></h3>
            </div>

            {{-- <div class="row justify-content-center  mx-0" style="margin:0px!important;">


                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Fri
                        <br> 28/10</span> <br>


                    <i class="fa fa-check-circle fa-2x text-success"></i>




                </div>
                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Sat
                        <br> 29/10</span> <br>


                    <i class="fa fa-check-circle fa-2x text-success"></i>




                </div>
                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Sun
                        <br> 30/10</span> <br>

                    <i class="fas fa-minus-circle fa-2x"></i>






                </div>
                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Mon
                        <br> 31/10</span> <br>

                    <i class="fas fa-minus-circle fa-2x"></i>






                </div>
                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Tue
                        <br> 01/11</span> <br>

                    <i class="fas fa-minus-circle fa-2x"></i>






                </div>
                <div class="col-2 text-center text-white">
                    <span style="font-size: 13px; font-weight: bold">Wed
                        <br> 02/11</span> <br>


                    <i class="fa fa-check-circle fa-2x text-success"></i>




                </div>



            </div> --}}
            <div class="row " style="margin:0px!important;">

                @for ($i =6 ; $i >=1 ; $i--)

                <div class="col-2 text-white text-center">
                    <span
                    style="font-size: 13px; font-weight: bold">{{ \Carbon\Carbon::today()->subDay($i)->format('D') }}
                        <br> {{ \Carbon\Carbon::today()->subDay($i)->format('d/m') }}</span> <br>
                    <?php
                    $second = \App\Solos\Modules\Prediction\Model\Prediction::where('gameType', '1')
                        ->where('superInvestment', 'Yes')
                        ->where(
                            'gameDate',
                            \Carbon\Carbon::today()
                                ->subDay($i)
                                ->format('d-m-Y')
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
                @endfor




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



    </div>
</div>
