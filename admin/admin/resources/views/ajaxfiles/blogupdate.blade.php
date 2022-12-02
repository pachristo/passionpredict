<div class="row">
    <div class="col-md-12">
        <form action="{{route('/ajaxBlogUpdate')}}/{{$blog->id}}/{{$blog->display_image}}" method="POST" id="updateBlogForm" enctype="multipart/form-data">
            <div class="col-sm-8">
                <div class="form-group col-sm-12">
                    <input type="hidden" name="id" value="{{$blog->id}}">
                    <label>BLOG TITLE</label>
                    <input type="text" name="title" class="form-control" required value="{{$blog->title}}">
                </div>
                <div class="form-group col-sm-12">
                    <label>CATEGORY</label>
                    <select class="form-control" name="category" required>
                        <option value="{{$blog->category}}">{{$blog->category}}</option>
                        <option value="Sport News">Sport News</option>
                        <option value="Updates">Website Updates</option>
                        <option value="Notification">Notification</option>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                    <label>PUBLISH STATUS</label>
                    <select class="form-control" name="status" required>
                        <option value="{{$blog->status}}">{{$blog->status}}</option>
                        <option value="Publish">Publish Now</option>
                        <option value="Draft">Save as Draft</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <label>COVER IMAGE (600px X 400px)</label>
                <div class="input-field col-md-12">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 160px; height: 150px;">
                            <img src="
                                    @if($blog->display_image!=NULL)
                            {{asset('images')}}/blog/{{$blog->display_image}}
                            @else
                            {{asset('images/demoUpload.jpg')}}
                            @endif
                                    " alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT DP</span><span class="fileupload-exists">Change</span>
                <input type="file" name="file" /></span>
                            <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <label for="moreoption">BLOG CONTEXT</label>
                <textarea name="content" id="moreoption" class="form-control">{!! $blog->content !!}</textarea>
            </div>

            {!! csrf_field() !!}

            <div class="form-group col-sm-12">
                <div id="blogstatus"></div>
                <button class="btn btn-md btn-success" name="submit" id="blogBtn">SAVE UPDATES</button>
            </div>
        </form>
</div>
<script>
    $(document).ready(function() {
        $('textarea').summernote({
            minHeight :  250
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#updateBlogForm').submit(function (e) {
            e.preventDefault();
            $('#blogBtn').prop('disabled', true).html("SAVING UPDATES...");
            var url = $(this).attr('action');
            var dataString = new FormData($(this)[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                processData: false,
                contentType: false,
                async: true,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#blogBtn').prop('disabled', false).html("SAVE UPDATES");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        $('#blogBtn').prop('disabled', false).html("SAVE UPDATES");
                        swal("POST UPDATED SUCCESSFULLY", '', 'success');
                    }
                },
                error: function (e, status) {
                    if (e.status == 500)
                        $('#blogBtn').prop('disabled', false).html("SAVE UPDATES");
                    swal('Something is broken!','','warning');
                }
            });

        });
    });
</script>
