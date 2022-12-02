@if(isset($edit))
    <div class="col-sm-12">
        <form action="{{route('/promotions')}}" method="post" id="addPromotion">
            <div class="form-group col-sm-12">
                <label for="">PROMOTION TITLE:</label>
                <input type="hidden" name="id" value="{{$prom->id}}">
                <input type="text" required name="title" value="{{$prom->title}}" class="form-control" placeholder="provide title here">
            </div>
            <div class="form-group col-sm-12">
                <label for="">PROMOTION DETAILS</label>
                <textarea name="details" id="" class="form-control" required cols="30" rows="10" placeholder="to add an image, click on the image icon located towards right above and select the image...">{!! $prom->details !!}</textarea>
            </div>
            <div class="form-group col-sm-4">
                <label for="">PUBLISH ON:</label>
                <input type="text" required name="publishOn" class="form-control" value="{{\Carbon\Carbon::parse($prom->publishOn)->format('d-m-Y h:ia')}}">
            </div>
            <div class="form-group col-sm-4">
                <label for="">PUBLISH STATUS:</label>
                <select name="publishStatus" required class="form-control" id="">
                    <option value="{{$prom->publishStatus}}">@if($prom->publishStatus=='1') On Specified Date @else Draft @endif</option>
                    <option value="1">On Specified Date</option>
                    <option value="0">Save Draft</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="">ACCESSIBLE TO:</label>
                <select name="accessible" required class="form-control" id="">
                    <option value="{{$prom->accessible}}">{{$prom->accessible}}</option>
                    <option value="All">All Visitors</option>
                    <option value="Registered">Registered Members</option>
                    <option value="Subscribed">Subscribed & Lapsed Members</option>
                </select>
            </div>
            {{ csrf_field() }}
            <div class="form-group col-sm-12">
                <span id="promotionStatus"></span>
                <button class="btn btn-md btn-success pull-right" id="promotionBtn">SAVE PROMOTION</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('textarea').summernote({
                minHeight :  250
            });

            $('#addPromotion').submit(function (e) {
                e.preventDefault();
                $('#promotionBtn').prop('disabled', true).html('SAVNG PROMOTION');
                $('#promotionStatus').html('');
                var url = $(this).attr('action');

                var dataString = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    dataType: "JSON",
                    success: function(data){
                        if (data.status == 1) {
                            $('#promotionBtn').prop('disabled', false).html('SAVE PROMOTION');
                            $('#promotionStatus').html(data.encounters);
                        }
                        else{
                            $('#addPromotion')[0].reset();
                            $('#promotionBtn').prop('disabled', false).html('SAVE PROMOTION');
                            $('#promotionStatus').html('PROMOTION SAVED');
                        }
                    }
                });
            });
        });
    </script>
@else
    <div class="col-sm-12">
        {!! $prom->details !!}
    </div>
@endif