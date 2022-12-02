@extends('layouts.master')

@section('title')
    Passion Predict  | DISABLED SUBSCRIBERS
@endsection
@section('page')
    Disabled Members <button class="btn btn-sm btn-success pull-right" id="exportbtn"><span class="fa fa-download"></span> DOWNLOAD AS SPREADSHEET</button>
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super' ||$persons->category=='General')



    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>EMAIL ADDRESS</th>
                <th>USERNAME</th>
                <th>COUNTRY</th>
                <th>REGISTERED</th>

                {{--<th>Details</th>--}}
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members->all() as $user)

                <tr id="d{{$user->id}}">
                    <td class="red">{{$user->id}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->country}}</td>
                    <td>{{$user->created_at->format('d M, Y')}}</td>

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
    <div class="row" id="excon">
        <table class="table" id="exportthis">
            <thead>
            <tr>
                <th>S/N</th>
                <th>FULL NAME</th>
                <th>EMAIL ADDRESS</th>
                <th>USERNAME</th>
                <th>DATE/TIME REGISTERED</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members->all() as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->full_name}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->username}}</td>
                    <td>{{$p->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
   @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif
@endsection
