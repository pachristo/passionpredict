<table class="table">
    <tr>
        <td style="width: 40%; text-align: center;"><h3 class="cont">{{$game->teamOne}} <br><small>{{$game->teamOneScore}}</small></h3></td>
        <td style="background: #b1f10c; color: red; text-align: center; width: 10%" valign="bottom">VS</td>
        <td style="width: 40%; text-align: center;"><h3 class="cont">{{$game->teamTwo}} <br><small>{{$game->teamTwoScore}}</small></h3></td>
    </tr>
</table>
<hr>

<div class="container">
<form action="{{route('/ajaxTestimonial')}}" method="POST" id="testimonial">
    <input type="hidden" name="id" value="{{$game->id}}">
    <div class="form-group col-md-12">
        <label>SELECT POTENTIAL PREDICTION</label>
        <select name="potential" class="form-control" required>
            <option value="">Select here...</option>
            <option value="{{$game->FTRecommendation}}"><b>Full-Time Recommendation</b> : {{$game->FTRecommendation}}</option>
            @if($game->regularTips=='Yes')<option value="{{$game->regularTipsValue}}"><b>Regular Tips</b> : {{$game->regularTipsValue}}</option> @endif
            @if($game->customTips=='Yes')<option value="{{$game->customTipsValue}}"><b>Custom Tips</b> : {{$game->customTipsValue}}</option> @endif
            @if($game->weekendTips=='Yes')<option value="{{$game->weekendTipsValue}}"><b>Weekend Tips</b> : {{$game->weekendTips}}</option> @endif
            <option value="{{$game->oneFiveGoals}}"><b>Over 1.5</b> : {{$game->oneFiveGoals}}</option>
            <option value="{{$game->doubleChance}}"><b>Double Chance</b> : {{$game->doubleChance}}</option>
            <option value="{{$game->twoFiveGoals}}"><b>2.5 Goals</b> : {{$game->twoFiveGoals}}</option>
     
            <option value="{{$game->BTTS}}"><b>BTTS/GG</b> : {{$game->BTTS}}</option>
          
            <option value="{{$game->BigOdds}}"><b>Big Odds</b> : {{$game->BigOdds}}</option>
        </select>
    </div>
    
    {!! csrf_field() !!}

    <div id="teststatus" class="col-xs-6"></div>
    <div class="form-group col-sm-12">
        <button class="btn btn-md btn-success" name="submit" id="submittest">SAVE/DONE</button>
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
        $('#testimonial').submit(function (e) {
            e.preventDefault();
            var id = "{{$game->id}}";
            $('#submittest').prop('disabled', true).html('SAVING');
            var url = $(this).attr('action');

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submittest').prop('disabled', false).html('SAVE/DONE');
                        swal(data.encounters, '', 'warning');
                        console.log(data);
                    }
                    else{
                        $('#f'+id).css('color', 'green').html('Marked Testimonial');
                        swal(data.encounters, '', 'success');
                        $('#marktest').modal('hide');
                    }
                }
            });

        });
    });
</script>