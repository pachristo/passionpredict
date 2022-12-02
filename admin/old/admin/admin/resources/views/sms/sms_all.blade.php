@extends('layouts.master')

@section('title')
    Passion Predict   | Promotions
@endsection
@section('page')
    SMS MEMBERS
@endsection
@section('content')
<?php

$persons=auth()->user();

?>
@if($persons->category=='Super')


    
    <form id="sortform" action="{{url('/sortSmsMembers')}}" method="POST" >
    <div  class="x_title row" style="">
    
    <div class="form-group col-sm-3">
        <label>SELECT COUNTRIES</label>
       @include('layouts.country_list')
    </div>

    <div class="form-group col-sm-3">
        <label>USER TYPES</label>
       <select name="user_types" class="form-control">
            <option value="all">All</option>
           <option value="expired">Expired</option>
           <option value="active">Active</option>
       </select>
    </div>
        <div class="form-group col-sm-3">
        <label>PLANS</label>
       <select name="user_plans" class="form-control"  >
            <option value="all">All</option>
            @foreach($sms as $key=>$value)
            <option value="{{$value->id}}">{{$value->planName}}</option>
            @endforeach
       </select>
    </div>

     <div class="form-group col-sm-3 text-center">
         <label></label>
        <button class="btn-success btn " type="submit" id="sort" 
         style="
    margin-top: 24px;
    width: auto;
        ">Sort</button>
    </div>
    </form>
    <hr>
    </div>
   
    <div class="col" style="min-height: 323px;;">
        <br>

        <div class="row" style="margin-top: -20px;">
            <div class="col-sm-12">
                @if( session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                {{-- <a href="#" data-target="#demomail" data-toggle="modal"><button class="btn btn-md btn-danger pull-right">SEND DEMO MAIL</button></a><br> --}}
            </div>
            <form method="post" action="{{url('/submitSms')}}" id="sendmessageForm">
                <div class="col-md-12"><br>
                    {{-- <div class="form-group col-sm-12">
                        <label>MAIL RECIPIENTS <br><span class="text-danger">* TYPE RECIPIENT(S) EMAIL ADDRESS(ES) SEPARATED WITH SINGLE SPACE and not COMMA or FULL-STOP </span></label>
                        <input type="text" class="form-control" name="emails" required placeholder="email address(es)">
                    </div> --}}
                    <div class="form-group col-sm-12">
                        <label> PHONE NUMBERS</label>
                        <input type="text" class="form-control" id="numbers" name="numbers" required placeholder="Phone Numbers here">
                    </div>
                    

                    <div class="form-group col-sm-12">
                        <label for="moreoption">SMS CONTENT</label>
                        <textarea name="message"  class="form-control textarea" style="height: 200px;"></textarea>
                    </div>
                    
                    {!! csrf_field() !!}

                    <div id="bstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <hr style="margin: 15px;">
                      {{--   <small><strong>NB:</strong> Kindly note that sending this BC may take quite a while. Please do not refresh the page</small><br> --}}
                        <button class="btn btn-md btn-success" name="submit" id="sendmessageBtn">SEND </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


   {{--  <script>
        tinymce.init({
            selector:'.textarea',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            forced_root_block : "",
            force_br_newlines : true,
            force_p_newlines : false,
            statusbar: false,
            height : 80

        });</script> --}}

@else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
        @endif
@endsection
@section('levelJS')
        <script type="text/javascript">
   $.ajaxSetup({
    headers:{

        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }

});

$(document).ready(function(){

    // $('.smsuserdetails').click(function(){
    //     var uid = $(this).attr('href');
    //     $('#smsuserinfobody').html('Fetching Data...');
    //     $.ajax({
    //         type: "GET",
    //         url: "smsuserdetails/"+uid,
    //         success: function (data) {
    //             $('#smsuserinfobody').html(data);
    //         },
    //         failure: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

     $('#sortform').submit(function(e){
        e.preventDefault();
        $('#sort').prop('disabled',true).html("Processing... <i class='fa fa-spinner fa-spin'></i>");
        var url=$(this).attr('action');
        var method=$(this).attr('method');
        var dataform=$(this).serialize();

        //alert(method+dataform);
        var redirect="";
        $.ajax({
            type:method,
            url: url,
            data:dataform,
            success:function(data){
            console.log('you are good');
         
            $('#numbers').val(data);
            $('#sort').prop('disabled',false).html('sort');
            $('#sortform')[0].reset();
            if (data=='') {
                swal('Oops , No data found', 'Try again,Thanks', 'warning');

            }else{
                swal('NUMBERS LOADED', 'CONFIRM ON THE PAGE,Thanks', 'success');
            }
            
      
               }
          


        });


    });


     $('#sendmessageForm').submit(function(e){
        e.preventDefault();
        $('#sendmessageBtn').prop('disabled',true).html("Processing... <i class='fa fa-spinner fa-spin'></i>");
        var url=$(this).attr('action');
        var method=$(this).attr('method');
        var dataform=$(this).serialize();

        //alert(method+dataform);
        var redirect="";
        $.ajax({
            type:method,
            url: url,
            data:dataform,
            //dataType:'JSON',
            success:function(data){
            console.log('you are good');
          
                 if (data == '1') {
                    $('#smsmessageBtn').prop('disabled', false).html("Encountered error");
                     swal('OOPS,SOMETHING WENT WRONG', 'network problem,Try again', 'warning');
                 }
                 else {
                    swal(data, '', 'success');
                     $('#smsmessageBtn').prop('disabled', false).html("Messages Sent");
                     location.reload();
                   
            
                   
               }
             },
             failure: function (e) {
                 swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                 location.reload();
             }


        });


    });

});


</script>
@endsection