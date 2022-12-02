@extends('layouts.master')

@section('title')
    Passion Predict   | Screen Shots
@endsection
@section('page')
    Tstimonial Shots
@endsection
@section('content')
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

        <div class="row">
            <div class="col-md-6">
                <form action="{{url('/shotManager')}}" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="fileupload fileupload-new form-group col-sm-6" data-provides="fileupload">
                            <label>SCREENSHOT</label>
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{asset('images/shotDummy.JPG')}}" alt="" /></div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                    <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE</span><span class="fileupload-exists">Change</span>
                                     <input type="file" name="file" required/></span>
                                <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="desc">SHORT STATEMENT</label>
                            <textarea name="desc" id="desc" cols="30" rows="6" class="form-control" maxlength="250"></textarea>
                        </div>

                        {!! csrf_field() !!}
                        <div class="form-group">
                            <button class="btn btn-md btn-success" name="submit" id="">SAVE CAST</button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-md-6">
                <h4>EXISTING CASTS</h4>
                <hr>
                <table class="table table-responsive">
                    <?php
                    $data = App\Shot::where('status', '0')->get()->sortByDesc('id');
                    ?>
                    @if(count($data)>0)
                        @foreach($data->all() as $item)
                            <tr id="munch{{$item->id}}">
                                <td><img src="{{$path2}}/munch/{{$item->path}}" alt="" class="img-responsive"><br>{!! $item->desc !!}</td>
                                <td>
                                    {{--@if($item->status=='0')--}}
                                    {{--<button class="btn btn-xs btn-warning">Hide This</button>--}}
                                    {{--@else--}}
                                    {{--<button class="btn btn-xs btn-warning">Unhidden</button>--}}
                                    {{--@endif--}}
                                    <button class="btn btn-xs btn-danger trashMunch" data-id="{{$item->id}}">Trash This</button>
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


@endsection
