@extends('layouts.master')

@section('title')
    Passion Predict   | ADVERTISEMENTS
@endsection
@section('page')
    Manage Ads
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')

    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        @if(isset($success))
            <script>
                alert('{{$success}}');
            </script>
        @endif
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>REL</th>
                <th>TYPE</th>
                <th>POSITION</th>
                <th>SHOW ON</th>
                <th>LINK URL</th>
                <th>DISPLAY</th>

                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ads->all() as $ad)
                <tr id="d{{$ad->id}}">
                    <td class="red">{{$ad->id}}</td>
                    <td>{{$ad->position}}</td>
                    <td>
                        @if($ad->location=='header')
                            Square Header Banner
                        @elseif($ad->location=='bFree')
                            Before Free Tips Banner
                        @elseif($ad->location=='bFreeAuto')
                            Before Free Tips Banner (Automatic)
                        @elseif($ad->location=='uFree')
                            Under Free Tips Banner
                        @elseif($ad->location=='uLatestNews')
                            Under Latest News
                        @elseif($ad->location=='uUpcoming')
                            Under Upcoming Tips Banner
                        @elseif($ad->location=='uLatest')
                            Under Latest Winning Banner
                        @elseif($ad->location=='sticky')
                            Bottom Sticky Banner
                        @endif
                    </td>
                    <td>{{$ad->page}}</td>
                    <td>{{$ad->website}}</td>
                    <td>
                        @if($ad->other=='1')
                            Hide on PC/Show Mobile
                        @elseif($ad->other=='2')
                            Hide on Mobile/Show PC
                        @else
                            Show on All
                        @endif
                    </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                {{--<li style="cursor: pointer;"><a class="updateads" href="{{$ad->id}}" data-target="#updateads" data-toggle="modal">EDIT/UPDATE</a>--}}


                                @if($ad->status=='0')
                                    <li style="cursor: pointer;"><a class="hidead" href="{{$ad->id}}" id="h{{$ad->id}}">HIDE THIS</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhidead" href="{{$ad->id}}" id="h{{$ad->id}}"><span style="color: green;">SHOW THIS</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="adsdelete" href="{{route('/adDelete')}}" data-id="{{$ad->id}}">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
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
