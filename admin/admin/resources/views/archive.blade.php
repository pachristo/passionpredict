@extends('layouts.master')

@section('title')
    Passion Predict  | ARCHIVE PREDICTIONS
@endsection
@section('page')
    Archived Predictions
    {{--<button class="btn btn-sm btn-success pull-right" id="exportbtn"><span class="fa fa-download"></span> DOWNLOAD AS SPREADSHEET</button>--}}
@endsection
@section('content')
    <small>TO MARK AS TESTIMONIAL, KINDLY 'RESTORE' AND GOTO 'Manage Existing' to do so!</small>
    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        {{$allprediction->render()}}
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>REL</th>
                <th>Match Date</th>
                {{--<th>Match Time</th>--}}
                <th>League</th>
                <th></th>
                <th class="red" style="background: #b1f10c; text-align: center"></th>
                <th></th>
                <th>Draw Odd</th>
                <th>Custom Tips</th>

                <th>Details</th>
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sn = 0;
            ?>
            @foreach($allprediction->all() as $prediction)
                <?php
                $sn++;
                //                $creator = App\System::find($prediction->creator);
                ?>
                <tr id="pred{{$prediction->id}}">
                    <td class="red">{{$sn}}</td>
                    <td>
                        {{$prediction->gameDate}} <br>
                        {{$prediction->gameTime}}
                    </td>
                    <td>{{$prediction->league}}</td>
                    {{--<td><a class="creatorview" href="{{$creator['id']}}" data-target="#creator" data-toggle="modal"><span style="color: brown;">{{$creator['name']}}</span></a></td>--}}
                    <td>{{$prediction->teamOne}}</td>
                    <td class="red" style="background: #b1f10c; text-align: center; font-weight: bold">VS</td>

                    <td>{{$prediction->teamTwo}}</td>
                    <td>{{$prediction->drawOdd}}</td>
                    <td>{{$prediction->customTips}}
                        <span id="other{{$prediction->id}}">
                    @if($prediction->ft_others!=NULL)
                                ({{$prediction->ft_others}})
                            @endif
                    </span>
                        - <a class="addftt" href="{{$prediction->id}}" data-target="#addft" data-toggle="modal"><button class="btn btn-xs btn-success">Add</button></a></td>

                    <td><a class="gameview" href="{{$prediction->id}}" data-in="Archive" data-target="#gamedetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                <li style="cursor: pointer;"><a style="color: red;" class="unarchiveGame" data-id="{{$prediction->id}}">RESTORE THIS</a>
                                <li style="cursor: pointer;"><a class="updategame" data-in="Archive" href="{{$prediction->id}}" data-target="#updategame" data-toggle="modal">EDIT/UPDATE</a>
                                {{--<li style="cursor: pointer;"><a class="addresult" href="{{$prediction->id}}" data-target="#addresult" data-toggle="modal">ADD RESULT</a>--}}
                                @if($prediction->testimonial=='')
                                    {{--<li style="cursor: pointer;"><a class="flag" href="{{$prediction->id}}" id="f{{$prediction->id}}" data-target="#marktest" data-toggle="modal">MARK TESTIMONIAL</a>--}}
                                @else
                                    <li style="cursor: pointer;"><a class="unflag" data-in="Archive" href="{{$prediction->id}}" id="f{{$prediction->id}}"><span style="color: red;">UNMARK TESTIMONIAL</span></a>
                                @endif

                                @if($prediction->display=='0')
                                    <li style="cursor: pointer;"><a class="hided" data-in="Archive" href="{{$prediction->id}}" id="h{{$prediction->id}}">UNPUBLISH</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhide" data-in="Archive" href="{{$prediction->id}}" id="h{{$prediction->id}}"><span style="color: green;">PUBLISH</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="gamedelete" data-in="Archive" data-id="{{$prediction->id}}" href="">DELETE</a>
                                {{--</li>--}}
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$allprediction->render()}}
    </div>
    <div class="row" id="excon">
        {{--<table class="table" id="exportthis">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>S/N</th>--}}
        {{--<th>DATE CREATED</th>--}}
        {{--<th>MATCH DATE</th>--}}
        {{--<th>MATCH TIME</th>--}}
        {{--<th>TEAM ONE</th>--}}
        {{--<th>TEAM ONE FORM</th>--}}
        {{--<th>TEAM ONE ODDS</th>--}}
        {{--<th>TEAM TWO</th>--}}
        {{--<th>TEAM TWO FORM</th>--}}
        {{--<th>TEAM TWO ODDS</th>--}}
        {{--<th>DRAW ODD</th>--}}
        {{--<th>LEAGUE</th>--}}
        {{--<th>FREE MAESTRO SELECTION</th>--}}
        {{--<th>TODAY'S FREE GAME</th>--}}
        {{--<th>STAKE OF THE DAY</th>--}}
        {{--<th>FULL TIME RECOMMENDATION</th>--}}
        {{--<th>1ST HALF GOALS</th>--}}
        {{--<th>DOUBLE CHANCE</th>--}}
        {{--<th>1.5 GOALS</th>--}}
        {{--<th>2.5 GOALS</th>--}}
        {{--<th>BOTH TEAM TO SCORE</th>--}}
        {{--<th>1ST HALF RESULT</th>--}}
        {{--<th>WIN EITHER HALF</th>--}}
        {{--<th>1ST 15 MINS DRAW</th>--}}
        {{--<th>VALUE STAKE</th>--}}
        {{--<th>DRAW OPTION</th>--}}

        {{--<th>3 ODDS BANKER</th>--}}
        {{--<th>7 ODDS BANKER</th>--}}
        {{--<th>HIGHEST SCORING HALF</th>--}}

        {{--<th>MORE OPTION</th>--}}

        {{--<th>DOUBLE CHANCE/BTTS</th>--}}
        {{--<th>3.5 GOALS</th>--}}
        {{--<th>WIN BOTH HALVES</th>--}}
        {{--<th>SCORE BOTH HALVES</th>--}}
        {{--<th>HANDICAP (0:1, 1:0)</th>--}}
        {{--<th>HANDICAP (0:2, 2:0)</th>--}}
        {{--<th>1X3/BTTS</th>--}}
        {{--<th>SMASHING ACCUMULATOR</th>--}}
        {{--<th>MEGA WEEKEND</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($allprediction->all() as $p)--}}
        {{--<tr>--}}
        {{--<td>{{$p->id}}</td>--}}
        {{--<td>{{$p->created_at}}</td>--}}
        {{--<td>{{$p->gamedate}}</td>--}}
        {{--<td>{{$p->gametime}}</td>--}}
        {{--<td>{{$p->teamone}}</td>--}}
        {{--<td>{{$p->teamoneform}}</td>--}}
        {{--<td>{{$p->teamoneodds}}</td>--}}
        {{--<td>{{$p->teamtwo}}</td>--}}
        {{--<td>{{$p->teamtwoform}}</td>--}}
        {{--<td>{{$p->teamtwoodds}}</td>--}}
        {{--<td>{{$p->drawodds}}</td>--}}
        {{--<td>{{$p->league}}</td>--}}
        {{--<td>{{$p->maestro}}</td>--}}
        {{--<td>{{$p->today_game}}</td>--}}
        {{--<td>{{$p->stake_of_the_day}}</td>--}}
        {{--<td>{{$p->ft_recommendation}} ({{$prediction->ft_others}})</td>--}}
        {{--<td>{{$p->firsthalf_goals}}</td>--}}
        {{--<td>{{$p->double_chance}}</td>--}}
        {{--<td>{{$p->onefive_goals}}</td>--}}
        {{--<td>{{$p->twofive_goals}}</td>--}}
        {{--<td>{{$p->both_team_score}}</td>--}}
        {{--<td>{{$p->firsthalf_result}}</td>--}}
        {{--<td>{{$p->win_either_half}}</td>--}}
        {{--<td>{{$p->first15mins_draw}}</td>--}}
        {{--<td>{{$p->value_stakes}}</td>--}}
        {{--<td>{{$p->draw_option}}</td>--}}

        {{--<td>{{$p->three_odds_banker}}</td>--}}
        {{--<td>{{$p->seven_odds_banker}}</td>--}}
        {{--<td>{{$p->highest_scoring_half}}</td>--}}

        {{--<td>{{$p->more_options}}</td>--}}

        {{--<td>{{$p->double_chance_btts}}</td>--}}
        {{--<td>{{$p->threefive_goals}}</td>--}}
        {{--<td>{{$p->win_both_half}}</td>--}}
        {{--<td>{{$p->score_both_half}}</td>--}}
        {{--<td>{{$p->handicap_one}}</td>--}}
        {{--<td>{{$p->handicap_two}}</td>--}}
        {{--<td>{{$p->x2btts}}</td>--}}
        {{--<td>{{$p->smashing}}</td>--}}
        {{--<td>{{$p->mega}}</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}
    </div>

@endsection
