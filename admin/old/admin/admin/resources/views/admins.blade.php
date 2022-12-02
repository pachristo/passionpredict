@extends('layouts.master')

@section('title')
    Passion Predict  | ADMINSTRATIVE ACCOUNTS
@endsection
@section('page')
    All Administrators
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')
    <div class="col" style="min-height: 323px;">
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>FULL NAME</th>
                <th>USERNAME</th>
                <th>EMAIL ADDRESS</th>
                <th>OP KEY</th>
                <th>ROLE</th>

                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cont->all() as $a)

                <tr id="admin{{$a->id}}">
                    <td>{{$a->name}}</td>
                    <td>{{$a->username}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->operation_key}}</td>
                    <td>{{$a->category}}</td>
                    <td>
                        <a class="admincontrol" href="{{$a->id}}" data-target="#admincontrol" data-toggle="modal"><span style="color: green;"><span class="fa fa-cogs"></span> MANAGE</span></a>
                        <a class="trashAdmin" href="#" data-id="{{$a->id}}"><span style="color: red;"><span class="fa fa-trash"></span> DELETE</span></a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
@endsection
