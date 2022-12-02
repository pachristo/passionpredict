<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="SHORTCUT ICON" href="{{asset('logo.png')}}">

    <title>Passion Predict   | ADMIN LOGIN </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>
<style>
    .inputStyle{
        height: 45px; border: none!important; background-color: rgba(1,1,1,.5);
    }
    .myBtn{
        height: 45px;
    }
</style>
<body style="background:#f5f5f524;">
<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <center><img src="{{asset('logo.png')}}" class="img-responsive" style="max-height: 70px; margin-top: 100px;"> </center>
    <div id="wrapper" style="margin-top: 20px;">

        <div id="login" class="form" style="background: whitesmoke; border-radius: 40px 0px; padding: 10px 25px;">
            <section class="login_content">
                <form action="{{route('/adminLogin')}}" id="loginForm" method="POST" data-url="{{route('/loginOperationOk')}}">
                    <h1>ADMIN LOGIN</h1>
                    <div>
                        <input type="text" class="form-control inputStyle" placeholder="Login Email" required name="email" />
                    </div>
                    <div>
                        <input type="password" class="form-control inputStyle" placeholder="Login Password" required name="password" />
                    </div>
                    <div>
                        <div id="loginStatus"></div>
                    </div>
                    <div>
                        {{ csrf_field() }}
                        <div style="text-align: left;"><button class="btn btn-sm btn-danger btn-block myBtn" id="loginBtn">LOG IN</button></div>
                        {{--<a class="reset_pass" href="#">Lost your password?</a>--}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <p>© {{date('Y')}} | All Rights Reserved. <a href="https://passionpredict.com">Passion Predict  </a></p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){

        $('#loginForm').submit(function(e){
            e.preventDefault();
            $('#loginBtn').prop('disabled', true).html("<i class='fa fa-spinner fa-spin fa-2x'></i>");
            $('#loginStatus').html("");
            var url = $(this).attr('action');
            var redirect = $(this).attr('data-url');

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#loginBtn').prop('disabled', false).html("SIGN IN");
                        $('#loginStatus').html(data.post);
                    }
                    else if (data.status == 3)
                    {
                        window.location.href=redirect+'/'+data.post;
                    }
                    else{
                        $('#loginBtn').html("Verified! Redirecting...");
//                        $('#loginStatus').html("wait a moment!");
                        window.location.href=redirect+'/'+data.post;
                    }
                }
            });
        });

        $('#resetForm').submit(function(e){
            e.preventDefault();
            $('#resetBtn').prop('disabled', true).html("CHECKING...");
            $('#resetStatus').html("");
            var url = $(this).attr('action');

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#resetBtn').prop('disabled', false).html("Reset password");
                        $('#resetStatus').html("<span class='alert alert-dismissible alert-warning block'> <i class='fa fa-times-circle'></i> "+data.post+"</span><br>");
                    }
                    else{
                        $('#resetStatus').html("Reset Link sent to "+data.post);
                        //$('#resetPassword').modal('hide');
                        $('#resetBtn').prop('disabled', false);
                    }
                }
            });
        });
    });
</script>
</body>
</html>