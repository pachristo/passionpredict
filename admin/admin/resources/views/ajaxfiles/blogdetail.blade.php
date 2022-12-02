<div class="row">
    <div class="col-md-5">
        <img src="{{asset('images')}}/blog/{{$blog->display_image}}" class="img-responsive"><br>
        <table class="table">
            <tr>
                <th>DATE POSTED:</th>
                <td>{{\Carbon\Carbon::parse($blog->created_at)->format('l d M, Y')}}</td>
            </tr>
            <tr>
                <th>TIME POSTED:</th>
                <td>{{\Carbon\Carbon::parse($blog->created_at)->format('H:ia')}}</td>
            </tr>
            <tr>
                <th>CATEGORY:</th>
                <td>{{$blog->category}}</td>
            </tr>
            <tr>
                <th>STATUS:</th>
                <td>{{$blog->status}}ed</td>
            </tr>
        </table>
    </div>
    <div class="col md-7" style="padding: 0px 10px;">
        <h4>Title: {{$blog->title}}</h4>
        <hr>
        <div style="padding: 0px 10px; text-align: justify;">
            {!! $blog->content !!}
        </div>
    </div>
</div>