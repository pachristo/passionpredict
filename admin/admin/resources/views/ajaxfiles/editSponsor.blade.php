<form action="{{route('/postEditSponsor')}}/{{$i->id}}" method="post" id="editSponsorForm">
    <div class="form-group col-sm-12">
        <label for="">Sponsor Name *</label>
        <input type="text" name="sponsorName" value="{{$i->sponsorName}}" required class="form-control">
    </div>
    <div class="form-group col-sm-12">
        <label for="">Sponsor Website Link *</label>
        <input type="url" name="sponsorUrl" required value="{{$i->sponsorUrl}}" class="form-control">
    </div>
    <div class="form-group col-sm-12">
                    <label>*SELECT COUNTRIES</label>
                    <select class="form-control" name="country">
                       @if($i->country!='')  <option  value="{{$i->country}}" selected>{{$i->country}}</option> @endif
                         @include('layouts.main_country_list')

                    </select>
                 
                 </div>
    <div class="form-group col-sm-12">
        <select name="publishStatus" required class="form-control" >
            <option value="0" @if($i->publishStatus=='0') selected @endif>Publish</option>
            <option value="1" @if($i->publishStatus=='1') selected @endif>Draft</option>
        </select>
    </div>
    {{ csrf_field() }}
    <div class="form-group col-sm-4">
        <button class="btn btn-md btn-success" id="sponsorEditBtn"><i class="fa fa-arrow-circle-o-right"></i> SAVE SPONSOR</button>
    </div>
</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#editSponsorForm').submit(function (e) {
            e.preventDefault();
            $('#sponsorEditBtn').prop('disabled', true).html('SAVING SPONSOR');
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#sponsorEditBtn').prop('disabled', false).html('SAVE SPONSOR');
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        swal('UPDATED SUCCESSFUL', '', 'success');
                        $('#editSponsor').modal('hide');
                        location.reload();
                    }
                }
            });

        });
    });
</script>