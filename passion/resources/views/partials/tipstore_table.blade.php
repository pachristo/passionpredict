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

    <div class="content nopaddingsmall">
        <section>
            @if (count($yy) > 0)
                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                    width="100%" class="table table-striped myTableSmall">
                    <thead
                        style="text-align: center!important; color: whitesmoke; background-color: #111111!important;">
                        <tr>
                            <td style="width: 8%;">Time</td>
                            <td style="width: 8%;">League</td>
                            <td style="width: 67%;">Match</td>
                            <td style="width: 9%;">Tip</td>
                            <td style="width: 10%;">Score</td>


                        </tr>
                    </thead>
                    <tbody style="text-align: center!important;">
                        @foreach ($yy as $key => $item)
                            <tr style="height: 21px;">
                                <td >
                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                </td>
                                <td><span>{{ $item->league }}</span></td>
                                <td ><span>{{ $item->teamOne }} <span
                                            style="color: #ff0000;"><strong>VS</strong></span>
                                        {{ $item->teamTwo }}</span></td>
                                <td><span>
                                        <strong>
                                            @if ($keys == 'ov15')
                                                {{ $item->oneFiveGoals }}
                                            @elseif($keys == 'dc')
                                                {{ $item->doubleChance }}
                                            @elseif($keys == 'ou25')
                                                {{ $item->twoFiveGoals }}
                                            @elseif($keys == 'ou05HT')
                                                {{ $item->overZeroFiveHT }}

                                                @elseif($keys == 'hwin')
                                                {{ $item->hwin }}
                                                @elseif($keys == 'hweh' ||$keys == 'aweh')
                                                {{ $item->weh }}
                                            @elseif($keys == 'btts')
                                                {{ $item->BTTS }}
                                            @elseif($keys == 'draws')
                                                {{ $item->draws }}
                                            @elseif($keys == 'hand')
                                                {{ $item->handicap }}
                                            @elseif($keys == 'dnb')
                                                {{ $item->drawNoBet }}
                                            @elseif($keys == 'banker')
                                                {{ $item->bankerOfTheDay }}
                                            @elseif($item == '05ht')
                                                {{ $item->overZeroFiveHT }}
                                            @elseif($item == '35g')
                                                {{ $item->threeFiveGoals }}
                                            @endif
                                        </strong>
                                    </span>
                                </td>
                                <td >{{ $item->teamOneScore }}
                                    @if ($item->teamOneScore != 'pstp')
                                        :
                                    @endif{{ $item->teamTwoScore }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span>
                    <center>
                        <h4 class="alert alert-warning">OOPS! NO GAME WAS HERE</h4>
                    </center>
                </span>
            @endif
        </section>
        <section>
            @if (count($tt) > 0)
                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                    width="100%" class="table table-striped myTableSmall">
                    <thead
                        style="text-align: center!important; color: whitesmoke; background-color: #111111!important;">
                        <tr>
                            <td style="width: 8%;">Time</td>
                            <td style="width: 8%;">League</td>
                            <td style="width: 60%;">Match</td>
                            <td style="width: 21%;">Tip</td>


                        </tr>
                    </thead>
                    <tbody style="text-align: center!important;">
                        @foreach ($tt as $key => $item)
                            <tr style="height: 21px;">
                                <td >
                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                </td>
                                <td><span>{{ $item->league }}</span></td>
                                <td ><span>{{ $item->teamOne }} <span
                                            style="color: #ff0000;"><strong>VS</strong></span>
                                        {{ $item->teamTwo }}</span></td>
                                <td><span>
                                        <strong>
                                            @if ($keys == 'ov15')
                                                {{ $item->oneFiveGoals }}
                                            @elseif($keys == 'dc')
                                                {{ $item->doubleChance }}
                                            @elseif($keys == 'ou25')
                                                {{ $item->twoFiveGoals }}
                                                @elseif($keys == 'hwin')
                                                {{ $item->hwin }}
                                                @elseif($keys == 'hweh' ||$keys == 'aweh')
                                                {{ $item->weh }}
                                            @elseif($keys == 'ou05HT')
                                                {{ $item->overZeroFiveHT }}
                                            @elseif($keys == 'btts')
                                                {{ $item->BTTS }}
                                            @elseif($keys == 'draws')
                                                {{ $item->draws }}
                                            @elseif($keys == 'hand')
                                                {{ $item->handicap }}
                                            @elseif($keys == 'dnb')
                                                {{ $item->drawNoBet }}
                                            @elseif($keys == 'banker')
                                                {{ $item->bankerOfTheDay }}
                                            @elseif($item == '05ht')
                                                {{ $item->overZeroFiveHT }}
                                            @elseif($item == '35g')
                                                {{ $item->threeFiveGoals }}
                                            @endif
                                        </strong>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span>
                    <center>
                        <h4 class="alert alert-warning">

                            OOPS, NO FREE GAMES IN THIS AREA TODAY!

                        </h4>
                    </center>
                </span>
            @endif

        </section>
        <section>
            @if (count($tm) > 0)
                <table style="background-color: #F4F6F6; border-color: #ffffff; font-size: 13px;"
                    width="100%" class="table table-striped myTableSmall">
                    <thead
                        style="text-align: center!important; color: whitesmoke; background-color: #111111!important;">
                        <tr>
                            <td style="width: 8%;">Time</td>
                            <td style="width: 8%;">League</td>
                            <td style="width: 60%;">Match</td>
                            <td style="width: 21%;">Tip</td>

                        </tr>
                    </thead>
                    <tbody style="text-align: center!important;">
                        @foreach ($tm as $key => $item)
                            <tr style="height: 21px;">
                                <td >
                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                </td>
                                <td><span>{{ $item->league }}</span></td>
                                <td><span>{{ $item->teamOne }} <span
                                            style="color: #ff0000;"><strong>VS</strong></span>
                                        {{ $item->teamTwo }}</span></td>
                                <td><span>
                                        <strong>
                                            @if ($keys == 'ov15')
                                                {{ $item->oneFiveGoals }}
                                            @elseif($keys == 'dc')
                                                {{ $item->doubleChance }}
                                            @elseif($keys == 'ou25')
                                                {{ $item->twoFiveGoals }}
                                                @elseif($keys == 'hwin')
                                                {{ $item->hwin }}
                                                @elseif($keys == 'hweh' ||$keys == 'aweh')
                                                {{ $item->weh }}
                                            @elseif($keys == 'ou05HT')
                                                {{ $item->overZeroFiveHT }}
                                            @elseif($keys == 'btts')
                                                {{ $item->BTTS }}
                                            @elseif($keys == 'draws')
                                                {{ $item->draws }}
                                            @elseif($keys == 'hand')
                                                {{ $item->handicap }}
                                            @elseif($keys == 'dnb')
                                                {{ $item->drawNoBet }}
                                            @elseif($keys == 'banker')
                                                {{ $item->bankerOfTheDay }}
                                            @elseif($item == '05ht')
                                                {{ $item->overZeroFiveHT }}
                                            @elseif($item == '35g')
                                                {{ $item->threeFiveGoals }}
                                            @endif
                                        </strong>
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <span>
                    <center>
                        <h4 class="alert alert-warning">WE ARE YET TO ADD GAMES FOR TOMORROW. PLEASE
                            CHECK BACK!</h4>
                    </center>
                </span>
            @endif


        </section>


    </div>
</div>
