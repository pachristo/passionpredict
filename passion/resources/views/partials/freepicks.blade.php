
    <br class="hideLG">



    <h5 class="black_bar">

        Today's football prediction
    </h5>

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
                @if (count($freeYesterday) > 0)
                    <table style="" width="100%" class="table table-striped myTableSmall">
                        <thead style="">
                            <tr>
                                {{-- <td style="width: 8%;">Time</td> --}}
                                <td style="width: 8%;">League</td>
                                <td style="width: 67%;">Match</td>
                                <td style="width: 9%;">Tip</td>
                                <td style="width: 10%;">Score</td>
                                <td style="width: 10%;"></td>

                            </tr>
                        </thead>
                        <tbody style="text-align: center!important;">
                            @foreach ($freeYesterday as $key => $item)
                                <tr style="height: 21px;">
                                    {{-- <td style="background-color: #ffffff;">
                                    <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                </td> --}}
                                    <td><span>{{ $item->league }}</span></td>
                                    <td style=""><span>{{ $item->teamOne }}
                                            <span style="color: #ff0000;"><strong>VS</strong></span>
                                            {{ $item->teamTwo }}</span></td>
                                    <td><span><strong>{{ $item->FTRecommendation }}</strong></span></td>
                                    <td><span><strong>{{ $item->teamOneScore }}@if (trim($item->teamOneScore) != 'pstp')
                                                    :
                                                @endif
                                                {{ $item->teamTwoScore }}</strong></span>
                                    </td>
                                    <td>
                                        @if ($item->FreePickStatus == '1')
                                            <span class="fa fa-check-circle text-success"></span>
                                        @elseif($item->FreePickStatus == '2')
                                            <span class="fa fa-times-circle text-danger" style="color:red;"></span>
                                        @elseif($item->FreePickStatus == '3')
                                            <span style="color:red">pstp</span>
                                        @else
                                            ?
                                        @endif
                                    </td>
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
                @if (count($freeToday) > 0)
                    <table style="" width="100%" class="table table-striped myTableSmall">
                        <thead>
                            <tr>
                                <td style="width: 8%;">Time</td>
                                <td style="width: 8%;">League</td>
                                <td style="width: 60%;">Match</td>
                                <td style="width: 21%;">Tip</td>
                                <td style="width: 10%">Result</td>

                            </tr>
                        </thead>

                        <tbody style="text-align: center!important;">
                            @foreach ($freeToday as $key => $item)
                                <tr style="height: 21px;">
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                    </td>
                                    <td><span>{{ $item->league }}</span></td>
                                    <td><span>{{ $item->teamOne }}
                                            <span style="color: #ff0000;"><strong>VS</strong></span>
                                            {{ $item->teamTwo }}</span></td>
                                    <td><span><strong>{{ $item->FTRecommendation }}</strong></span></td>
                                    <td>
                                        @if ($item->FreePickStatus == '1')
                                            <span class="fa fa-check-circle text-success"></span>
                                        @elseif($item->FreePickStatus == '2')
                                            <span class="fa fa-times-circle text-danger" style="color:red;"></span>
                                        @elseif($item->FreePickStatus == '3')
                                            <span style="color:red">pstp</span>
                                        @else
                                            ?
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <span>
                        <center>
                            <h4 class="alert alert-warning">
                                @if (gameThereIs())
                                    OOPS, NO FREE GAMES IN THIS AREA TODAY!
                                @else
                                    OUR EXPERTS ARE STILL WORKING ON TIPS. PLEASE CHECK BACK!
                                @endif
                            </h4>
                        </center>
                    </span>
                @endif
                @if (isset($todayCode))
                    <hr>
                    <h4 class="alert alert-success text-center">
                        Booking: <strong>{{ $todayCode->bookingCode }} -
                            ({{ $todayCode->bookMaker }})</strong>
                    </h4>
                @endif
            </section>
            <section>
                @if (count($freeTomorrow) > 0)
                    <table style="" width="100%" class="table table-striped myTableSmall">
                        <thead style="">
                            <tr>
                                <td style="width: 8%;">Time</td>
                                <td style="width: 8%;">League</td>
                                <td style="width: 60%;">Match</td>
                                <td style="width: 21%;">Tip</td>

                            </tr>
                        </thead>
                        <tbody style="text-align: center!important;">
                            @foreach ($freeTomorrow as $key => $item)
                                <tr style="height: 21px;">
                                    <td>
                                        <span>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}</span>
                                    </td>
                                    <td><span>{{ $item->league }}</span></td>
                                    <td><span>{{ $item->teamOne }}
                                            <span style="color: #ff0000;"><strong>VS</strong></span>
                                            {{ $item->teamTwo }}</span></td>
                                    <td><span><strong>{{ $item->FTRecommendation }}</strong></span></td>
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

                @if (isset($tomorrowCode))
                    <hr>
                    <h4 class="alert alert-success text-center">
                        Booking: <strong>{{ $tomorrowCode->bookingCode }} -
                            ({{ $tomorrowCode->bookMaker }})</strong>
                    </h4>
                @endif
            </section>


        </div>
    </div>

    <br class="hideLG">

