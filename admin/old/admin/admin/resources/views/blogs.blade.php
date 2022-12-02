@extends('layouts.master')

@section('title')
    Passion Predict  | BLOGS
@endsection
@section('page')
    ALL BLOG POSTS
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br><br>
        @if(isset($success))
            <script>
                alert('{{$success}}');
            </script>
        @endif
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>SN</th>
                <th>BY</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>Details</th>
                <th>Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    $sn = 0;
            ?>
            @foreach($blogs->all() as $blog)
                <?php
                $sn++;
                $creator = App\System::find($blog->creator);
                ?>
                <tr id="b{{$blog->id}}">
                    <td class="red">{{$sn}}</td>
                    <td><a class="creatorview" href="{{$creator->id}}" data-target="#creator" data-toggle="modal"><span style="color: brown;">{{$creator->name}}</span></a></td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->category}}</td>
                    {{--<td>{!! str_limit($blog->content, $limit=50, $end='...') !!}</td>--}}

                    <td><a class="blogview" href="{{$blog->id}}" data-target="#blogdetail" data-toggle="modal"><span style="color: green;"><span class="fa fa-eye"></span> VIEW</span></a></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu" style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                <li style="cursor: pointer;"><a class="updateblog" href="{{$blog->id}}" data-target="#updateblog" data-toggle="modal">EDIT/UPDATE</a>


                                @if($blog->status=='Publish')
                                    <li style="cursor: pointer;"><a class="hidethis" href="{{$blog->id}}" id="h{{$blog->id}}">UNPUBLISH THIS</a>
                                @else
                                    <li style="cursor: pointer;"><a class="unhidethis" href="{{$blog->id}}" id="h{{$blog->id}}"><span style="color: green;">PUBLISH THIS</span></a>
                                @endif

                                <li style="cursor: pointer;"><a class="blogdelete" href="{{route('/ajaxblogdelete')}}" data-id="{{$blog->id}}">DELETE</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$blogs->render()}}
    </div>
@endsection
