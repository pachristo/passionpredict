@extends('layouts.master')

@section('title')
    Passion Predict   | ALL VIP PREDICTIONS
@endsection
@section('page')
    VIP Predictions
@endsection
@section('content')

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
                <th>League</th>
                <th></th>
                <th class="red" style="background: #b1f10c; text-align: center"></th>
                <th></th>
                {{--<th>Draw Odd</th>--}}
                <th>Presence</th>
                <th>Result</th>
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
                <tr id="pred{{$prediction->id}}" @if($prediction->teamOneWon!='') style="background: lightgreen; color: darkgreen" @endif>
                    <td class="red">{{$sn}}</td>
                    <td>
                        {{$prediction->gameDate}} <br>
                        {{$prediction->gameTime}}
                    </td>
                    <td>{{$prediction->league}}</td>
                    <td>{{$prediction->teamOne}}</td>
                    <td class="red" style="background: #b1f10c; text-align: center; font-weight: bold">VS</td>

                    <td>{{$prediction->teamTwo}}</td>
                    {{--                <td>{{$prediction->drawOdd}}</td>--}}
                    <td>
                        <div class="tags">
                            <small>

                                {{-- @if($prediction->sure2Odds!='No') <span class="tag">2 -3 Odds: <strong>{{$prediction->sure2OddsTip}} - ({{$prediction->sure2OddsOdds}}) - Set {{$prediction->sure2Odds}}</strong></span> @endif --}}
                                {{-- @if($prediction->jackpot!='No') <span class="tag">Jackpot: <strong>{{$prediction->jackpotTips}} - ({{$prediction->jackpotOdds}}) - Set {{$prediction->jackpotTips}}</strong></span> @endif --}}
                                @if($prediction->sure5Odds!='No') <span class="tag">Mega tips: <strong>{{$prediction->sure5OddsTip}} - ({{$prediction->sure5OddsOdds}}) - Set {{$prediction->sure5Odds}}</strong></span> @endif
                                {{--
                                @if($prediction->sure5Odds!='No') <span class="tag">5 Odds: <strong>{{$prediction->sure5OddsTip}} - ({{$prediction->sure5OddsOdds}}) - Set {{$prediction->sure5Odds}}</strong></span> @endif --}}
                                {{-- @if($prediction->overThree!='No') <span class="tag">Over 3.5 Goals - ({{$prediction->overThreeOdds}}) - Set {{$prediction->overThree}}</span> @endif
                                @if($prediction->superSingle!='No') <span class="tag">Sup. Single: <strong>{{$prediction->superSingleTip}} - ({{$prediction->superSingleOdds}}) - Set {{$prediction->superSingle}}</strong></span> @endif --}}
                                {{-- @if($prediction->fiftyPlus!='No') <span class="tag">50 Odds: <strong>{{$prediction->fiftyPlusTip}} - ({{$prediction->fiftyPlusOdds}}) - Set {{$prediction->fiftyPlus}}</strong></span> @endif --}}
                                {{-- @if($prediction->weekend!='No') <span class="tag">Weekend: <strong>{{$prediction->weekendTip}} - ({{$prediction->weekendOdds}}) - Set {{$prediction->weekend}}</strong></span> @endif --}}
                                {{-- @if($prediction->HTFT!='') <span class="tag">HT/FT: <strong>{{$prediction->HTFT}} - ({{$prediction->HTFTOdds}})</strong></span> @endif --}}
                                @if($prediction->superInvestment!='No') <span class="tag" style="background: red;">Investment: <strong>{{$prediction->superInvestmentTip}} - ({{$prediction->superInvestmentOdds}}) - Set {{$prediction->superInvestment}}</strong></span> @endif
                            </small>
                        </div>
                    </td>
                    <td>@if($prediction->teamOneWon) {{$prediction->teamOneScore}} : {{$prediction->teamTwoScore}} @endif</td>
                    <td><a class="gameview" href="" data-url="{{route('/gamedetails')}}/{{$prediction->id}}/Prediction" data-target="#gamedetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                {{--<li style="cursor: pointer;"><a style="color: red;" class="archiveGame" data-id="{{$prediction->id}}">ARCHIVE THIS</a>--}}
                                <li style="cursor: pointer;"><a class="updategame" data-in="Prediction" href="" data-url="{{route('/updateVIPprediction')}}/{{$prediction->id}}/Prediction" data-target="#updategame" data-toggle="modal">EDIT/UPDATE</a>
                                <li style="cursor: pointer;"><a class="addresult" href="" data-url="{{route('/addresult')}}/{{$prediction->id}}" data-target="#addresult" data-toggle="modal">ADD RESULT & TESTIMONIAL</a>

                                @if($prediction->display=='0')
                                    <li style="cursor: pointer;"><a class="hided" data-in="Prediction" href="" data-url="{{route('/ajaxhide')}}/{{$prediction->id}}/Prediction" id="h{{$prediction->id}}">UNPUBLISH</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhide" data-in="Prediction" href="" data-url="{{route('/ajaxunhide')}}/{{$prediction->id}}/Prediction" id="h{{$prediction->id}}"><span style="color: green;">PUBLISH</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="gamedelete" data-in="Prediction" data-url="{{route('/ajaxgamedelete')}}/{{$prediction->id}}/Prediction" data-id="" href="">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$allprediction->render()}}
    </div>

@endsection
