@extends('layouts.master')

@section('title')
    Passion Predict   | SLIDER MANAGER
@endsection
@section('page')
    Slider Manager
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

            <div class="row">
                    <div class="col-md-6">
                        <form action="{{url('/sliderManager')}}" method="POST" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <label>SLIDER IMAGE</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 440px; height: 200px;"><img src="{{asset('images/sliderDummy.JPG')}}" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE</span><span class="fileupload-exists">Change</span>
                                     <input type="file" name="file" required/></span>
                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>

                            {!! csrf_field() !!}
                            <div class="form-group">
                                <button class="btn btn-md btn-success" name="submit" id="">UPLOAD IMAGE</button>
                            </div>
                        </div>
                      </form>

                    </div>

                <div class="col-md-6">
                    <h4>EXISTING IMAGES</h4>
                    <hr>
                    <table class="table table-responsive">
                        <?php
                            $data = App\Slider::where('status', '0')->get()->sortByDesc('id');
                        ?>
                        @if(count($data)>0)
                            @foreach($data->all() as $item)
                                <tr id="slider{{$item->id}}">
                                <td><img src="{{$path2}}/slider/{{$item->path}}" alt="" class="img-responsive"></td>
                                <td>
                                    {{--@if($item->status=='0')--}}
                                        {{--<button class="btn btn-xs btn-warning">Hide This</button>--}}
                                    {{--@else--}}
                                        {{--<button class="btn btn-xs btn-warning">Unhidden</button>--}}
                                    {{--@endif--}}
                                    <button class="btn btn-xs btn-danger trashSlide" data-id="{{$item->id}}">Trash This</button>
                                </td>
                                </tr>
                            @endforeach
                        @else
                            <h3><center>Nothing to Show</center></h3>
                        @endif
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
