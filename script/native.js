$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $('#registerForm').submit(function (e) {
        e.preventDefault();
        $('#regBtn').prop('disabled', true).html("SIGNING YOU UP... <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var callback =  $(this).attr('data-callback');
        var method = $(this).attr('method');
        var formData = $(this).serialize();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status == 1) {
                    $('#regBtn').prop('disabled', false).html("REGISTER NOW <i class='fa fa-arrow-circle-right'></i>");
                    swal(data.post, '', 'warning');
                }
                else {
                    // swal('YOUR ACCOUNT IS CREATED', 'WE HAVE SENT YOU AN ACTIVATION LINK, CHECK YOUR EMAIL INBOX TO PROCEED', 'success');
                    swal('YOUR ACCOUNT IS CREATED', 'REDIRECTING TO LOGIN PAGE', 'success');
                    $('#regBtn').prop('disabled', true).html("ACCOUNT CREATED, PLEASE WAIT! <i class='fa fa-check-circle'></i>");
                    window.location.href=callback;
                    // window.location.href=callback+'/'+data.post;
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('#sendOTP').submit(function (e) {
        e.preventDefault();
        $('#sendOTPBtn').prop('disabled', true).html("Sending OTP <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status == 1) {
                    $('#sendOTPBtn').prop('disabled', false).html("Resend OTP");
                    swal(data.post, '', 'warning');
                }
                else {
                    swal('ACTIVATION CODE SENT', 'CHECK YOUR PHONE TO PROCEED', 'success');
                    $('#sendOTPBtn').prop('disabled', false).html("Resend OTP");
                    location.reload
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });


    $('#resendForm').submit(function (e) {
        e.preventDefault();
        $('#resendBtn').prop('disabled', true).html("Resending Email <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status == 1) {
                    $('#resendBtn').prop('disabled', false).html("Resend Email");
                    swal(data.post, '', 'warning');
                }
                else {
                    swal('ACTIVATION LINK RESENT', 'CHECK YOUR EMAIL INBOX TO PROCEED', 'success');
                    $('#resendBtn').prop('disabled', false).html("Resend Email");
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('#resetForm').submit(function (e) {
        e.preventDefault();
        $('#resetBtn').prop('disabled', true).html("VALIDATING <i class='fa fa-spinner fa-spin'></i>");
        $('#resetError').html('');
        var url =  $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();
        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.status == 1) {
                    $('#resetBtn').prop('disabled', false).html("RESET NOW <i class='fa fa-arrow-circle-right'></i>");
                    $('#resetError').html("<div class='alert alert-dismissible alert-danger'><p><span>Error!</span> " + data.post + "</p></div>");
                }
                else {
                    swal('RESET LINK SENT', 'PLEASE CHECK YOUR EMAIL BOX', 'success');
                    $('#resetBtn').html("CHECK YOUR EMAIL <i class='fa fa-check-circle'></i>");
                    // location.reload();
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('#contactForm').submit(function (e) {
        e.preventDefault();
        $('#contactBtn').prop('disabled', true).html("SENDING MESSAGE <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.status == 1) {
                    $('#contactBtn').prop('disabled', false).html("Send Message <i class='fa fa-arrow-circle-right'></i>");
                    swal(data.post, '', 'warning');
                }
                else {
                    swal('YOUR MESSAGE HAVE BEEN SENT!', '', 'success');
                    $('#contactBtn').html("EXPECT RESPONSE SHORTLY! <i class='fa fa-check-circle-o'></i>");
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('#wuForm').submit(function (e) {
        e.preventDefault();
        $('#wuBtn').prop('disabled', true).html("Sending Details <i class='fa fa-spinner fa-spin'></i>");
        var url =  $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();

        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: "JSON",
            success: function (data) {
                if (data.status == 1) {
                    $('#wuBtn').prop('disabled', false).html("Send Me Details <i class='fa fa-arrow-circle-right'></i>");
                    swal(data.post, '', 'warning');
                }
                else {
                    // swal('DETAILS SENT!', '', 'success');
                    $('#wuBtn').html("SENT! CHECK YOUR EMAIL");
                }
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        })
    });

    $('.viewGame').click(function (e) {
        e.preventDefault();
        $('#viewBody').html("<center><br><br><br><br><i class='fa fa-spin fa-futbol-o fa-3x text-danger'></i><br><br><br></center>");
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-title');
        var url = $(this).attr('data-url');
        $('#viewTitle').html(title);
        $.ajax({
            type: 'GET',
            url: url+'/'+id,
            success: function (data) {
                $('#viewBody').html(data);
            },
            failure: function (e) {
                swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                location.reload();
            }
        });
    });
});