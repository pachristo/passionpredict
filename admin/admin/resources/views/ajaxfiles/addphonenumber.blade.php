<div class="container-fluid text-center">
    <br>
            <div class="col-md-12 text-center">
                <form action="#" method="POST" id="userinfoform">
                <div class="form-group  col-sm-4">
                    <input name="userid" type="hidden" required value="{{$user->id}}">
                    <input name="name" type="hidden" required value="{{$user->full_name}}">

                    <label for="duedate">COUNTRY CODE</label>
                    @include('layouts.ajax_country_list')
                </div>

                <div class="form-group col-sm-4">
                    <label for="username">PHONE NUMBER</label>
                    <input id="username" class="form-control" name="phone" type="text" value="{{$user->phone}}">
                </div>

               
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group col-sm-4">
                    <div id="infosettingstatus"></div><br>
                    <button class="btn btn-md btn-success" type="submit" id="submitinfosetting">Add</button>
                </div>
                </form>
            </div>

           
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('#userinfoform').submit(function (e) {
            e.preventDefault();
            $('#submitinfosetting').html('Updating... Please wait');
            // $('#').prop('disabled', true);

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "AddPhone",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitinfosetting').prop('disabled', false);
                        //$('#infosettingstatus').html(data.encounters);
                        console.log(data);
                    }
                    else{
                        //alert(data.encounters);
                        $('#submitinfosetting').prop('disabled', false);
                        $('#submitinfosetting').html('Add');
                        swal('PHONE NUMBER SUCCESSFULLY ACTIVATED',data.encounters,'success');
//                        $('#updateuserinfo').modal('hide');
                    }
                }
            });
        });

      
    });
</script>