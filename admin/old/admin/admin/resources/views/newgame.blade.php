@extends('layouts.master')

@section('title')
    Passion Predict | NEW PREDICTION
@endsection

@section('page')
    New Prediction
@endsection

@section('content')
    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>

        <form method="POST" action="{{ route('/loadPrediction') }}" id="predictionForm">
            <div class="row">
                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamOneForm" placeholder="eg. WWWLD" class="form-control" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamOneOdds" placeholder="eg. 1.5" class="form-control">
                    </div>
                </div>

                <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;">
                    <center><span
                            style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span>
                    </center>
                    <br>
                    {{-- <div class="form-group"> --}}
                    {{-- <input class="form-control" name="drawOdd" type="text" placeholder="DRAW ODD"> --}}
                    {{-- </div> --}}
                    <div class="form-group">
                        <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *"
                            required>
                    </div>
                    <div class="form-group">
                        <select name="league" class="form-control select2" required>
                            <option value="">SELECT LEAGUE *</option>
                            @foreach ($allLeagues as $leagues)
                                <option value="{{ $leagues->code }}">{{ $leagues->league }} ({{ $leagues->code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamTwo" class="form-control" placeholder="TEAM TWO *" required>
                    </div>

                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamTwoForm" placeholder="eg. WWWLD" class="form-control" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamTwoOdds" placeholder="eg. 1.5" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-md-4">
                    <label>FREE EXPERT TIPS?</label>
                    <select name="freePick" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No" selected>No</option>
                    </select>
                    <small class="text-danger">If YES, this game will show on homepage under Free Punter's Picks</small>
                </div>

                <div class="form-group col-md-4">
                    <label>UPCOMING PICKS?</label>
                    <select name="upcomingGame" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No" selected>No</option>
                    </select>
                    <small class="text-danger">If YES, this game will show on homepage under Upcoming Predictions</small>
                </div>

                <div class="form-group col-md-4">
                    <label>FULL TIME RECOMMENDATION</label>
                    <input type="text" name="FTRecommendation" class="form-control" required>
                    <small class="text-danger">Value here will show for Free Pick & Upcoming Game on homepage</small>
                </div>

                <div class="form-group col-md-4">
                    <label>DOUBLE CHANCE</label>
                    <select name="doubleChance" class="form-control">
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                        <option value="1X">1X</option>
                        <option value="12">12</option>
                        <option value="2X">2X</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>OVER 0.5 GOALS HT</label>
                    <select name="overZeroFiveHT" class="form-control">
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                        <option value="Over 0.5">Over 0.5</option>
                        <option value="Under 0.5">Under 0.5</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>1.5 GOALS</label>
                    <select name="oneFiveGoals" class="form-control">
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                        <option value="Over 1.5">Over 1.5</option>
                        <option value="Under 1.5">Under 1.5</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>2.5 GOALS</label>
                    <select name="twoFiveGoals" class="form-control">
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                        <option value="Over 2.5">Over 2.5</option>
                        <option value="Under 2.5">Under 2.5</option>
                    </select>
                </div>
                {{-- <div class="form-group col-md-4">
                    <label> 3.5 GOALS</label>
                    <select name="threeFiveGoals" class="form-control">
                        <option value="over 3.5">Over 3.5 Goals</option>
                        <option value="under 3.5">Under 3.5 Goals</option>
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                    </select>
                </div> --}}

                <div class="form-group col-md-4">
                    <label>BTTS/GG</label>
                    <select name="BTTS" class="form-control">
                        <option value="BTTS/GG">BTTS/GG</option>
                        <option value="No" selected>No</option>
                    </select>
                </div>
                {{-- 'weh', 'singleBet' --}}
                <div class="form-group col-md-4">
                    <label>WIN EITHER HALF</label>
                    <select name="weh" class="form-control">
                        <option value="AWEH">AWEH</option>
                        <option value="HWEH">HWEH</option>
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Single Bet</label>
                    <input type="text" name="singleBet" class="form-control" value="" placeholder="leave blank if nothing">
                </div>

                <div class="form-group col-md-4">
                    <label>DRAWS</label>
                    <select name="draws" class="form-control">
                        <option value="X">Yes</option>
                        <option value="" selected>*-*-*-*-*-*-*-*-*-*</option>
                    </select>
                </div>


                <div class="form-group col-md-4">
                    <label>BANKER OF D DAY</label>
                    <input type="text" name="bankerOfTheDay" class="form-control" value=""
                        placeholder="leave blank if nothing">
                </div>

              




                {!! csrf_field() !!}

                <div id="pstatus" class="col-xs-6"></div>
                <div class="form-group col-sm-12">
                    <br>
                    <button class="btn btn-md btn-success" name="submit" id="predictionBtn">SUBMIT PREDICTION</button>
                </div>

            </div>
        </form>
    </div>
@endsection
