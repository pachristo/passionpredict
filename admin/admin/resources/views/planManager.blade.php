@extends('layouts.master')

@section('title')
    Passion Predict   | Plan Manager
@endsection
@section('page')
    Subscription Plan Manager
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')

    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            @foreach($data->all() as $plan)
                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                    <div class="well profile_view">
                        <div class="col-sm-12">
                            <div class="left col-xs-10">
                                <h1>{{$plan->category}} <br><small>({{$plan->planName}}) - {{$plan->accessTime}}</small></h1>
                                <p><strong>Naira: </strong> N{{$plan->nairaPrice}} </p>
                                <p><strong>Kenya Shillings: </strong> KSH{{$plan->keshPrice}} </p>
                                <p><strong>Dollar: </strong> ${{$plan->dollarPrice}} </p>
                                <p><strong>Tanzanian: </strong> TZS {{$plan->tzsPrice}} </p>
                                <p><strong>Uganda: </strong> UGX {{$plan->ugxPrice}} </p>
                                <p><strong>Ghana: </strong> GHS {{$plan->cedPrice}} </p>
                                <p><strong>South Africa: </strong> ZAR {{$plan->zarPrice}} </p>
                            </div>
                            <div class="right col-xs-2 text-center"><br><br>
                                <span class="fa fa-4x fa-certificate"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis pull-right">
                                <button type="button" class="btn btn-primary btn-xs planLoader" data-target="#planEditor" data-toggle="modal" data-id="{{$plan->id}}">
                                    <i class="fa fa-edit"> </i> Edit/Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal" id="planEditor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="" data-dismiss="modal"><div class="pull-right"><span class="fa fa-times"></span></div></a>
                    <h5>PLAN EDITOR</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="planBody">

                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
   @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif

@endsection
