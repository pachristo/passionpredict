@extends('layouts.master')

@section('title')
    Passion Predict   | Advertisement
@endsection
@section('page')
    New Ads
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')

    <div class="col">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        @if(isset($success))
            <script>
                alert('{{$success}}');
            </script>
        @endif

        <form action="{{route('/newAdwords')}}" method="POST" id="adwordsForm">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">250 by 250 Adword Code</label>
                        <textarea name="a250by250" id="" cols="30" rows="2" class="form-control">{!! $ads->a250by250 !!}</textarea>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">250 by 200 Adword Code</label>
                        <textarea name="a200by200" id="" cols="30" rows="2" class="form-control">{!! $ads->a200by200 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">468 by 60 Adword Code</label>
                        <textarea name="a468by60" id="" cols="30" rows="2" class="form-control">{!! $ads->a468by60 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">728 by 90 Adword Code</label>
                        <textarea name="a728by90" id="" cols="30" rows="2" class="form-control">{!! $ads->a728by90 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">300 by 250 Adword Code</label>
                        <textarea name="a300by250" id="" cols="30" rows="2" class="form-control">{!! $ads->a300by250 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">320 by 100 Adword Code</label>
                        <textarea name="a320by100" id="" cols="30" rows="2" class="form-control">{!! $ads->a320by100 !!}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="">336 by 280 Adword Code</label>
                        <textarea name="a336by280" id="" cols="30" rows="2" class="form-control">{!! $ads->a336by280 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">120 by 600 Adword Code</label>
                        <textarea name="a120by600" id="" cols="30" rows="2" class="form-control">{!! $ads->a120by600 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">160 by 600 Adword Code</label>
                        <textarea name="a160by600" id="" cols="30" rows="2" class="form-control">{!! $ads->a160by600 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">160 by 600 Adword Code</label>
                        <textarea name="a160by600" id="" cols="30" rows="2" class="form-control">{!! $ads->a300by600 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">970 by 90 Adword Code</label>
                        <textarea name="a970by90" id="" cols="30" rows="2" class="form-control">{!! $ads->a970by90 !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">320 by 50 Adword Code</label>
                        <textarea name="a320by50" id="" cols="30" rows="2" class="form-control">{!! $ads->a320by50 !!}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-md btn-success" id="adwordBtn">SAVE CODES</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif

@endsection
