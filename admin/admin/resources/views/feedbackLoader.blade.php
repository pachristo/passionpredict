@extends('layouts.master')

@section('title')
    Passion Predict   | FEEDBACK MANAGER
@endsection

@section('page')
    Feedback Manager
@endsection

@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super' || $persons->category=='General')


    <div class="col" style="min-height: 323px;;">

        <div class="row">
            <div class="col-sm-12">
                <div class="col-md-6 col-sm-6 col-xs-12" style="max-height: 340px; overflow: auto;">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Unfiltered Feedbacks</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled timeline">
                        @if(count($data)<1)
                            <center>
                                <h4>Nothing to show Yet!</h4>
                            </center>
                        @else
                        @foreach($data->all() as $item)
                        <li id="fd{{$item->id}}">
                            <div class="block">
                                <div class="tags">
                                    <a href="" class="tag">
                                        <span>#{{$item->id}}</span>
                                    </a>
                                </div>
                                <div class="block_content">
                                    <h2 class="title">
                                        <ul class="nav nav-pills" role="tablist">
                                            <li role="presentation" class="dropdown">
                                                <a id="drop4" href="#" class="dropdown-toggle btn-sm bg-green" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                    Control Menu
                                                    <span class="caret"></span>
                                                </a>
                                                <ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                                                    <li role="presentation">
                                                        @if($item->approve==0)
                                                            <a role="menuitem" tabindex="-1" class="approveFeed" href="#" data-id="{{$item->id}}">Approve/Publish</a>
                                                            @else
                                                            <a role="menuitem" tabindex="-1" class="disapproveFeed" href="#" data-id="{{$item->id}}">Disapprove/Unpublish</a>
                                                            @endif
                                                    </li>
                                                    <li role="presentation"><a role="menuitem" data-id="{{$item->id}}" tabindex="-1" href="#" class="trashFeed">Trash This</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </h2>
                                    <p class="excerpt">
                                        {!! $item->feedback !!}
                                        <hr style="margin: 4px 0px 4px 0px;">
                                    <span class="text-danger">
                                        <a class="userdetails text-danger" href="{{$item->userID}}" data-target="#userdetails" data-toggle="modal">{{$item->name}} - {{$item->country}}</a>
                                        <span class="text-info">
                                        </span>
                                    </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                            @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>

                <div class="col-md-6 col-sm-6 col-xs-12" style="max-height: 340px; overflow: auto;">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Filtered Feedbacks</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="approvedF">

                </div>
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


