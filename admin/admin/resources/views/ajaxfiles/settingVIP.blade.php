<form action="{{ route('/ajaxVIPGameUpdate') }}/{{ $game->id }}/{{ $datain }}" method="POST" id="updateForm">
    <div class="container-fluid">
        <div class="col-xs-12">
            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <div class="form-group col-xs-12">
                    <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *"
                        value="{{ $game->teamOne }}" required>
                    <input type="hidden" value="{{ $game->gameType }}" name="gameType" required>
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

            <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;">
                <center><span
                        style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span>
                </center>
                <br>
                {{-- <div class="form-group"> --}}
                {{-- <input class="form-control" name="drawOdd" type="text" value="{{$game->drawOdd}}" placeholder="DRAW ODD"> --}}
                {{-- </div> --}}
                <div class="form-group">
                    <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *"
                        value="{{ $game->gameDate }}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *"
                        value="{{ $game->gameTime }}" required>
                </div>
                <div class="form-group">
                    <select name="league" class="form-control select2" required>
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

    {{-- sure5Odds
                    sure5OddsTip
                	sure5OddsOdds --}}

    {{-- <div class="col-sm-12">
        <h4>SILVER PACKAGE TIPS</h4>
    </div> --}}
    <div class="row">
        {{-- <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>2-3 ODDS</label>
                            <select name="sure2Odds" class="form-control">
                                <option value="one" @if ($game->sure2Odds == 'one') selected @endif>Set One</option>
                                <option value="two" @if ($game->sure2Odds == 'two') selected @endif>Set Two</option>
                                <option value="No" @if ($game->sure2Odds == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure2OddsTip" value="{{ $game->sure2OddsTip }}"
                                class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure2OddsOdds" value="{{ $game->sure2OddsOdds }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <hr>

        <div class="col-sm-12">
            <div class="col-sm-12">
                <h4>MEGA PACKAGE TIPS</h4>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group col-md-12 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>5+ ODDS</label>
                            <select name="sure2Odds" class="form-control">
                                <option value="one" @if ($game->sure5Odds == 'one') selected @endif>Set One</option>
                                <option value="two" @if ($game->sure5Odds == 'two') selected @endif>Set Two</option>
                                <option value="No" @if ($game->sure5Odds == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure5OddsTip" value="{{ $game->sure5OddsTip }}"
                                class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure5OddsOdds" value="{{ $game->sure5OddsOdds }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="col-sm-12">
            <div class="col-sm-12">
                <h4>SUPER INVESTMENT TIPS</h4>
            </div>
        </div>
        {{-- <div class="row"> --}}
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">

                            <select name="superInvestment" class="form-control">

                                <option value="one"@if ($game->superInvestment == 'one') selected @endif>Set One</option>
                                    <option value="two" @if ($game->superInvestment == 'two') selected @endif>Set Two</option>

                                <option value="No" @if ($game->superInvestment == 'No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="superInvestmentTip" value="{{ $game->superInvestmentTip }}"
                                class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="superInvestmentOdds" value="{{ $game->superInvestmentOdds }}"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
            {!! csrf_field() !!}

            <div class="col-sm-12">
                <div id="settingstatus" class="col-xs-6"></div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-md btn-success" name="submit" id="submitsetting">UPDATE PREDICTION</button>
                </div>
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
