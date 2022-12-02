<table class="table">
    <tr>
        <td style="width: 40%; text-align: center;"><h3 class="cont">{{$game->teamone}}</h3></td>
        <td style="background: #b1f10c; color: red; text-align: center; width: 10%" valign="bottom">VS</td>
        <td style="width: 40%; text-align: center;"><h3 class="cont">{{$game->teamtwo}}</h3></td>
    </tr>
    <tr style="background: #b1f10c;">
        <td colspan="3"><strong>FULL TIME RECOMMENDATION:</strong> {{$game->ft_recommendation}} @if($game->ft_others!=NULL)
                ({{$game->ft_others}})
            @endif</td>
    </tr>
</table>
<hr>

<div class="container">
    <form action="#" method="POST" id="otherrec">
        <input type="hidden" name="id" value="{{$game->id}}">
        <div class="form-group col-md-12">
            <label>ADD OTHER PREDICTIONS</label>
            <textarea class="form-control" name="otherftrec" required placeholder="Type here...">{{$game->ft_others}}</textarea>
        </div>

        {!! csrf_field() !!}

        <div id="otherstatus" class="col-xs-6"></div>
        <div class="form-group col-sm-12">
            <button class="btn btn-md btn-success" name="submit" id="submitother">SAVE/DONE</button>
        </div>
    </form>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#otherrec').submit(function (e) {
            e.preventDefault();
            var id = "{{$game->id}}";
            $('#otherstatus').html('Updating... Please wait');
            $('#submitother').prop('disabled', true);

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "ajaxotherft",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitother').prop('disabled', false);
                        $('#otherstatus').html(data.encounters);
                        console.log(data);
                    }
                    else{
                        $('#f'+id).css('color', 'green').html('Update Successful');
                        alert('UPDATE SUCCESSFUL');
                        $('#other'+data.encounters).html('('+data.text+')');
                        $('#addft').modal('hide');
                    }
                }
            });

        });
    });
</script>