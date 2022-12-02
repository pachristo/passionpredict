$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {




     $('.sms_user_details').click(function(){
        var uid = $(this).attr('href');
        $('#smsuserinfobody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "smsuserdetails/"+uid,
            success: function (data) {
                $('#smsuserinfobody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.unsubscribeUser').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        var msg = $(this).attr('data-msg');
        swal({
            title:msg,
            //text:'Click Ok to continue',
            type:'warning',
            showCancelButton:true,
            closeOnConfirm:false,
            showLoaderOnConfirm:true,
            confirmButtonColor:'#DD6B55',
            confirmButtonText:'Yes, please!'
        },function(){
            $.ajax({
                type: "GET",
                url: url+'/'+id,
                success: function (data) {
                    $('#un'+id).hide();
                    swal('SUBSCRIBED SUCCESSFULLY CANCELLED','','success');
                },
                failure: function (data) {
                    alert("SOMETHING ISN'T RIGHT");
                    location.reload();
                }
            });
        });
    });

    $('.smsunsubscribeUser').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        var msg = $(this).attr('data-msg');
        swal({
            title:msg,
            //text:'Click Ok to continue',
            type:'warning',
            showCancelButton:true,
            closeOnConfirm:false,
            showLoaderOnConfirm:true,
            confirmButtonColor:'#DD6B55',
            confirmButtonText:'Yes, please!'
        },function(){
            $.ajax({
                type: "GET",
                url: url+'/'+id,
                success: function (data) {
                    $('#smsun'+id).hide();
                    swal('SUBSCRIPTION SUCCESSFULLY CANCELLED','','success');
                },
                failure: function (data) {
                    alert("SOMETHING ISN'T RIGHT");
                    location.reload();
                }
            });
        });
    });
    $('.deleteItem').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        var msg = $(this).attr('data-msg');
        swal({
            title:msg,
            //text:'Click Ok to continue',
            type:'warning',
            showCancelButton:true,
            closeOnConfirm:false,
            showLoaderOnConfirm:true,
            confirmButtonColor:'#DD6B55',
            confirmButtonText:'Yes, delete it!'
        },function(){
            $.ajax({
                type: "GET",
                url: url+'/'+id,
                success: function (data) {
                    $('#record'+id).hide();
                    swal('Item Deleted!','','success');
                },
                failure: function (data) {
                    alert("SOMETHING ISN'T RIGHT");
                    location.reload();
                }
            });
        });
    });

    $('#uploadGallery').submit(function (e) {
        e.preventDefault();
        $('#galleryBtn').prop('disabled', true).html("UPLOADING IMAGE <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var callback =  $(this).attr('data-url');
        var method = $(this).attr('method');
        var formData = new FormData($(this)[0]);

        $.ajax({
            type: method,
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            async: true,
            dataType: "JSON",
            success: function (data) {
                if (data.status == 1) {
                    $('#galleryBtn').prop('disabled', false).html("<i class='fa fa-upload'></i> UPLOAD IMAGE");
                    swal(data.post, '', 'warning');
                }
                else {
                    $('#uploadGallery')[0].reset();
                    loadGallery(callback);
                    swal('UPLOAD SUCCESSFUL', '', 'success');
                    $('#galleryBtn').prop('disabled', false).html("<i class='fa fa-upload'></i> UPLOAD IMAGE");
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('#galleryHandle').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        loadGallery(url);
    });

    function loadGallery(url) {

        $('#galleryBody1').html("<center><br><br><i class='fa fa-spin fa-spinner fa-5x'></i><br><br></center>");
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                $('#galleryBody1').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    }

    $('#textarea').summernote({
        minHeight :  250
    });

    $('#datatable-responsive').DataTable({
        "bPaginate": false
    });

    $('#datatable').DataTable({
        "bPaginate": false
    });

    $('.datatable').DataTable({
        "bPaginate": false
    });

    $('#excon').hide();

    $("#exportbtn").click(function(){
        $("#exportthis").table2excel({
            exclude: ".noExl",
            name: "Predictions",
            filename: "PredictionFile"
        });
    });
    
    $('#refresher').click(function(){
        $(this).html("<span class='fa fa-spin fa-3x fa-spinner'></span>");
        $('#refreshStatus').fadeIn('500').html('Working...');
        $.ajax({
            type: "GET",
            url: "systemRefresh",
            success: function (data) {
                $('#refresher').html("REFRESH <br>SYSTEM");
                $('#refreshStatus').html(data).fadeOut(15000);
            }
        });
    });

    $('.admincontrol').click(function(){
        var admincode = $(this).attr('href');
        $('#adminbody').html('Fetching...');
        $.ajax({
            type: "GET",
            url: "admincontrol/"+admincode,
            success: function (data) {
                $('#adminbody').html(data);
            }
        });
    });

    $('.gameview').click(function(){
        var url = $(this).attr('data-url');
        $('#ebody').html("<center><br><br><i class='fa fa-spin fa-spinner fa-5x'></i><br><br></center>");
        $.ajax({
            type: "GET",
            url: url,
//              data: dataString,
            success: function (data) {
                console.log(data);
                $('#ebody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('#adsForm').submit(function(e){
        e.preventDefault();
        $('#adsBtn').prop('disabled', true).html("UPLOADING AD...");
        var url = $(this).attr('action');
        var dataString = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            processData: false,
            contentType: false,
            async: true,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#adsBtn').prop('disabled', false).html("UPLOAD AD");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $('#adsForm')[0].reset();
                    swal("AD UPLOADED SUCCESSFULLY", '', 'success');
                    $('#adsBtn').prop('disabled', false).html("UPLOAD AD");
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    $('#adsBtn').prop('disabled', false).html("UPLOAD AD");
                    swal('Something is broken!','','warning');
                    location.reload();
            }
        });
    });

    $('#adwordsForm').submit(function(e){
        e.preventDefault();
        $('#adwordBtn').prop('disabled', true).html("UPDATING DATABASE");
        var url = $(this).attr('action');
        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#adwordBtn').prop('disabled', false).html("SAVE CODES");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    swal("ADWORD CODES SAVED SUCCESSFULLY", '', 'success');
                    $('#adwordBtn').prop('disabled', false).html("SAVE CODES");
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    console.log(e.Message);
                    $('#adwordBtn').prop('disabled', false).html("SAVE CODES");
                    swal('Something is broken!','','warning');
                    // location.reload();
            }
        });
    });

    $('#addSponsor').submit(function(e){
        e.preventDefault();
        $('#sponsorBtn').prop('disabled', true).html("ADDING SPONSOR");
        var url = $(this).attr('action');
        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#sponsorBtn').prop('disabled', false).html("ADD SPONSOR");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $('#addSponsor')[0].reset();
                    swal("SPONSOR ADDED SUCCESSFULLY", '', 'success');
                    $('#sponsorBtn').prop('disabled', false).html("ADD SPONSOR");
                    location.reload();
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    console.log(e.Message);
                    $('#sponsorBtn').prop('disabled', false).html("ADD SPONSOR");
                    swal('Something is broken!','','warning');
                    // location.reload();
            }
        });
    });

    $('#blogForm').submit(function(e){
        e.preventDefault();
        $('#blogBtn').prop('disabled', true).html("SUBMITTING POST...");
        var url = $(this).attr('action');
        var dataString = new FormData($(this)[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            processData: false,
            contentType: false,
            async: true,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#blogBtn').prop('disabled', false).html("SUBMIT POST");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $('#blogForm')[0].reset();
                    $('#blogBtn').prop('disabled', false).html("SUBMIT POST");
                    swal("POST SUBMITTED SUCCESSFULLY", '', 'success');
                }
            },
            error: function (e, status) {
                if (e.status == 500)
                    $('#blogBtn').prop('disabled', false).html("SUBMIT POST");
                    swal('Something is broken!','','warning');
            }
        });
    });
    
    $('.blogview').click(function(){
        var blogcode = $(this).attr('href');
        $('#blogbody').html('Fetching Content...');
        $.ajax({
            type: "GET",
            url: "blogdetails/"+blogcode,
            success: function (data) {
                console.log(data);
                $('#blogbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.trashleague').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $('#'+id).hide();
        $.ajax({
            type: "GET",
            url: "trashleague/"+id,
            success: function (data) {
                console.log(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.updategame').click(function(){
        var gid = $(this).attr('href');
        var datain = $(this).attr('data-in');
        var url = $(this).attr('data-url');
        $('#ubody').html("<center><br><br><i class='fa fa-spin fa-spinner fa-5x'></i><br><br></center>");
        $.ajax({
            type: "GET",
            // url: "updateprediction/"+gid+"/"+datain,
            url: url,
            success: function (data) {
                $('#ubody').html(data);
            },
            failure: function (data) {
            }
        });
    });

    $('.fetchSponsor').click(function(){
        var id = $(this).attr('data-id');
        var url = $(this).attr('href');
        $('#sponsorBody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: url+"/"+id,
            success: function (data) {
                $('#sponsorBody').html(data);
            },
            failure: function (data) {
            }
        });
    });

    $('.userdetails').click(function(){
        var uid = $(this).attr('href');
        $('#userinfobody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "userdetails/"+uid,
            success: function (data) {
                $('#userinfobody').html(data);
            },
            failure: function (data) {
            }
        });
    });

    $('.updateuser').click(function(){
        var uid = $(this).attr('href');
        $('#userbody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "updateuserinfo/"+uid,
            success: function (data) {
                $('#userbody').html(data);
            },
            failure: function (data) {
            }
        });
    });
   
   $('.addphone').click(function(){
        var uid = $(this).attr('href');
        $('#addphonebody').html('Processing Data...');
         $.ajax({
             type: "GET",
             url: "updatephonenumber/"+uid,
             success: function (data) {
                 $('#addphonebody').html(data);
             },
             failure: function (data) {
             }
         });
    });
    $('.upgradeuser').click(function(){
        var uid = $(this).attr('href');
        $('#userupbody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "upgradeuseracct/"+uid,
            success: function (data) {
                $('#userupbody').html(data);
            },
            failure: function (data) {
            }
        });
    });

        $('.smsupgradeuser').click(function(){
        var uid = $(this).attr('href');
        $('#smsuserupbody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "smsupgradeuseracct/"+uid,
            success: function (data) {
                $('#smsuserupbody').html(data);
            },
            failure: function (data) {
            }
        });
    });

    $('.updateblog').click(function(){
        var bid = $(this).attr('href');
        $('#blbody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "updateblog/"+bid,
            success: function (data) {
                $('#blbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.updateads').click(function(){
        var aid = $(this).attr('href');
        $('#adsbody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "updateads/"+aid,
            success: function (data) {
                $('#adsbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.addresult').click(function(){
        var id = $(this).attr('href');
        var url = $(this).attr('data-url');
        $('#rbody').html("<center><br><br><i class='fa fa-spin fa-spinner fa-5x'></i><br><br></center>");
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                $('#rbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.usersettinghref').click(function(){
        var userid = $(this).attr('href');
        $('#abody').html('Fetching...');
        $.ajax({
            type: "GET",
            url: "ajaxusersetting/"+userid,
            success: function (data) {
                $('#abody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('#adminsetting').submit(function (e) {
        e.preventDefault();
        $('#adminstatus').html('Updating... Please wait');
        $('#adminsettingbtn').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajaxadminsetting",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#adminsettingbtn').prop('disabled', false);
                    $('#adminstatus').html(data.encounters);
                    console.log(data);
                }
                else{
                    $('#adminstatus').html(data.encounters);
                    alert(data.encounters);
                    $('#admin').modal('hide');
                }
            }
        });

    });


    $('#addsmsplanform').submit(function (e) {
        e.preventDefault();
        $('#addsmsplanBtn').html('Processing... Please wait');
        $('#addsmsplanBtn').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajaxadminsetting",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#adminsettingbtn').prop('disabled', false);
                    $('#adminstatus').html(data.encounters);
                    console.log(data);
                }
                else{
                    $('#adminstatus').html(data.encounters);
                    alert(data.encounters);
                    $('#admin').modal('hide');
                }
            }
        });

    });

    $('#predictionForm').submit(function (e) {
        e.preventDefault();
        $('#predictionBtn').prop('disabled', true).html("SUBMITTING PREDICTION");
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#predictionBtn').prop('disabled', false).html("SUBMIT PREDICTION");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $("#predictionForm")[0].reset();
                    $('#predictionBtn').prop('disabled', false).html("SUBMIT PREDICTION");
                    swal('PREDICTION LOADED', '', 'success');
                    $('#pstatus').html("");
                }
            }
        });
    });

    $('#codeForm').submit(function (e) {
        e.preventDefault();
        $('#codeBtn').prop('disabled', true).html("SUBMITTING CODE");
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#codeBtn').prop('disabled', false).html("SUBMIT CODE");
                    swal(data.encounters, '', 'warning');
                }
                else{
                    $("#codeForm")[0].reset();
                    $('#codeBtn').prop('disabled', false).html("SUBMIT CODE");
                    swal('CODE LOADED', '', 'success');
                    $('#pstatus').html("");
                }
            }
        });
    });

    $('#newleague').submit(function (e) {
        e.preventDefault();
        $('#leaguestatus').html('Adding... Please wait');
        $('#leaguebtn').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "loadleague",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#leaguebtn').prop('disabled', false);
                    $('#leaguestatus').html(data.encounters);
                    console.log(data);
                }
                else{
                    $("#newleague")[0].reset();
                    $('#leaguebtn').prop('disabled', false);
                    $('#leaguestatus').html(data.encounters);
                }
            }
        });
    });

    $('#newadminform').submit(function (e) {
        e.preventDefault();
        $('#newadminstatus').html('Registering... Please wait');
        $('#newadminbtn').prop('disabled', true);

        var dataString = $(this).serialize();
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "ajaxnewadmin",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#newadminbtn').prop('disabled', false);
                    $('#newadminstatus').html(data.encounters);
                    console.log(data);
                }
                else{
                    $('#newadminstatus').html(data.encounters);
                    alert(data.encounters);
                    $('#newadmin').modal('hide');
                }
            }
        });
    });

    $('.flag').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $('#tbody').html('Loading Game Data...');
        $.ajax({
            type: "GET",
            url: "marktestimonial/"+id,
            success: function (data) {
                $('#tbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });

    $('.addftt').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href');
        $('#ftbody').html('Loading Game Data...');
        $.ajax({
            type: "GET",
            url: "otherftrec/"+id,
            success: function (data) {
                $('#ftbody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });


    $('.unflag').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        var datain = $(this).attr('data-in');
        $('#f'+id).css('color', 'black').html('Unmarked Testimonial');
        $.ajax({
            type: "GET",
            url: "unmarktestimonial/"+id+"/"+datain,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.flaguser').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#f'+id).css('color', 'red').html('USER FLAGGED');
        $.ajax({
            type: "GET",
            url: "flaguser/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.unflaguser').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#f'+id).css('color', 'green').html('USER UNFLAGGED');
        $.ajax({
            type: "GET",
            url: "unflaguser/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.disableuser').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'red').html('USER DISABLED');
        $.ajax({
            type: "GET",
            url: "disableuser/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.enableuser').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'green').html('USER ENABLED');
        $.ajax({
            type: "GET",
            url: "enableuser/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.hided').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        var datain = $(this).attr('data-in');
        var url = $(this).attr('data-url');
        $('#h'+id).css('color', 'red').html('Unpublished');
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.unhide').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        var datain = $(this).attr('data-in');
        var url = $(this).attr('data-url');
        $('#h'+id).css('color', 'black').html('Published');
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('#demomailsender').submit(function (e) {
        e.preventDefault();
        $('#demostatus').html('Sending Demo... Please wait');
        $('#demobtn').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "demomail",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#demobtn').prop('disabled', false);
                    $('#demostatus').html(data.encounters);
                }
                else{
                    $("#demomailsender")[0].reset();
                    $('#demobtn').prop('disabled', false);
                    $('#demostatus').html(data.encounters);
                }
            }
        });
    });


    $('.hidethis').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'red').html('UNPUBLISHED');
        $.ajax({
            type: "GET",
            url: "ajaxhideblog/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.unhidethis').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'red').html('PUBLISHED');
        $.ajax({
            type: "GET",
            url: "ajaxunhideblog/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.hidead').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'red').html('Ad Hidden');
        $.ajax({
            type: "GET",
            url: "ajaxhidead/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });

    $('.unhidead').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('#h'+id).css('color', 'red').html('Ad Unhide');
        $.ajax({
            type: "GET",
            url: "ajaxunhidead/"+id,
            success: function (data) {
                console.log(data)
            }
        });
    });



    // $('.gamedelete').click(function(){
    //     var gid = $(this).attr('href');
    //     var datain = $(this).attr('data-in');
    //     $('#gid').val(gid);
    //     $('#datain').val(datain);
    // });

    $('.blogdelete').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        if(confirm("THIS POST WILL BE DELETED PERMANENTLY")==true)
        {
            $.ajax({
                type: "GET",
                url: url+"/"+id,
                success: function (data) {
                    $('#b'+id).hide();
                }
            });
        }
    });

    $('.adsdelete').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        if(confirm("THIS AD WILL BE DELETED PERMANENTLY")==true)
        {
            $.ajax({
                type: "GET",
                url: url+"/"+id,
                success: function (data) {
                    $('#d'+id).hide();
                }
            });
        }
    });

    $('.userdelete').click(function(){
        var uid = $(this).attr('href');
        $('#usid').val(uid);
    });

    $('.userdeletehref').click(function(){
        var userid = $(this).attr('href');
        $('#useidd').val(userid);
    });

    $('.gamedelete').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var finder = $(this).attr('data-in');
        var url = $(this).attr('data-url');
        if (confirm("YOU ARE DELETING THIS GAME IRREVERSABLY?")==true)
        {
            $.ajax({
                type: "GET",
                url: url,
                success: function(data){
                    location.reload();
                    $('#pred'+id).hide();
                }
            });
        }
    });

    $('#blogdeleteform').submit(function (e) {
        e.preventDefault();
        $('#blogdeletestatusbox').html('Deleting... Please wait');
        $('#blogsubmitdelete').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajaxblogdelete",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#blogsubmitdelete').prop('disabled', false);
                    $('#blogdeletestatusbox').html(data.encounters);
                    console.log(data);
                }
                else{
                    $('#d'+data.status).hide();
                    alert(data.encounters);
                    $('#blogdelete').modal('hide');
                }
            }
        });
    });


    $('#userdeleteform').submit(function (e) {
        e.preventDefault();
        $('#userdeletestatusbox').html('Deleting... Please wait');
        $('#usersubmitdelete').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "ajaxuserdelete",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#usersubmitdelete').prop('disabled', false);
                    $('#userdeletestatusbox').html(data.encounters);
                    console.log(data);
                }
                else{
                    $('.'+data.status).hide();
                    alert(data.encounters);
                    $('#usersubmitdelete').prop('disabled', false);
                    $('#userdelete').modal('hide');
                }
            }
        });
    });

    $('#registerForm').submit(function (e) {
        e.preventDefault();
        $('#registerBtn').prop('disabled', true).html('CREATING ACCOUNT');
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#registerBtn').prop('disabled', false).html('SUBMIT');
                    alert(data.encounters);
                }
                else{
                    $('#registerForm')[0].reset();
                    alert(data.encounters);
                    $('#registerBtn').prop('disabled', false).html('SUBMIT');
                }
            }
        });
    });

    $('#newTextForm').submit(function (e) {
        e.preventDefault();
        $('#newTextBtn').prop('disabled', true);

        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "newTextRotate",
            data: dataString,
            dataType: "JSON",
            success: function(data){
                if (data.status == 1) {
                    $('#newTextBtn').prop('disabled', false);
                    alert(data.encounters);
                }
                else{
                    $('#newTextForm')[0].reset();
                    $('#newTextBtn').prop('disabled', false);
                    $('#newTextRotator').modal('hide');
                    // $('#textRotator').modal('hide');
                    textRotator();
                }
            }
        });
    });

    $('.bonusSubForm').submit(function (e) {
        e.preventDefault();
        $('.subBtn').prop('disabled', true).html('PERFORMING OPERATION');
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        if(confirm('THIS ACTION IS IRREVERSIBLE!')==true)
        {
//                alert('hey');
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('.subBtn').prop('disabled', false).html('Continue');
                        alert(data.encounters);
                    }
                    else{
                        $('.bonusSubForm')[0].reset();
                        $('.subBtn').prop('disabled', false).html('Continue');
                        alert(data.encounters+' USERS AFFECTED');
                    }
                }
            });
        }
    });

    $('#massArchive').submit(function (e) {
        e.preventDefault();
        $('#massBtn').prop('disabled', true).html('ARCHIVING');
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        if(confirm('SURE TO RUN THIS COMMAND IRREVERSIBLY?')==true)
        {
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#massBtn').prop('disabled', false).html('ARCHIVE THESE');
                        alert(data.encounters);
                    }
                    else{
                        // $('.massArchive')[0].reset();
                        $('#massBtn').prop('disabled', false).html('ARCHIVE THESE');
                        // $('#archiver').modal('hide');
                        alert(data.encounters+' GAME ARCHIVED');
                    }
                }
            });
        }
    });

    $('#addPromotion').submit(function (e) {
        e.preventDefault();
        $('#promotionBtn').prop('disabled', true).html('SAVING PROMOTION');
        $('#promotionStatus').html('');
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#promotionBtn').prop('disabled', false).html('SAVE PROMOTION');
                        $('#promotionStatus').html(data.encounters);
                    }
                    else{
                        $('#addPromotion')[0].reset();
                        $('#promotionBtn').prop('disabled', false).html('SAVE PROMOTION');
                        $('#promotionStatus').html('PROMOTION CREATED');
                    }
                }
            });
    });

    $('.bonusSubFormLapsed').submit(function (e) {
        e.preventDefault();
        $('.subBtn').prop('disabled', true).html('PERFORMING OPERATION');
        var url = $(this).attr('action');

        var dataString = $(this).serialize();
        if(confirm('THIS ACTION IS IRREVERSIBLE!')==true)
        {
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('.subBtn').prop('disabled', false).html('Continue');
                        alert(data.encounters);
                    }
                    else{
                        $('.bonusSubFormLapsed')[0].reset();
                        $('.subBtn').prop('disabled', false).html('Continue');
                        alert(data.encounters+' USERS AFFECTED');
                    }
                }
            });
        }
    });

    $('.notedelete').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');

        $.ajax({
            type: "GET",
            url: "ajaxnotedelete/"+id,
            success: function (data) {
                $('#note'+data).hide();
            }
        });
    });

    $('.deletePromotion').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        if(confirm("THIS PROMOTION WILL BE DELETED PERMANENTLY")==true)
        {
            $.ajax({
                type: "GET",
                url: url+"/"+id,
                success: function (data) {
                    $('#prom'+id).hide();
                }
            });
        }
    });


    $('.planLoader').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#planBody').html("<center><span class='fa fa-spin fa-3x fa-spinner'></span></center>");
        $.ajax({
            type: "GET",
            url: "planEditor/"+id,
            success: function (data) {
                $('#planBody').html(data);
            }
        });
    });
      $('.smsplanLoader').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('#planBody').html("<center><span class='fa fa-spin fa-3x fa-spinner'></span></center>");
            $.ajax({
                type: "GET",
                url: "smsplanEditor/"+id,
                success: function (data) {
                    $('#planBody').html(data);
                }
            });
        });

    $('.viewProm').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var id = $(this).attr('data-id');
        $('#promBodyy').html("<center><span class='fa fa-spin fa-4x fa-spinner'></span></center>");
        $.ajax({
            type: "GET",
            url: url+"/"+id,
            success: function (data) {
                $('#promBodyy').html(data);
            }
        });
    });

    $('.sliderLoader').click(function (e) {
        e.preventDefault();
        $('#sliderBody').html("<hr><center><span class='fa fa-spin fa-spinner fa-5x'></span><br>Loading Data...</center>");
        $.ajax({
            type: "GET",
            url: "sliderLoader",
            success: function (data) {
                $('#sliderBody').html(data);
            }
        });
    });

    $('.trashSlide').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('SURE TO TRASH?')==true)
        {
            $.ajax({
                type: "GET",
                url: "trashSlide/"+id,
                success: function (data) {
                    $('#slider'+data).hide();
                }
            });
        }
    });

    $('.trashMunch').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('SURE TO TRASH?')==true)
        {
            $.ajax({
                type: "GET",
                url: "trashMunch/"+id,
                success: function (data) {
                    $('#munch'+data).hide();
                }
            });
        }
    });

    $('.archiveGame').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('SURE TO ARCHIVE THIS?')==true)
        {
            $.ajax({
                type: "GET",
                url: "archiveGame/"+id,
                success: function (data) {
                    $('#pred'+data).hide();
                }
            });
        }
    });

    $('.unarchiveGame').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('SURE TO RESTORE THIS?')==true)
        {
            $.ajax({
                type: "GET",
                url: "unarchiveGame/"+id,
                success: function (data) {
                    $('#pred'+data).hide();
                }
            });
        }
    });

    textRotator();
    approvedLoader();
//        feedbackScript();

//        setTimeout(function() {
//            $('#stat').modal('show');
//        }, 3000);
//
//        setTimeout(function() {
//            $('#stat').modal('hide');
//        }, 12000);
});

function textRotator()
{
    $('#sliderBody').html("<hr><center><span class='fa fa-spin fa-spinner fa-5x'></span><br>Loading Data...</center>");
    $.ajax({
        type: "GET",
        url: "sliderLoader",
        success: function (data) {
            $('#sliderBody').html(data);
        }
    });
}

function approvedLoader()
{
    $('#approvedF').html("<hr><center><span class='fa fa-spin fa-spinner fa-5x'></span><br>Loading Data...</center>");
    $.ajax({
        type: "GET",
        url: "approvedLoader",
        success: function (data) {
            $('#approvedF').html(data);
            feedbackScript();
            viewUser();
        }
    });
}

function feedbackScript()
{
    $('.trashFeed').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('SURE TO TRASH?')==true)
        {
            $.ajax({
                type: "GET",
                url: "trashFeed/"+id,
                success: function (data) {
                    $('#fd'+data).hide();
                }
            });
        }
    });

    $('.approveFeed').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('APPROVE THIS FOR PUBLISH?')==true)
        {
            $.ajax({
                type: "GET",
                url: "publishFeed/"+id,
                success: function (data) {
                    $('#fd'+data).hide();
                    approvedLoader();
                }
            });
        }
    });
    


    $('.disapproveFeed').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        if(confirm('DISAPPROVE/UNPUBLISH?')==true)
        {
            $.ajax({
                type: "GET",
                url: "unpublishFeed/"+id,
                success: function (data) {
                    $('#fd'+data).hide();
//                        approvedLoader();
                    location.reload();
                }
            });
        }
    });
}

function viewUser()
{
    $('.userdetails').click(function(){
        var uid = $(this).attr('href');
        $('#userinfobody').html('Fetching Data...');
        $.ajax({
            type: "GET",
            url: "userdetails/"+uid,
            success: function (data) {
                $('#userinfobody').html(data);
            },
            failure: function (data) {
                console.log(data);
            }
        });
    });
}