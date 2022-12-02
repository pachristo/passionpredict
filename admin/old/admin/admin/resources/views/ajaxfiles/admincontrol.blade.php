<div class="row">
    <div class="col-md-6">
        <h4>Change Password</h4>
        <form action="#" method="POST" id="changeadminpassword">
            <div class="form-group col-md-12">
                <input name="id" type="hidden" value="{{$admin->id}}">
                <input class="form-control" type="password" name="newpass" required placeholder="New Password">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="password" name="newpass1" required placeholder="Confirm New Password">
            </div>

            {!! csrf_field() !!}

            <div id="passwordstatus" class="col-xs-12"></div>
            <div class="form-group col-md-12">
                <hr style="margin: 13px 0px;">
                <button class="btn btn-md btn-success" name="submit" id="submitpassword">UPDATE</button>
            </div>

        </form>
    </div>

    <div class="col-md-6">
        <h4>Controls</h4>
        <form action="#" method="POST" id="asettingform">
            <div class="form-group col-md-12">
                <input name="id" type="hidden" value="{{$admin->id}}">
                <select name="role" class="form-control" required>
                    <option value="{{$admin->category}}">{{$admin->category}}</option>
                    <option value="Super">Super</option>
                    <option value="General">General</option>
                    <option value="Predictor">Predictor</option>
                    <option value="Blogger">Blogger</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <input type="radio" name="enable" value="0" @if($admin->status=='0')checked @endif> Enable
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="enable" value="1" @if($admin->status=='1')checked @endif> Disable
            </div>
            {!! csrf_field() !!}

            <div id="controlstatus" class="col-xs-12"></div>
            <div class="form-group col-md-12">
                <hr>
                <button class="btn btn-md btn-success" name="submit" id="submitcontrol">UPDATE</button>
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
        $('#changeadminpassword').submit(function (e) {
            e.preventDefault();
            $('#passwordstatus').html('Updating... Please wait');
            $('#submitpassword').prop('disabled', true);

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "ajaxupdatepassword",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitpassword').prop('disabled', false);
                        $('#passwordstatus').html(data.encounters);
                        console.log(data);
                    }
                    else{
                        alert(data.encounters);
                        $('#admincontrol').modal('hide');
                    }
                }
            });

        });

        $('#asettingform').submit(function (e) {
            e.preventDefault();
            $('#controlstatus').html('Updating... Please wait');
            $('#submitcontrol').prop('disabled', true);

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "ajaxupdatecontrol",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitcontrol').prop('disabled', false);
                        $('#controlstatus').html(data.encounters);
                        console.log(data);
                    }
                    else{
                        alert(data.encounters);
                        $('#admincontrol').modal('hide');
                    }
                }
            });

        });
    });
</script>