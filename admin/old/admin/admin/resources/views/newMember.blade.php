@extends('layouts.master')

@section('title')
    Passion Predict   | CREATE NEW ACCOUNT
@endsection
@section('page')
    ADD NEW MEMBER
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')


    <div class="col" style="min-height: 323px;;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <br><br>
                    <form action="{{route('/newMember')}}" method="post" id="registerForm">
                        <div class="form-group form-group-lg col-sm-12">
                            <label for="">Full Name *</label>
                            <input type="text" class="form-control" name="fullName" required placeholder="full name here">
                        </div>
                        <div class="form-group form-group-lg col-sm-6">
                            <label for="">Email *</label>
                            <input type="email" class="form-control" name="email" required placeholder="email address" value="user@user.com">
                        </div>
                        <div class="form-group form-group-lg col-sm-6">
                            <label for="">Phone Number *</label>
                            <input type="text" class="form-control" name="phone" required placeholder="phone number">
                        </div>
                        <div class="form-group form-group-lg col-sm-6">
                            <label for="">Username *</label>
                            <input type="text" class="form-control" name="username" required placeholder="username">
                        </div>
                        <div class="form-group form-group-lg col-sm-6">
                            <label for="">Password *</label>
                            <input type="password" class="form-control" name="password" required placeholder="password">
                        </div>

                        <div class="form-group form-group-lg col-sm-6">
                            <label for="type">SUBSCRIPTION TYPE *</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="">- SELECT SUBSCRIPTION TYPE -</option>
                                @foreach($subs->all() as $sub)
                                    <option value="{{$sub->id}}">{{$sub->category}} : {{$sub->planName}} Plan ({{$sub->accessTime}})</option>
                                @endforeach
                            </select>
                        </div>

                        {{ csrf_field() }}

                        <div class="form-group form-group-lg col-sm-6">
                            <label for="username">DATE SUBSCRIBED: *(YYYY-MM-DD)</label>
                            <input class="form-control" name="datesub" type="text" value="{{\Carbon\Carbon::now()}}" required>
                        </div>

                        <div class="form-group form-group-lg col-sm-6">
                            <button class="btn btn-lg btn-success" id="registerBtn">SUBMIT</button>
                        </div>

                    </form>
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
