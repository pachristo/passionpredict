<ul class="list-unstyled timeline">
    @if(count($data1)<1)
        <center>
            <h4>Nothing to show Yet!</h4>
        </center>
    @else
    @foreach($data1->all() as $item1)
        <li id="fd{{$item1->id}}">
            <div class="block">
                <div class="tags">
                    <a href="" class="tag">
                        <span>#{{$item1->id}}</span>
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
                                        @if($item1->approve==0)
                                            <a role="menuitem" tabindex="-1" class="approveFeed" href="#" data-id="{{$item1->id}}">Approve/Publish</a>
                                        @else
                                            <a role="menuitem" tabindex="-1" class="disapproveFeed" href="#" data-id="{{$item1->id}}">Disapprove/Unpublish</a>
                                        @endif
                                    </li>
                                    <li role="presentation"><a role="menuitem" data-id="{{$item1->id}}" tabindex="-1" href="#" class="trashFeed">Trash This</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </h2>
                    <p class="excerpt">
                    {!! $item1->feedback !!}
                    <hr style="margin: 4px 0px 4px 0px;">
                                    <span class="text-danger">
                                        <a class="userdetails text-danger" href="{{$item1->userID}}" data-target="#userdetails" data-toggle="modal">{{$item1->name}} - {{$item1->country}}</a>
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
