<div class="container-fluid">
    <br>
            <div class="col-md-6">
                <form action="#" method="POST" id="userinfoform">
                <div class="form-group">
                    <input name="userid" type="hidden" required value="{{$user->id}}">

                    <label for="duedate">FULL NAME</label>
                    <input id="duedate" class="form-control" name="name" type="text" required value="{{$user->full_name}}">
                </div>

                <div class="form-group">
                    <label for="username">USERNAME</label>
                    <input id="username" class="form-control" name="username" type="text" value="{{$user->username}}">
                </div>

                <div class="form-group">
                    <label for="email">EMAIL ADDRESS</label>
                    <input id="email" class="form-control" name="email" type="email" required value="{{$user->email}}">
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div id="infosettingstatus"></div><br>
                    <button class="btn btn-md btn-success" type="submit" id="submitinfosetting">Save Changes</button>
                </div>
                </form>
            </div>

            <div class="col-md-6">
                <h4 style="margin-top: 7px;">CHANGE USER PASSWORD</h4><hr>
                <form action="#" method="POST" id="userpassword">
                <div class="form-group">
                    <input name="userid" type="hidden" required value="{{$user->id}}">

                    <label for="acctstatus">NEW PASSWORD</label>
                    <input id="acctstatus" class="form-control" name="newpass" type="text" required placeholder="NEW PASSWORD">
                </div>

                <div class="form-group">
                    <label for="status">CONFIRM PASSWORD</label>
                    <input id="status" class="form-control" name="confirmpass" type="text" required placeholder="CONFIRM NEW PASSWORD">
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div id="passwordsettingstatus"></div><br>
                    <button class="btn btn-md btn-success" type="submit" id="submitpasswordsetting">Update Password</button>
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
            $('#infosettingstatus').html('Updating... Please wait');
            $('#submitinfosetting').prop('disabled', true);

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "ajaxuserinfo",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitinfosetting').prop('disabled', false);
                        $('#infosettingstatus').html(data.encounters);
                        console.log(data);
                    }
                    else{
                        alert(data.encounters);
                        $('#submitinfosetting').prop('disabled', false);
                        $('#infosettingstatus').html(data.encounters);
//                        $('#updateuserinfo').modal('hide');
                    }
                }
            });
        });

        $('#userpassword').submit(function (e) {
            e.preventDefault();
            $('#passwordsettingstatus').html('Updating... Please wait');
            $('#submitpasswordsetting').prop('disabled', true);

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "ajaxuserpassword",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitpasswordsetting').prop('disabled', false);
                        $('#passwordsettingstatus').html(data.encounters);
                    }
                    else{
                        alert(data.encounters);
                        $('#submitpasswordsetting').prop('disabled', false);
                        $('#passwordsettingstatus').html(data.encounters);
//                        $('#updateuserinfo').modal('hide');
                    }
                }
            });
        });


    });
</script>