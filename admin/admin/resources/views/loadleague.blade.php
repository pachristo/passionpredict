@extends('layouts.master')

@section('title')
    Passion Predict   | Load Leagues
@endsection
@section('page')
    Leagues
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super' ||$persons->category=='Predictor')
    <div class="col" style="min-height: 323px;;">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>

        <form action="#" method="POST" id="newleague">
            <div class="row">
                <div class="form-group col-sm-6">
                    <input class="form-control" name="league" id="league" placeholder="LEAGUE NAME" required>
                </div>
                <div class="form-group col-sm-4">
                    <input class="form-control" name="short" id="short" placeholder="LEAGUE CODE e.g EPL" required>
                </div>

                {!! csrf_field() !!}

                <div class="form-group col-sm-2">
                    <button class="btn btn-md btn-success" name="submit" id="leaguebtn">ADD</button>
                </div>
                <div class="form-group col-xs-6" id="leaguestatus"></div>

            </div>
        </form>
        <hr>
        <div class="row">
            <div class="col-xs-12" id="existingleagues">
                <table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>LEAGUE</th>
                        <th>SHORT CODE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>

                        @php

                            $allleagues=\App\League::all();
                        @endphp
                    @foreach($allleagues as $key=> $league)
                    <tr id="{{$league->id}}">
                        <td>{{$league->id}}</td>
                        <td>{{$league->league}}</td>
                        <td>{{$league->code}}</td>
                        <td><a href="{{$league->id}}" class="trashleague">Delete</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif
@endsection
