@extends('layouts.master')

@section('title')
    Passion Predict  | ALL BOOKING CODE
@endsection
@section('page')
    Booking Codes
@endsection
@section('content')
    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
        @if(count($theDates)<1)
            <br><br><br><br><br><br>
            <center><h3>NOTHING TO MANAGE YET!</h3></center>
        @else
            @foreach($theDates as $i => $date)
                <div class="panel">
                    <a class="panel-heading" role="tab" id="heading{{$i+1}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i+1}}" aria-expanded="true" aria-controls="collapse{{$i+1}}">
                        <h4 class="panel-title">{{\Carbon\Carbon::parse($date->codeDate)->format('d M, Y')}}</h4>
                    </a>
                    <div id="collapse{{$i+1}}" class="panel-collapse @if($i=='0') in @endif collapse" role="tabpanel" aria-labelledby="heading{{$i+1}}">
                        <div class="panel-body" style="background-color: white!important;">

                            <table id="" class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>REL</th>
                                    <th>Date</th>
                                    <th>VIP Store</th>
                                    <th>Booking Code</th>
                                    <th>Batch</th>
                                     <th>Country</th>
                                    <th>Bookmaker</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sn = 0;
                                ?>
                                @foreach($date->getGames($date->codeDate) as $ii => $prediction)
                                    <?php
                                    $sn++;
                                    ?>
                                    <tr id="pred{{$prediction->id}}">
                                        <td class="red">{{$sn}}</td>
                                        <td>{{$prediction->codeDate}}</td>
                                        <td>
                                            @if($prediction->VIPCategory=='sure2')
                                                Sure 2 Odds
                                            @elseif($prediction->VIPCategory=='sure3')
                                                Sure 3 Odds
                                            @elseif($prediction->VIPCategory=='over35')
                                                Over 3.5 Goals
                                            @elseif($prediction->VIPCategory=='superSingle')
                                                Super Singles
                                            @elseif($prediction->VIPCategory=='sure5')
                                                Sure 5 Odds
                                            @elseif($prediction->VIPCategory=='sure50')
                                                50 Odds
                                            @elseif($prediction->VIPCategory=='weekend')
                                                Weekend Tips
                                            @elseif($prediction->VIPCategory=='htft')
                                                HT/FT
                                            @elseif($prediction->VIPCategory=='investment')
                                                Super Investment Tip
                                            @elseif($prediction->VIPCategory=='free')
                                                Free Tips
                                            @endif
                                        </td>
                                        <td>{{$prediction->bookingCode}}</td>
                                        <td>Set {{$prediction->codeTime}}</td>
                                        <td>{{$prediction->country}}</td>

                                        <td>{{$prediction->bookMaker}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    Actions
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                                    <li style="cursor: pointer;"><a class="gamedelete" data-in="Prediction" data-url="{{route('/trashBookingCode')}}/{{$prediction->id}}" data-id="" href="">DELETE</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="col" style="min-height: 323px;;">
        <br><br>
    </div>
@endsection
