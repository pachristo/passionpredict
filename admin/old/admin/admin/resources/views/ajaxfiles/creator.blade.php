<div class="row">
    @if($creator->accounttype=='PAID')
    <div class="col-md-6">
    <table class="table table-striped">
        <tr>            <th>FULL NAME</th>            <td>{{$creator->user_name}}</td>        </tr>
        <tr>            <th>EMAIL</th>            <td>{{$creator->email}}</td>        </tr>
        <tr>            <th>PHONE</th>            <td>{{$creator->phone}}</td>        </tr>
        <tr>            <th>ACCOUNT TYPE</th>            <td>{{$creator->accounttype}}</td>        </tr>
        <tr>            <th>TOKEN</th>            <td>{{$creator->token}}</td>        </tr>
        <tr>            <th>TOKEN TYPE</th>            <td>{{$creator->tokentype}}</td>        </tr>
        <tr>            <th>TOTAL EVENTS</th>            <td>{{$creator->totalevents}}</td>        </tr>
        <tr>            <th>DATE REGISTERED</th>            <td>{{$creator->dateregistered}}</td>        </tr>
        <tr>            <th>NEXT DUE</th>            <td>{{$creator->nextduedate}}</td>        </tr>
        <tr>            <th>ACCOUNT STATUS</th>
            @if($creator->accountstatus=='0')
            <td>ACTIVE</td>
                @else
                <td><span class="red">DEACTIVATED</span></td>
            @endif
        </tr>
    </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
            <tr>
                <th>
                    @if($creator->profilepicture==NULL)
                        <span class="fa fa-user fa-5x" style="font-size: 950%;"></span>
                    @else
                    <img src="{{$path}}{{$creator->profilepicture}}" style="max-height: 120px;">
                    @endif
                </th>
                <th>
                    @if($creator->profilepicture==NULL)
                        <span class="fa fa-support fa-5x" style="font-size: 850%;"></span>
                    @else
                        <img src="{{$path}}{{$creator->logo}}" style="max-height: 120px;">
                    @endif
                </th>
            </tr>
            <tr>            <th>COMPANY</th>            <td>{{$creator->association}}</td>        </tr>
            <tr>            <th>ADDRESS</th>            <td>{{$creator->address}}</td>        </tr>
            <tr>            <th>CITY</th>            <td>{{$creator->city}}</td>        </tr>
            <tr>            <th>STATE</th>            <td>{{$creator->state}}</td>        </tr>
            <tr>            <th>CONTACT PERSON</th>            <td>{{$creator->contactperson}}</td>        </tr>
            <tr>            <th>STATUS</th>
                @if($creator->status=='0')
                    <td>ACTIVE</td>
                @else
                    <td><span class="red">DEACTIVATED</span></td>
                @endif
            </tr>
        </table>
    </div>
        @else
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-striped">
                <tr>            <th>FULL NAME</th>            <td>{{$creator->user_name}}</td>        </tr>
                <tr>            <th>EMAIL</th>            <td>{{$creator->email}}</td>        </tr>
                <tr>            <th>PHONE</th>            <td>{{$creator->phone}}</td>        </tr>
                <tr>            <th>ACCOUNT TYPE</th>            <td>{{$creator->accounttype}}</td>        </tr>
                <tr>            <th>TOTAL EVENTS</th>            <td>{{$creator->totalevents}}</td>        </tr>
                <tr>            <th>DATE REGISTERED</th>            <td>{{$creator->created_at}}</td>        </tr>
            </table>
        </div>
    @endif
</div>
