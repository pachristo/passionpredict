<form action="{{url('/manageads')}}" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6 col-md-offset-1">
            <div class="form-group col-sm-6">
                <label>ADS TYPE</label>
                <select name="position" class="form-control" required>
                    <option value="Square" @if($ad->position=='Square') selected @endif>Square Banner</option>
                    <option value="Banner" @if($ad->position=='Banner') selected @endif>Banner (Inline)</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label>ADS LOCATION</label>
                <select name="location" class="form-control" required>
                    <option value="header" @if($ad->location=='header') selected @endif>Square Header Banner</option>
                    <option value="bFree" @if($ad->location=='bFree') selected @endif>Before Free Tips Banner</option>
                    <option value="uFree" @if($ad->location=='uFree') selected @endif>Under Free Tips Banner</option>
                    <option value="uLatest" @if($ad->location=='uLatest') selected @endif>Under Latest Winning Banner</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                <label>ADS PAGE</label>
                <select name="page" class="form-control" required>
                    <option value="All" @if($ad->page=='All') selected @endif>All Applicable</option>
                    <option value="Homepage" @if($ad->page=='Homepage') selected @endif>Homepage</option>
                </select>
            </div>

            <div class="form-group col-sm-8">
                <label>WEBSITE URL (if any)</label>
                <input class="form-control" name="url" placeholder="URL here" value="{{$ad->website}}">
            </div>

            <div class="form-group col-sm-12">
                <label>THUMBNAIL DESCRIPTION (if any)</label>
                <input class="form-control" name="description" placeholder="Description here" maxlength="50" value="{{$ad->description}}">
            </div>
    </div>
    <div class="col-md-4">
            <input type="hidden" name="id" value="{{$ad->id}}">
            <input type="hidden" name="image" value="{{$ad->ads_image}}">
        <div class="col-sm-8 col-md-offset-2">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 150px; height: 250px;"><img src="{{asset('images/ads')}}/{{$ad->ads_image}}" alt="" /></div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                <div>
                <span class="btn btn-sm btn-file btn-default"><span class="fileupload-new">SELECT IMAGE</span><span class="fileupload-exists">Change</span>
                <input type="file" name="file"/></span>
                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <center><button class="btn btn-sm btn-success">UPDATE ADVERT</button></center>

</div>
</form>
