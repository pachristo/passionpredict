<div class="container-fluid">
    <br>
    <div class="col-sm-4">
        @if($user->passport!=NULL)
            <img src="{{$path1}}{{$user->passport}}" class="img-rounded" style="max-height: 120px;">
        @elseif($user->avatar!=NULL)
            <img src="{{$user->avatar}}" class="img-rounded" style="max-height: 120px;">
        @else
            <img src="{{$path}}user.png" class="img-rounded" style="max-height: 120px;">
        @endif
    </div>
    <div class="col-sm-8">
        <h4>{{$user->full_name}} <br> <small>{{$user->email}} <br>
            @if($user->subscription_status==NULL || $user->subscription_status=='0')
            <span class="text-danger">NOT CURRENTLY SUBSCRIBED</span>
            @else
                <span class="text-success">CURRENTLY SUBSCRIBED</span><br>
                <b>EXPIRY DATE: </b> {{$user->next_due_date->format('l j M, Y - h:ia')}}
            @endif
            </small></h4>
    </div>

    <div class="col-md-12">
        <hr>
        <form action="{{url('/acctupgrade')}}" method="POST" id="acctupgradeform">
            <div class="form-group">
                <input name="userid" type="hidden" required value="{{$user->id}}">
                <label for="type">SUBSCRIPTION TYPE</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="">- SELECT SUBSCRIPTION TYPE -</option>
                    @foreach($subs as $sub)
                        <option value="{{$sub->id}}">{{$sub->category}} ({{$sub->planName}} - N{{number_format($sub->nairaPrice)}}/${{number_format($sub->dollarPrice)}}/KSH{{number_format($sub->keshPrice)}}/{{number_format($sub->cedPrice)}}GHS/{{number_format($sub->ugxPrice)}}UGX)</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="username">DATE SUBSCRIBED: *(YYYY-MM-DD)</label>
                <input class="form-control" name="datesub" type="text" value="{{\Carbon\Carbon::now()}}" required>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                <div id="upgradestatus"></div><br>
                <button class="btn btn-md btn-success" type="submit" id="upgradebtn">Save Changes</button>
            </div>
        </form>
    </div>

</div>

{{--<script>--}}
    {{--AnyTime.picker( "datee",--}}
            {{--{ format: "%Y-%m-%d", firstDOW: 1 } );--}}

    {{--AnyTime.picker( "dateee",--}}
            {{--{ format: "%Y-%m-%d", firstDOW: 1 } );--}}

    {{--$("#matchtime").AnyTime_picker(--}}
            {{--{ format: "%h:%i %p", firstDOW: 1 } );--}}
{{--</script>--}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('#acctupgradeform').submit(function (e) {
            e.preventDefault();
            $('#upgradestatus').html('Upgrading Account... Please wait');
            $('#upgradebtn').prop('disabled', true);
            var url = $(this).attr('action');

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#upgradebtn').prop('disabled', false);
                        $('#upgradestatus').html(data.encounters);
                    }
                    else{
                        alert(data.encounters);
                        $('#upgradebtn').prop('disabled', false);
                        $('#upgradestatus').html('');
                        $('#acctupgradeform')[0].reset();
                        $('#upgradeuser').modal('hide');
                    }
                }
            });
        });

    });
</script>