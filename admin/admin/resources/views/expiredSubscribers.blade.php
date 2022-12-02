@extends('layouts.master')

@section('title')
    Passion Predict   | EXPIRED SUBSCRIBERS
@endsection
@section('page')
    Expired Accounts

@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super'||$persons->category=='General')

    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
             {{-- <li role="presentation" class="active"><a href="#tab_content33" role="tab" id="jackpot-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Silver Package</a>
            </li> --}}
            <li role="presentation" class=""><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Mega Package</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Investment Package</a>
            </li>
            {{-- <li role="presentation" class=""><a href="#tab_content33" role="tab" id="jackpot-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Jackpot Package</a>
            </li> --}}
        </ul>
        <div id="myTabContent2" class="tab-content">
        
            <div role="tabpanel" class="tab-pane fade active in " id="tab_content11" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>EMAIL ADDRESS</th>
                                <th>PLAN</th>
                                <th>SUB DATE</th>
                                <th>DUE DATE</th>
                                {{--<th>Details</th>--}}
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gold->all() as $i=> $user)

                                <tr class="d{{$user->id}}">
                                    <td class="red">{{$i+1}}</td>
                                    <td class="red">{{$user->id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->subscription_type}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>

                                    {{--<td><a class="gameview" href="{{$user->id}}" data-target="#userdetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>--}}
                                    {{--<td>--}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                Actions
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                                <li></li>
                                                <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                                <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                                <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                                <li class="divider"></li>
                                                @if($user->flag=='0')
                                                    <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                                @else
                                                    <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                                @endif

                                                @if($user->status=='0')
                                                    <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                                @else
                                                    <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                                @endif

                                                <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
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
            <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table datatable table-striped table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>ID</th>
                                <th>FULL NAME</th>
                                <th>EMAIL ADDRESS</th>
                                <th>PLAN</th>
                                <th>SUB DATE</th>
                                <th>DUE DATE</th>
                                {{--<th>Details</th>--}}
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($investment->all() as $i=> $user)

                                <tr class="d{{$user->id}}">
                                    <td class="red">{{$i+1}}</td>
                                    <td class="red">{{$user->id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->subscription_type}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->date_subscribed)->format('d M @ h:ia')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->next_due_date)->format('d M @ h:ia')}}</td>

                                    {{--<td><a class="gameview" href="{{$user->id}}" data-target="#userdetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>--}}
                                    {{--<td>--}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                Actions
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                                <li></li>
                                                <li style="cursor: pointer;"><a class="userdetails" href="{{$user->id}}" data-target="#userdetails" data-toggle="modal">VIEW DETAILS</a></li>
                                                <li style="cursor: pointer;"><a class="updateuser" href="{{$user->id}}" data-target="#updateuserinfo" data-toggle="modal">EDIT/UPDATE</a></li>
                                                <li style="cursor: pointer;"><a class="upgradeuser" href="{{$user->id}}" data-target="#upgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>
                                                <li class="divider"></li>
                                                @if($user->flag=='0')
                                                    <li style="cursor: pointer;"><a class="flaguser" href="{{$user->id}}" id="f{{$user->id}}">FLAG USER</a>
                                                @else
                                                    <li style="cursor: pointer;"><a class="unflaguser" href="{{$user->id}}" id="f{{$user->id}}"><span style="color: red;">UNFLAG USER</span></a>
                                                @endif

                                                @if($user->status=='0')
                                                    <li style="cursor: pointer;"><a class="disableuser" href="{{$user->id}}" id="h{{$user->id}}">DISABLE USER</a>
                                                @else
                                                    <li style="cursor: pointer;"><a class="enableuser" href="{{$user->id}}" id="h{{$user->id}}"><span style="color: green;">ENABLE USER</span></a>
                                                @endif

                                                <li style="cursor: pointer;"><a class="userdelete" href="{{$user->id}}" data-target="#userdelete" data-toggle="modal">DELETE USER</a>
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
        </div>
    </div>
    
    @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif

@endsection
