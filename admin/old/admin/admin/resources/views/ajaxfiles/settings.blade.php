    <form action="{{ route('/ajaxGameUpdate') }}/{{ $game->id }}/{{ $datain }}" method="POST"
        id="updateForm">
        <div class="container-fluid">
            <div class="col-xs-12">
                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *"
                            value="{{ $game->teamOne }}" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamOneForm" placeholder="eg. WWWLD" class="form-control"
                            value="{{ $game->teamOneForm }}" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamOneOdds" placeholder="eg. 1.5" class="form-control"
                            value="{{ $game->teamOneOdds }}">
                    </div>
                </div>

                <div class="col-md-2 col-xs-12"
                    style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;">
                    <center><span
                            style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span>
                    </center>
                    <br>
                    {{-- <div class="form-group"> --}}
                    {{-- <input class="form-control" name="drawOdd" type="text" value="{{$game->drawOdd}}" placeholder="DRAW ODD"> --}}
                    {{-- </div> --}}
                    <div class="form-group">
                        <input class="form-control" name="gameDate" id="matchdate" type="text"
                            placeholder="MATCH DATE *" value="{{ $game->gameDate }}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="gameTime" id="matchtime" type="text"
                            placeholder="MATCH TIME *" value="{{ $game->gameTime }}" required>
                    </div>
                    <div class="form-group">
                        <select name="league" class="form-control select2" required>
                            @php
                                $allleagues = \DB::table('leagues')
                                    ->latest('created_at')
                                    ->get();
                            @endphp
                            @foreach ($allleagues as $key => $leagues)
                                <option value="{{ $leagues->code }}"
                                    @if ($game->league == $leagues->code) selected @endif>
                                    {{ $leagues->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamTwo" class="form-control" placeholder="TEAM TWO *"
                            value="{{ $game->teamTwo }}" required>
                    </div>

                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamTwoForm" placeholder="eg. WWWLD" class="form-control"
                            value="{{ $game->teamTwoForm }}" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamTwoOdds" placeholder="eg. 1.5" class="form-control"
                            value="{{ $game->teamTwoOdds }}">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="form-group col-md-4">
                <label>FREE EXPERT TIPS</label>
                <select name="freePick" class="form-control">
                    <option value="Yes" @if ($game->freePick == 'Yes') selected @endif>Yes</option>
                    <option value="No" @if ($game->freePick == 'No') selected @endif>No</option>
                </select>
                <small class="text-danger">If YES, this game will show on homepage under Free Punter's Picks</small>
            </div>

            <div class="form-group col-md-4">
                <label>UPCOMING PICKS?</label>
                <select name="upcomingGame" class="form-control">
                    <option value="Yes" @if ($game->upcomingGame == 'Yes') selected @endif>Yes</option>
                    <option value="No" @if ($game->upcomingGame == 'No') selected @endif>No</option>
                </select>
                <small class="text-danger">If YES, this game will show on homepage under Upcoming Games</small>
            </div>

            <div class="form-group col-md-4">
                <label>FULL TIME RECOMMENDATION</label>
                <input type="text" name="FTRecommendation" class="form-control"
                    value="{{ $game->FTRecommendation }}">
                <small class="text-danger">Value here will show for Free Pick & Upcoming Game on homepage</small>
            </div>

            {{-- <div class="form-group col-md-4"> --}}
            {{-- <label>ACTUAL POINT/ODD</label> --}}
            {{-- <input type="text" name="actualPoint" class="form-control" value="{{$game->actualPoint}}"> --}}
            {{-- </div> --}}

            <div class="form-group col-md-4">
                <label>DOUBLE CHANCE</label>
                <select name="doubleChance" class="form-control">
                    <option value="" @if ($game->doubleChance == '') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
                    <option value="1X" @if ($game->doubleChance == '1X') selected @endif>1X</option>
                    <option value="12" @if ($game->doubleChance == '12') selected @endif>12</option>
                    <option value="2X" @if ($game->doubleChance == '2X') selected @endif>2X</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>OVER 0.5 GOALS HT</label>
                <select name="overZeroFiveHT" class="form-control">
                    <option value="" @if ($game->overZeroFiveHT == '') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
                    <option value="Over 0.5" @if ($game->overZeroFiveHT == 'Over 0.5') selected @endif>Over 0.5</option>
                    <option value="Under 0.5" @if ($game->overZeroFiveHT == 'Under 0.5') selected @endif>Under 0.5</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>1.5 GOALS</label>
                <select name="oneFiveGoals" class="form-control">
                    <option value="" @if ($game->oneFiveGoals == '') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
                    <option value="Over 1.5" @if ($game->oneFiveGoals == 'Over 1.5') selected @endif>Over 1.5</option>
                    <option value="Under 1.5" @if ($game->oneFiveGoals == 'Under 1.5') selected @endif>Under 1.5</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>2.5 GOALS</label>
                <select name="twoFiveGoals" class="form-control">
                    <option value="" @if ($game->twoFiveGoals == '') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
                    <option value="Over 2.5" @if ($game->twoFiveGoals == 'Over 2.5') selected @endif>Over 2.5</option>
                    <option value="Under 2.5" @if ($game->twoFiveGoals == 'Under 2.5') selected @endif>Under 2.5</option>
                </select>
            </div>
         
            <div class="form-group col-md-4">
                <label>WIN EITHER HALF</label>
                <select name="weh" class="form-control">
                    <option value="AWEH" @if ($game->weh == 'AWEH') selected @endif>AWEH</option>
                    <option value="HWEH" @if ($game->weh == 'HWEH') selected @endif>HWEH</option>
                    <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Single Bet</label>
                <input type="text" name="singleBet" class="form-control" value="{{ $game->singlebet }}" placeholder="leave blank if nothing">
            </div>
            <div class="form-group col-md-4">
                <label>BTTS/GG</label>
                <select name="BTTS" class="form-control">
                    <option value="BTTS/GG" @if ($game->BTTS == 'BTTS/GG') selected @endif>BTTS/GG</option>
                    <option value="No" @if ($game->BTTS == 'No') selected @endif>No</option>
                </select>
            </div>
           
          
         

            <div class="form-group col-md-4">
                <label>DRAWS</label>
                <select name="draws" class="form-control">
                    <option value="X" @if ($game->draws == 'X') selected @endif>Yes</option>
                    <option value="" @if ($game->draws == '') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
                </select>
            </div>

        
            <div class="form-group col-md-4">
                <label>BANKER OF THE DAY</label>
                <input type="text" name="bankerOfTheDay" class="form-control" value="{{ $game->bankerOfTheDay }}"
                    placeholder="leave blank if nothing">
            </div>
            {{-- <div class="form-group col-md-4 bg-primary pb-2" 
                        style="    padding-bottom: 5px;
                         padding-top: 5px;">
                            <div class="col-sm-12">
                                <label>BASKETBALL PREDICTION</label>
                                <input type="text" name="basketball" value="{{ $game->basketball }}"
                                    class="form-control">
                            </div>
                        </div> --}}

            {!! csrf_field() !!}


            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12 ">
                        
                        {{-- <div class="form-group col-md-4 bg-primary">
                    <div class="col-sm-12">
                        <label>TENNIS PREDICTION</label>
                        <input type="text" name="tennis" value="{{$game->tennis}}" class="form-control">
                    </div>
                </div> --}}

                        {{-- <div class="form-group col-md-3 bg-primary">
                    <div class="col-sm-12">
                        <label>HANDBALL PREDICTION</label>
                        <input type="text" name="handball" value="{{$game->handball}}" class="form-control">
                    </div>
                </div> --}}

                        {{-- <div class="form-group col-md-3 bg-primary">
                    <div class="col-sm-12">
                        <label>ICE-HOCKEY PREDICTION</label>
                        <input type="text" name="ice_hockey" value="{{$game->ice_hockey}}" class="form-control">
                    </div>
                </div> --}}
                        {{-- <div class="form-group col-md-4 bg-primary">
                    <div class="col-sm-12">
                        <label>** BIG ODDS</label>
                        <input type="text" name="BigOdds" class="form-control" value="{{$game->BigOdds}}">
                    </div>
                </div> --}}
                    </div>
                </div>
            </div>

            <div id="settingstatus" class="col-xs-6"></div>
            <div class="form-group col-sm-12">
                <br>
                <button class="btn btn-md btn-success" name="submit" id="submitsetting">UPDATE PREDICTION</button>
            </div>

        </div>
    </form>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#updateForm').submit(function(e) {
                e.preventDefault();
                $('#submitsetting').prop('disabled', true).html("UPDATING PREDICTION");
                var url = $(this).attr('action');

                var dataString = $(this).serialize();
                console.log(dataString);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == 1) {
                            $('#submitsetting').prop('disabled', false).html(
                                "UPDATE PREDICTION");
                            swal(data.encounters, '', 'warning');
                        } else {
                            swal(data.encounters, '', 'success');
                            $('#updategame').modal('hide');
                        }
                    }
                });

            });
        });
    </script>
