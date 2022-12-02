@extends('layouts.master')

@section('title')
    Passion Predict   | NEW VIP PREDICTION
@endsection

@section('page')
    New VIP Prediction
@endsection

@section('content')
    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>

        <form method="POST" action="{{route('/loadPrediction')}}" id="predictionForm">
            <div class="row">
                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *" required>
                        <input type="hidden" value="1" name="gameType" required>
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

                <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;"><center><span style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span></center>
                    <br>
                    {{--<div class="form-group">--}}
                        {{--<input class="form-control" name="drawOdd" type="text" placeholder="DRAW ODD">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *" required>
                    </div>
                    <div class="form-group">
                        <select name="league" class="form-control select2" required>
                            <option value="">SELECT LEAGUE *</option>
                            @foreach($allLeagues as $leagues)
                                <option value="{{$leagues->code}}">{{$leagues->league}} ({{$leagues->code}})</option>
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
            {{--<hr>--}}

            {{-- <hr>
            <h4>SILVER PACKAGE TIPS</h4>
            <div class="row">
                <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SURE 2 - 3 ODDS</label>
                            <select name="sure2Odds" class="form-control">
                                <option value="one">Set One</option>
                                <option value="two">Set Two</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure2OddsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure2OddsOdds" class="form-control">
                        </div>
                    </div>
                </div>

            </div> --}}

                <hr>
                <h4>MEGA PACKAGE TIPS</h4>
                	{{-- sure5Odds
                    sure5OddsTip
                	sure5OddsOdds --}}
                <div class="row">
                    <div class="form-group col-md-12 bg-danger" style="padding: 10px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>SURE 5 + ODDS</label>
                                <select name="sure5Odds" class="form-control">
                                    <option value="one">Set One</option>
                                    <option value="two">Set Two</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>TIP</label>
                                <input type="text" name="sure5OddsTip" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>ODD</label>
                                <input type="text" name="sure5OddsOdds" class="form-control">
                            </div>
                        </div>
                    </div>




            </div>





                {!! csrf_field() !!}

            <hr>
            <h4>SUPER INVESTMENT TIPS</h4>
            <div class="row">


                   <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>INVESTMENT TIP</label>
                            <select name="superInvestment" class="form-control">
                                <option value="one">Set One</option>
                                <option value="two">Set Two</option>
                                {{-- <option value="No" selected>No</option> --}}
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="superInvestmentTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="superInvestmentOdds" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="pstatus" class="col-xs-6"></div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-md btn-success" name="submit" id="predictionBtn">SUBMIT PREDICTION</button>
                </div>
            </div>
        </form>
    </div>
@endsection
