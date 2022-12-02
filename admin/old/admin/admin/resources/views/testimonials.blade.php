@extends('layouts.master')

@section('title')
    Passion Predict   | Testimonials
@endsection
@section('page')
    All Testimonials
    {{--<button class="btn btn-sm btn-success pull-right" id="exportbtn"><span class="fa fa-download"></span> DOWNLOAD AS SPREADSHEET</button>--}}
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super' || $persons->category=='Predictor' )

    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
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
                <th>Testimonial</th>
                <th>Result</th>

                <th>Details</th>
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sn = 0;
            ?>
            @foreach($alltestimonials->all() as $prediction)
                <?php
                        $sn++;
                $creator = App\System::find($prediction->creator);
                ?>
                <tr id="{{$prediction->id}}">
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
                    <td>{{$prediction->testimonialValue}}</td>
                    <td>@if($prediction->teamOneWon) {{$prediction->teamOneScore}} : {{$prediction->teamTwoScore}} @endif</td>

                    <td><a class="gameview" href="" data-url="{{route('/gamedetails')}}/{{$prediction->id}}/Prediction" data-target="#gamedetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                {{--<li style="cursor: pointer;"><a class="updategame" data-in="Prediction" href="" data-url="{{route('/updateprediction')}}/{{$prediction->id}}/Prediction" data-target="#updategame" data-toggle="modal">EDIT/UPDATE</a>--}}
                                @if($prediction->testimonial=='0')
                                    <li style="cursor: pointer;"><a class="flag" data-in="Prediction" href="{{$prediction->id}}" id="f{{$prediction->id}}" data-target="#marktest" data-toggle="modal">MARK TESTIMONIAL</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unflag" data-in="Prediction" href="{{$prediction->id}}" id="f{{$prediction->id}}"><span style="color: red;">UNMARK TESTIMONIAL</span></a>
                                @endif
                                @if($prediction->display=='0')
                                    <li style="cursor: pointer;"><a class="hided" data-in="Prediction" href="{{$prediction->id}}" id="h{{$prediction->id}}">UNPUBLISH</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhide" data-in="Prediction" href="{{$prediction->id}}" id="h{{$prediction->id}}"><span style="color: green;">PUBLISH</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="gamedelete" data-in="Prediction" href="{{$prediction->id}}" data-target="#gamedelete" data-toggle="modal">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$alltestimonials->render()}}
    </div>
    {{--<div class="row" id="excon">--}}
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
                {{--<th>MORE OPTION</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($alltestimonials->all() as $p)--}}
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
                    {{--<td>{{$p->ft_recommendation}}</td>--}}
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
                    {{--<td>{{$p->more_options}}</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
        {{--</table>--}}
    {{--</div>--}}
@else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif
@endsection
