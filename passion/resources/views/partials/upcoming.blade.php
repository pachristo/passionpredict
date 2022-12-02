
                <div class="col-sm-12" style=" padding: 0px;">

                    <h3 class="black_bar">

                        Upcoming Tips
                    </h3>
                    <div class="col-sm-12 px-0 nopaddingsmall">
                        @if (count($inview) > 0)

                            <table class="table table-striped " width="100%">
                                <tbody style="text-align: center!important;">
                                    @foreach ($inview as $key => $item)
                                        <tr style="height: 21px;">
                                            <td style="width: 8%; height: 21px; text-align: left;">
                                                <span
                                                    style="color:black;">{{ \Carbon\Carbon::parse($item->gameDate)->format('d/m') }}</span>
                                            </td>
                                            <td style="width: 18%; height: 21px; text-align: center;">
                                                {{ $item->league }}</td>
                                            <td style="width: 55%; height: 21px; text-align: left ; ">
                                                <span style="color: black;">{{ $item->teamOne }} <span
                                                        class="match_vs">vs</span>
                                                    {{ $item->teamTwo }}</span>
                                            </td>
                                            <td style="width: 19%; height: 21px; text-align: center;">
                                                <span><strong>{{ $item->FTRecommendation }}</strong></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>
                                <center>
                                    <h4 class="alert alert-warning">UPCOMING GAMES ARE YET TO BE ADDED. PLEASE CHECK
                                        BACK!</h4>
                                </center>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-12 mt10">

                    <center>
                        <?php
                        $country = COUNTRYNAME;
                        $ad4 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_uct', $country);
                        
                        //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();
                        
                        ?>
                        <div class="">
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
                        $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('uct', $country);
                        //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                        ?>
                        <div class="">
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