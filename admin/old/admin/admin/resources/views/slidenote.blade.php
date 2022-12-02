@extends('layouts.master')

@section('title')
    Passion Predict   | Notifications
@endsection
@section('page')
    New Notification
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')
    <div class="col" style="min-height: 323px;;">
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

        <form action="{{url('/slidenote')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-sm-8">
                        <label>ADs IMAGE</label>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 750px; height: 150px;"><img src="{{asset('images/upcoming.JPG')}}" alt="" /></div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 800px; height: 150px; line-height: 20px;"></div>
                            <div>
                <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE</span><span class="fileupload-exists">Change</span>
                <input type="file" name="file" required/></span>
                                <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8">
                        <input class="form-control" name="description" placeholder="Thumbnail Description here (if any)" maxlength="50">
                    </div>

                    {!! csrf_field() !!}
                    <div class="form-group col-md-4">
                        <button class="btn btn-md btn-success" name="submit" id="">UPLOAD NOW</button>
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
