@extends('layouts.master')

@section('title')
    Passion Predict   | BLOGGER
@endsection
@section('page')
    New Blog Post
@endsection
@section('content')
    <div class="col" style="">
        <br><br>
        @if(isset($success))
            <script>
                alert('{{$success}}');
            </script>
        @endif
        <form method="POST" action="{{route('/newBlog')}}" id="blogForm" enctype="multipart/form-data">

            <div class="row" style="margin-top: -20px;">
                <div class="col-md-8">
                    <div class="form-group col-sm-12">
                        <label>BLOG TITLE *</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>CATEGORY *</label>
                        <select class="form-control" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Preview">Match Preview</option>
                            <option value="Sport News">Sport News</option>
                            <option value="Updates">Website Updates</option>
                            <option value="Notifications">Notification</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12">
                        <label>PUBLISH STATUS *</label>
                        <select class="form-control" name="status" required>
                            <option value="Publish">Publish Now</option>
                            <option value="Draft">Save as Draft</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="col-sm-12">
                        <div class="input-field col-md-12">
                            <label>COVER IMAGE (600px X 400px) *</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{asset('images/demoUpload.jpg')}}" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE </span><span class="fileupload-exists">Change</span>
                <input type="file" name="file" required/></span>
                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! csrf_field() !!}

                </div>
                <div class="col-sm-12">
                    <div class="form-group col-sm-12">
                        <label for="moreoption">BLOG CONTEXT *</label>
                        <textarea name="content" id="textarea" class="form-control"></textarea>
                    </div>

                    <div class="form-group col-sm-12">
                        <button class="btn btn-md btn-success" name="submit" id="blogBtn">SUBMIT POST</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

