@extends('layouts.master')

@section('title')
    Passion Predict  | CREATE PROMOTIONS
@endsection
@section('page')
    Promotions
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')
    <div class="col" style="min-height: 323px;;">
        <br>
        {{--        {{date('Y-m-d H:i:s', strtotime('29-08-2017 01:46pm'))}}--}}
        <a href="{{route('/promotions')}}"><button class="btn btn-md btn-success pull-right">MANAGE PROMOTIONS</button></a>

        <hr>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('/promotions')}}" method="post" id="addPromotion">
                    <div class="form-group col-sm-12">
                        <label for="">PROMOTION TITLE:</label>
                        <input type="text" required name="title" class="form-control" placeholder="provide title here">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="">PROMOTION DETAILS</label>
                        <textarea name="details" id="" class="form-control" required cols="30" rows="10" placeholder="to add an image, click on the image icon located towards right above and select the image..."></textarea>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">PUBLISH ON:</label>
                        <input type="text" required name="publishOn" class="form-control" placeholder="{{Carbon\Carbon::now()}}" value="{{\Carbon\Carbon::now()->format('d-m-Y h:ia')}}">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">PUBLISH STATUS:</label>
                        <select name="publishStatus" required class="form-control" id="">
                            <option value="">--Select Here -- </option>
                            <option value="1">On Specified Date</option>
                            <option value="0">Save Draft</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">ACCESSIBLE TO:</label>
                        <select name="accessible" required class="form-control" id="">
                            <option value="">--Select Audience -- </option>
                            <option value="All">All Visitors</option>
                            <option value="Registered">Registered Members</option>
                            <option value="Subscribed">Subscribed & Lapsed Members</option>
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group col-sm-12">
                        <span id="promotionStatus"></span>
                        <button class="btn btn-md btn-success pull-right" id="promotionBtn">SAVE PROMOTION</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 @else

        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif

@endsection
