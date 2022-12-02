
<form action="{{route('/addResult')}}" method="POST" id="addresultform">
    <div class="container-fluid">
        <div class="col-xs-12">
            <input type="hidden" name="id" value="{{$game->id}}">
            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <h1 class="text-center">{{$game->teamOne}}</h1><hr>

                <div class="form-group col-md-12 col-xs-12">
                    <label for="score1">SCORE/GOAL(S)</label>
                    <input type="text" name="score1" class="form-control"  value="{{$game->teamOneScore}}">
                </div>

            </div>

            <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;"><center><span style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span></center>
                <br>
                <div class="form-group">
                    <input class="form-control" name="matchdate" id="matchdate" type="text" placeholder="MATCH DATE" required value="{{$game->gameDate}}" disabled>
                </div>
                <div class="form-group">
                    <input class="form-control" name="matchtime" id="matchtime" type="text" placeholder="MATCH TIME" required value="{{$game->gameTime}}" disabled>
                </div>
            </div>

            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <h1 class="text-center">{{$game->teamTwo}}</h1><hr>

                <div class="form-group col-md-12 col-xs-12">
                    <label for="score2">SCORE/GOAL(S)</label>
                    <input type="number" name="score2" class="form-control" maxlength="5" min="0" value="{{$game->teamTwoScore}}">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <span class="text-danger">If the match is postponed, just type "<strong>pstp</strong>" in the home-team result box!</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-sm-12">
        <div class="form-group col-sm-6">
            <label>SELECT POTENTIAL PREDICTION</label>
            <select name="potential" class="form-control">
                <option value="">Select here...</option>
                @if($game->gameType=='1')
                    @if($game->sure2Odds!='No')<option value="{{$game->sure2OddsTip}}"  @if($game->testimonialValue==$game->sure2OddsTip) selected @endif><b>Sure 2 - 3Odds</b> : {{$game->sure2OddsTip}}</option> @endif
                    @if($game->sure2Odds!='No')<option value="{{$game->sure5OddsTip}}"  @if($game->testimonialValue==$game->sure5OddsTip) selected @endif><b>Sure 5 + Odds</b> : {{$game->sure5OddsTip}}</option> @endif
                    {{-- @if($game->sure3Odds!='No')<option value="{{$game->sure3OddsTip}}"   @if($game->testimonialValue==$game->sure3OddsTip) selected @endif><b>Sure 3 Odds</b> : {{$game->sure3OddsTip}}</option> @endif
                    @if($game->sure5Odds!='No')<option value="{{$game->sure5OddsTip}}"   @if($game->testimonialValue==$game->sure5OddsTip) selected @endif><b>Sure 5 Odds</b> : {{$game->sure5OddsTip}}</option> @endif
                    @if($game->overThree!='No')<option value="{{$game->overThree}}"   @if($game->testimonialValue=='Over 3.5') selected @endif><b>Over 3.5 Goals</b> : Yes</option> @endif --}}
                    {{-- @if($game->superSingle!='No')<option value="{{$game->superSingleTip}}"   @if($game->testimonialValue==$game->superSingleTip) selected @endif><b>Super Single</b> : {{$game->superSingleTip}}</option> @endif
                    @if($game->fiftyPlus!='No')<option value="{{$game->fiftyPlusTip}}"   @if($game->testimonialValue==$game->fiftyPlusTip) selected @endif><b>50 Odds+</b> : {{$game->fiftyPlusTip}}</option> @endif --}}
                         {{-- @if($game->jackpot!='No')<option value="{{$game->jackpotTips}}"   @if($game->testimonialValue==$game->jackpotTips) selected @endif><b>Jackpot</b> : {{$game->jackpotTips}}</option> @endif --}}
                    {{-- @if($game->HTFT!='')<option value="{{$game->HTFT}}"   @if($game->testimonialValue==$game->HTFT) selected @endif><b>HT/FT Tips</b> : {{$game->HTFT}}</option> @endif --}}
                    @if($game->superInvestment=='Yes')<option value="{{$game->superInvestmentTip}}"   @if($game->testimonialValue==$game->superInvestmentTip) selected @endif><b>Investment Tip</b> : {{$game->superInvestmentTip}}</option> @endif
                @else
                    <option value="{{$game->FTRecommendation}}" @if($game->testimonialValue==$game->FTRecommendation) selected @endif><b>Full-Time Recommendation</b> : {{$game->FTRecommendation}}</option>
                    <option value="{{$game->doubleChance}}" @if($game->testimonialValue==$game->doubleChance) selected @endif><b>Double Chance</b> : {{$game->doubleChance}}</option>
                    <option value="{{$game->overZeroFiveHT}}" @if($game->testimonialValue==$game->overZeroFiveHT) selected @endif><b>Over 0.5 HT</b> : {{$game->overZeroFiveHT}}</option>
                    <option value="{{$game->oneFiveGoals}}"   @if($game->testimonialValue==$game->oneFiveGoals) selected @endif><b>Over 1.5</b> : {{$game->oneFiveGoals}}</option>
                    <option value="{{$game->twoFiveGoals}}" @if($game->testimonialValue==$game->twoFiveGoals) selected @endif><b>2.5 Goals</b> : {{$game->twoFiveGoals}}</option>
                    {{-- <option value="{{$game->threeFiveGoals}}" @if($game->testimonialValue==$game->threeFiveGoals) selected @endif><b>3.5 Goals</b> : {{$game->threeFiveGoals}}</option> --}}
                    <option value="{{$game->BTTS}}" @if($game->testimonialValue==$game->BTTS) selected @endif><b>BTTS/GG</b> : {{$game->BTTS}}</option>
                    <option value="{{$game->draws}}" @if($game->testimonialValue==$game->draws) selected @endif><b>Draws</b> : {{$game->draws}}</option>

                    <option value="{{$game->singleBet}}" @if($game->testimonialValue==$game->singleBet) selected @endif><b>Single Bet</b> : {{$game->singleBet}}</option>

                    <option value="{{$game->weh}}" @if($game->testimonialValue==$game->weh) selected @endif><b>Win Either Half</b> : {{$game->weh}}</option>
                   
                    <option value="{{$game->bankerOfTheDay}}" @if($game->testimonialValue==$game->bankerOfTheDay) selected @endif><b>Banker Of The Day</b> : {{$game->bankerOfTheDay}}</option>  
{{--                     
                    <option value="{{$game->handicap}}" @if($game->testimonialValue==$game->handicap) selected @endif><b>Handicap</b> : {{$game->handicap}}</option>  --}}
                    {{-- <option value="{{$game->drawNoBet}}" @if($game->testimonialValue==$game->drawNoBet) selected @endif><b>Draw No Bet</b> : {{$game->drawNoBet}}</option> --}}
                    {{-- <option value="{{$game->tennis}}" @if($game->testimonialValue==$game->tennis) selected @endif><b>Tennis</b> : {{$game->tennis}}</option> --}}
                    {{-- <option value="{{$game->basketball}}" @if($game->testimonialValue==$game->basketball) selected @endif><b>Basketball</b> : {{$game->basketball}}</option> --}}
                    {{-- <option value="{{$game->handball}}" @if($game->testimonialValue==$game->handball) selected @endif><b>Handball</b> : {{$game->handball}}</option>
                    <option value="{{$game->ice_hockey}}" @if($game->testimonialValue==$game->ice_hockey) selected @endif><b>Ice Hockey</b> : {{$game->ice_hockey}}</option> --}}
                    {{-- <option value="{{$game->BigOdds}}" @if($game->testimonialValue==$game->BigOdds) selected @endif><b>Big Odds</b> : {{$game->BigOdds}}</option> --}}
                @endif
            </select>
        </div>
        @if($game->superInvestment=='Yes')
            <div class="form-group col-sm-6 bg-danger" style="padding: 25px">
                <label>SUPER INVESTMENT STATUS</label>
                <select name="investment" class="form-control">
                    <option value="">Select here...</option>
                        <option value="1" @if($game->moreOption=='1') selected @endif>Successful</option>
                        <option value="2" @if($game->moreOption=='2') selected @endif>Failed</option>
                        <option value="3" @if($game->moreOption=='3') selected @endif>Postponed</option>
                </select>
            </div>
        @endif
        @if($game->freePick=='Yes')
            <div class="form-group col-sm-6 bg-danger" style="padding: 25px">
                <label>FREE PICK STATUS</label>
                <select name="FreePickStatus" class="form-control">
                    <option value="">Select here...</option>
                        <option value="1" @if($game->FreePickStatus=='1') selected @endif>Successful</option>
                        <option value="2" @if($game->FreePickStatus=='2') selected @endif>Failed</option>
                        <option value="3" @if($game->FreePickStatus=='3') selected @endif>Postponed</option>
                </select>
            </div>
        @endif
    </div>
    <div class="container-fluid">
        {!! csrf_field() !!}

        <div id="settingstatus" class="col-xs-6"></div>
        <div class="form-group col-sm-12">
            <button class="btn btn-md btn-success" name="submit" id="submitsetting">SAVE & CLOSE</button>
        </div>

    </div>
</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#addresultform').submit(function (e) {
            e.preventDefault();
            $('#submitsetting').prop('disabled', true).html('SAVING RESULT');
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitsetting').prop('disabled', false).html('SAVE RESULT');
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        swal(data.encounters, '', 'success');
                        $('#pred{{$game->id}}').css({'background':'lightgreen', 'color':'darkgreen'});
                        $('#addresult').modal('hide');
                    }
                }
            });

        });
    });
</script>