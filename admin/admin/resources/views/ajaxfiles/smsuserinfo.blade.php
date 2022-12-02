<div class="container-fluid">
    <br>
    <div class="col-sm-6">
        @if($user->passport!=NULL)
            <img src="{{$path1}}{{$user->passport}}" class="img-rounded" style="max-height: 120px;">
        @elseif($user->avatar!=NULL)
            <img src="{{$user->avatar}}" class="img-rounded" style="max-height: 120px;">
        @else
            <img src="{{$path}}user.png" class="img-rounded" style="max-height: 120px;">
        @endif
        <table class="table table-striped table-hover">
            <tr>
                <th> SUBSCRIPTION STATUS</th>
                <td>

                    @if($user->sms_status=='1')
                   
                        @if($user->sms_due_date < date('Y-m-d H:i:s'))
                            <span class="text-danger">EXPIRED</span>
                        @else
                            <span class="text-success">ACTIVE</span>
                        @endif

                    @else
                        <span class="text-danger">NEVER SUBSCRIBED</span>
                    @endif


                </td>
            </tr>
            @if($user->sms_subscription_status=='1')
                <tr>
                    <th>SUBSCRIPTION TYPE</th>
                    <td>{{$message_sub->category}}  ({{$message_sub->planName}})</td>
                </tr>
            @endif
          
              @if($user->sms_status=='1')
                <tr>
                    <th>NEXT DUE DATE</th>
                    <td>{{\Carbon\Carbon::parse($user->sms_due_date)->format('l j M, Y : h ia')}}</td>
                </tr>
            @endif
           
        </table>

    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-hover">
            <tr>
                <th>FULL NAME</th>
                <td>{{$user->full_name}}</td>
            </tr>
            <tr>
                <th>USERNAME</th>
                <td>{{$user->username}}</td>
            </tr>
            <tr>
                <th>EMAIL ADDRESS</th>
                <td>{{$user->email}}</td>
            </tr>
            @if($user->phone!=NULL)
                <tr>
                    <th>PHONE NUMBER</th>
                    <td>{{$user->phone}}</td>
                </tr>
            @endif
            @if($user->state!=NULL)
                <tr>
                    <th>STATE</th>
                    <td>{{$user->state}}</td>
                </tr>
            @endif
            @if($user->country!=NULL)
                <tr>
                    <th>COUNTRY</th>
                    <td>{{$user->country}}</td>
                </tr>
            @endif
        </table>
    </div>

</div>
