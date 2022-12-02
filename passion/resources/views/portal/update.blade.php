@extends('layout.main')

@section('title')
    Dashboard - Passionpredict.com
@endsection
@section('seo')
    <meta name="description"
        content="Passionpredict is the best on line service of football statistics that provides accurate and free football prediction. We are planet predict give soccer forecast to every one of the best alliances across the world.">
    <meta name=" keywords"
        content="football prediction, soccer prediction site, site that predict football matches correctly, soccer prediction, best football prediction site free, tips 180, sure prediction, predictz" />
@endsection
@section('home', 'active')
@section('levelCSS')

    <style>
        form .form-control {

            color: #060609;

        }



        .header-font-audio {
    box-shadow:none;
    /* border-bottom-right-radius: 49px; */
    /* border-bottom-left-radius: 64px; */
    border: 1px solid;
    border-radius: 5px;
    padding: 3px;
}

h3, a {
    color: #003f3e;
}


        label {
            color: #d93f51;

            font-weight: 600;
        }

        .form-control {
            display: inline;
        }

        .alert-danger {
            background-color: #f2dedeb3;
            border-color: #ebccd19e;
            /* color: #ec4357; */
        }
    </style>
@endsection
@section('lower_header')
    @include('partials.lower_header')

@endsection
@section('content')
    <!-- Slider Section Start Here -->
    @include('partials.dashboard_header')
    <!-- Slider Section end Here -->




    <div class="col-sm-12 nopaddingsmall mt10">
        <div class="container container-bg">

        </div>

    </div>

    <div class="container text-center">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5>{!! session()->get('error') !!}</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">>
                <h5>{!! session()->get('warning') !!}</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    </div>
    <div class="container pb-5 pt-3 ">
        <div class="card">
            <div class="card-body nopaddingsmall">
                <div class="card-block">
                    <div class="mb-3">
                        <form action="{{ route('/portal/update') }}" id="updateProfile" method="post" class="row"
                            enctype="multipart/form-data">
                            <div class="form-group col-sm-12 text-center">
                                <h3 class="header-font-audio">UPDATE ACCOUNT</h3>
                            </div>

                            <div class="col-lg-12">
                                <div class="col-sm-12 row" style="padding: 0px;margin:0px;">

                                    <div class="form-group col-sm-8">
                                        <label for="">Full Name *</label>
                                        <input type="text" class="form-control" required placeholder="full name here"
                                            name="full_name" value="{{ currentUser()->full_name }}">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" placeholder="username here"
                                            name="username" value="{{ currentUser()->username }}">
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-group col-sm-6">
                                        <label for="">Email Address *</label>
                                        <input type="email" class="form-control" required placeholder="email address here"
                                            name="email" value="{{ currentUser()->email }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Phone Number *</label>
                                        <input type="text" class="form-control" required placeholder="phone number here"
                                            name="phone" value="{{ currentUser()->phone }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Country *</label>
                                        <select name="country" class="form-control select2form crs-country"
                                            data-region-id="one" data-default-value="{{ currentUser()->country }}" required
                                            id=""></select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">State/City</label>
                                        <input type="text" class="form-control" placeholder="state/city here"
                                            name="state" value="{{ currentUser()->state }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">New Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="leave blank if not changing" name="password">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="leave blank if not changing" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-md btn-danger border text-white w-100 text-center" id="updateBtn">SAVE & PROCEED</button>
                                </div>
                            </div>



                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>









    </div>



@endsection

@section('levelJS')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {

            $('#updateProfile').submit(function(e) {
                e.preventDefault();
                $('#updateBtn').prop('disabled', true).html("SAVING <i class='fa fa-spinner fa-spin'></i>");
                var url = $(this).attr('action');
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
                    success: function(data) {
                        if (data.status == 1) {
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        if (data.status == 0) {
                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            $('#updateBtn').prop('disabled', false).html(
                                "SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        }
                        if (data.status == 9) {

                            swal('UPDATED SUCCESSFULLY', '', 'success');
                            setTimeout(window.location.href = data.post, 3000);
                        }

                    },
                    failure: function(e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        })(jQuery);
    </script>
@endsection
