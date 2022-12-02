@extends('layouts.master')

@section('title')
    Passion Predict   | Plan Manager
@endsection
@section('page')
   SMS Subscription Plan Manager <a class="btn btn-md btn-primary"  style=" float: right;" class="sms_user_details" href="#" data-target="#picksms" data-toggle="modal" >ADD PLAN  <i class="fa fa-plus"></i> </a>
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')
    <div class="col" style="min-height: 323px;;">

        <br>

        <div class="row" style="margin-top: -20px;">
            @foreach($data->all() as $plan)
                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">

                    <div class="well profile_view">
                        <button class="btn-danger deleteplans" 
                        style="    float: right;
                                    outline: none;
                                    font-size: 1em;
                                    border-radius: 6px;"
                                data-id="{{$plan->id}}">X</button>
                        <div class="col-sm-12">
                            <div class="left col-xs-10">
                                <h1>{{$plan->category}} <br><small>({{$plan->planName}}) - {{$plan->accessTime}}</small></h1>
                                <p><strong>Naira: </strong> N{{$plan->nairaPrice}} </p>
                                <p><strong>Kenya Shillings: </strong> KSH{{$plan->keshPrice}} </p>
                                <p><strong>Dollar: </strong> ${{$plan->dollarPrice}} </p>
                                <p><strong>Tanzanian: </strong> TZS {{$plan->tzsPrice}} </p>
                                <p><strong>Uganda: </strong> UGX {{$plan->ugxPrice}} </p>
                                <p><strong>Ghana: </strong> GHS {{$plan->cedPrice}} </p>
                                  <p><strong>South Africa: </strong> ZAR {{$plan->zarPrice}} </p>
                            </div>
                            <div class="right col-xs-2 text-center"><br><br>
                                <span class="fa fa-4x fa-certificate"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 bottom text-center">
                            <div class="col-xs-12 col-sm-12 emphasis pull-right">
                                <button type="button" class="btn btn-primary btn-xs smsplanLoader" data-target="#smsplaneditor" data-toggle="modal" data-id="{{$plan->id}}">
                                    <i class="fa fa-edit"> </i> Edit/Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal" id="smsplaneditor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="" data-dismiss="modal"><div class="pull-right"><span class="fa fa-times"></span></div></a>
                    <h5>PLAN EDITOR</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="planBody">

                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <div class="modal" id="picksms">
        <div class="modal-dialog modal-lg">
            <div class="modal-content col-sm-12 text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4><span class="fa fa-user"></span> ADD SMS PLANS</h4>
                </div>
                <div class="modal-body">
                    <div id="userinfobody">
                    <div class="container-fluid text-center">
                        <br>
            <div class="col-md-12 text-center">
                        <form action="#" method="POST" id="userinfoform">
                            <div class="form-group  col-sm-4">
                         
                                <label for="duedate">Category</label>
                                <input name="category" class="form-control" placeholder="">
                                {{-- @include('layouts.ajax_country_list') --}}
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="planName">Plan Name</label>
                                <input id="username" class="form-control" name="planName" type="text" value="">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="accessTime">Access Time<span style="color:red;">(Please, becareful Here!)</span></label>
                                <input id="username" class="form-control" name="accessTime" type="text" value="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nairaPrice">nairaPrice</label>
                                <input id="username" class="form-control" name="nairaPrice" type="text" value="">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="accessTime">keshPrice</label>
                                <input id="username" class="form-control" name="keshPrice" type="text" value="">
                            </div>
                             <div class="form-group col-sm-4">
                                <label for="planName">dollarPrice</label>
                                <input id="username" class="form-control" name="dollarPrice" type="text" value="">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="accessTime">cedPrice</label>
                                <input id="username" class="form-control" name="cedPrice" type="text" value="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nairaPrice">ugxPrice</label>
                                <input id="username" class="form-control" name="ugxPrice" type="text" value="">
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="accessTime">tzsPrice</label>
                                <input id="username" class="form-control" name="tzsPrice" type="text" value="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="accessTime">zarPrice</label>
                                <input id="username" class="form-control" name="zarPrice" type="text" value="">
                            </div>
                          <div class="form-group col-sm-8">
                                <label for="accessTime">planBenefits</label>
                                <textarea id="username" class="form-control" name="planBenefits" type="text" value=""></textarea>
                            </div>

                               
                                {{csrf_field()}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <input type="hidden" name="status" value="1">
                                <div class="form-group col-sm-4">
                                    <div id="infosettingstatus"></div><br>
                                    <button class="btn btn-md btn-success"  
                                    style="
                                    float: right;
   
                                    position: absolute;
                                    margin-left: 560px;
                                    width: 80px;


                                    " type="submit" id="submitinfosetting">Add</button>
                                </div>
                        </form>
            </div>

                   
        </div>

        </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
   @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif
@endsection
@section('levelJS')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

     $('.deleteplans').click(function (e) {
            //e.preventDefault();
            //$('#submitinfosetting').html('Processing... <i class="fa fa-spinner fa-spin"></i>');
            // $('#').prop('disabled', true);

            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                type: "GET",
                url: "DeleteSmsPlan/"+id,
                //data: id,
                //dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        //$('#submitinfosetting').prop('disabled', false);
                        //$('#infosettingstatus').html(data.encounters);
                        swal(data.encounters,'warning');
                        console.log(data);
                    }
                    else{
                        //alert(data.encounters);
                        //$('#submitinfosetting').prop('disabled', false);
                        //$('#submitinfosetting').html('Add');
                        swal('PLAN SUCCESSFULLY DELETED',data.encounters,'success');
                        location.reload();
//                        $('#updateuserinfo').modal('hide');
                    }
                }
            });
        });

        $('#userinfoform').submit(function (e) {
            e.preventDefault();
            $('#submitinfosetting').html('Processing... <i class="fa fa-spinner fa-spin"></i>');
            // $('#').prop('disabled', true);

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: "AddSmsPlan",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitinfosetting').prop('disabled', false);
                        //$('#infosettingstatus').html(data.encounters);
                        swal('Please All fields are Required',data.encounters,'warning');
                        console.log(data);
                    }
                    else{
                        //alert(data.encounters);
                        $('#submitinfosetting').prop('disabled', false);
                        $('#submitinfosetting').html('Add');
                        swal('PLAN SUCCESSFULLY ADDED',data.encounters,'success');
                        location.reload();
//                        $('#updateuserinfo').modal('hide');
                    }
                }
            });
        });

      
    });
</script>
@endsection
