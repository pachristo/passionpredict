@extends('layouts.master')

@section('title')
    Passion Predict   | SMS USER MANAGEMENT
@endsection
@section('page')
    {{$title}}
    {{--<button class="btn btn-sm btn-success pull-right" id="exportbtn"><span class="fa fa-download"></span> DOWNLOAD AS SPREADSHEET</button>--}}
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super' || $persons->category=='General')
    <div class="row">
        <div class="col-sm-12 bg-danger">
            <br>
            <form action="{{route('/searchSmsMember')}}" method="POST">
                <div class="form-group form-group-lg col-sm-6">
                    <input type="text" name="term" class="form-control" required placeholder="search: ID, Name, Email, Username & Country">
                </div>
                {{ csrf_field() }}
                <div class="form-group form-group-lg col-sm-6">
                    <button class="btn btn-lg btn-success"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="col" style="min-height: 323px;;">
        {{$members->render()}}
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>SN</th>
                <th>ID</th>
                <th>FULL NAME</th>
                <th>EMAIL ADDRESS</th>
                <th>USERNAME</th>
                <th>COUNTRY</th>
                {{--<th>REGISTERED</th>--}}

                {{--<th>Details</th>--}}
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php $sn = 1; ?>
            @foreach($members->all() as $user)

                <tr id="d{{$user->id}}">
                    <td>{{$sn++}}</td>
                    <td class="red">{{$user->id}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->country}}</td>
{{--                    <td>{{$user->created_at->format('d M, Y')}}</td>--}}

                    {{--<td><a class="gameview" href="{{$user->id}}" data-target="#userdetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>--}}
                    {{--<td>--}}
                    <td>
                        <div class="btn-group">
                            {{--<a href=""><button class="btn btn-sm btn-primary" title="VIEW DETAILS"></button></a>--}}
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                <li></li>
				                <li style="cursor: pointer;"><a class="sms_user_details" href="{{$user->id}}" data-target="#SMSUSERDETAILS" data-toggle="modal">VIEW DETAILS</a></li>
                                  <li style="cursor: pointer;"><a class="addphone" href="{{$user->id}}" data-target="#addphonenumber" data-toggle="modal">ADD PHONE NUMBER</a></li>
                                <li style="cursor: pointer;"><a class="smsupgradeuser" href="{{$user->id}}" data-target="#smsupgradeuser" data-toggle="modal"><span class="fa fa-credit-card"></span> UPGRADE ACCOUNT</a></li>

                                @if($user->sms_subscription_status=='1')
                                    <li style="cursor: pointer;" id="smsun{{$user->id}}"><a class="smsunsubscribeUser" href="{{route('/smsunSubscribe')}}" data-id="{{$user->id}}" style="color: #ef5350;" data-msg="DO YOU REALLY WANT TO UN-SUBSCRIBE THIS USER?"><span class="fa fa-times-circle-o"></span> UN-SUBSCRIBE USER</a></li>
                                @endif
                               {{--  --}}

                               
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$members->render()}}
    </div>
    {{--<div class="row" id="excon">--}}
        {{--<table class="table" id="exportthis">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>S/N</th>--}}
                {{--<th>FULL NAME</th>--}}
                {{--<th>EMAIL ADDRESS</th>--}}
                {{--<th>USERNAME</th>--}}
                {{--<th>DATE/TIME REGISTERED</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@foreach($members->all() as $p)--}}
                {{--<tr>--}}
                    {{--<td>{{$p->id}}</td>--}}
                    {{--<td>{{$p->full_name}}</td>--}}
                    {{--<td>{{$p->email}}</td>--}}
                    {{--<td>{{$p->username}}</td>--}}
                    {{--<td>{{$p->created_at}}</td>--}}
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
@section('levelJS')
        <script type="text/javascript">
   $.ajaxSetup({
    headers:{

        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }

});

$(document).ready(function(){
    


    



});


</script>
@endsection
