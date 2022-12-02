<div class="row">
    <div class="col-sm-12">
        @if(count($images))
            <div class="row">
                <div class="col-sm-12" style="overflow-y: auto;">
                    @foreach($images as $key => $image)
                        <div class="col-sm-2" style="margin-bottom: 8px;" id="record{{$image->id}}">
                            <div class="panel panel-danger">
                                <div class="panel-body">
                                    <img src="{{$path}}gallery/{{$image->path}}" class="img-responsive" alt="">
                                </div>
                                <div class="panel-footer">
                                    <div class="btn-group">
                                        <p id="referCode{{$key}}" style="display: none;">{{$path}}gallery/{{$image->path}}</p>
                                        <button class="btn btn-xs btn-success" title="Copy Link" onclick="copyToClipboard('#referCode{{$key}}')"><i class="fa fa-link"></i> </button>
                                        <a href="{{route('/deleteImage')}}" class="deleteItem" data-id="{{$image->id}}" title="Delete" data-msg="ARE YOU SURE OF THIS?"><button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @if($key!=0 && $key%5==0)
                            <div class="clearfix"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <center>
                <br><br><br>
                <h3 class="text-danger"> <i class="fa fa-database fa-2x"></i> <br><br> NOTHING IN GALLERY YET</h3>
                <br><br>
            </center>
        @endif
    </div>
</div>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $(document).ready(function () {
        $('.deleteItem').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var id = $(this).attr('data-id');
            var msg = $(this).attr('data-msg');
            swal({
                title:msg,
                //text:'Click Ok to continue',
                type:'warning',
                showCancelButton:true,
                closeOnConfirm:false,
                showLoaderOnConfirm:true,
                confirmButtonColor:'#DD6B55',
                confirmButtonText:'Yes, delete it!'
            },function(){
                $.ajax({
                    type: "GET",
                    url: url+'/'+id,
                    success: function (data) {
                        $('#record'+id).hide();
                        swal('Item Deleted!','','success');
                    },
                    failure: function (data) {
                        alert("SOMETHING ISN'T RIGHT");
                        location.reload();
                    }
                });
            });
        });
    });
</script>