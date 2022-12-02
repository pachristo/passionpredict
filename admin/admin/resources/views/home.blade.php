@extends('layouts.master')

@section('title')
    PASSION PREDICT | Admin Home
@endsection
@section('content')
    <?php
    if(Auth::check()){
        $admin = Auth::user();
    }
    ?>
    <div class="col">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-random"></i> Free Tips</span>
                <div class="count" id="predictHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super' || $admin->category=='Predictor')
                    <a href="{{url('/predictions')}}">View/Manage</a>
                @endif
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-share-alt"></i> VIP Tips</span>
                <div class="count red" id="blogHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super' || $admin->category=='Predictor')
                    <a href="{{route('/VIPpredictions')}}">View/Manage</a>
                @endif
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-calendar-check-o"></i> Testimonials</span>
                <div class="count red" id="testimonialHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super' || $admin->category=='Predictor')
                    <a href="{{url('/testimonials')}}">View/Manage</a>
                @endif
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-users"></i> Members</span>
                <div class="count" id="userHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super' || $admin->category=='General' )
                    <a href="{{url('/allmembers')}}">View/Manage</a>
                @endif
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user-plus"></i> Subscribers</span>
                <div class="count" id="adsHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super'|| $admin->category=='General' )
                    <a href="{{url('/subscribed')}}">View/Manage</a>
                @endif
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user-times"></i> Expired Subscribers</span>
                <div class="count" id="leagueHolder"><i class="fa fa-spin fa-spinner"></i></div>
                @if($admin->category=='Super' || $admin->category=='General' )
                    <a href="{{route('/expired')}}">View/Manage</a>
                @endif
            </div>
        </div>
        <!-- /top tiles -->
        <br>


        <div class="col-sm-12 text-center" >
        <!-- top tiles -->
        <div class="row tile_count text-center" style="margin-left: 245px;">
         
           
        </div>
        </div>

        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('D j F, Y');


        ?>
        <?php
        if(Auth::check()){
            $admin = Auth::user();
        }
        ?>

        @if(isset($mail))
            <script>
                alert({{$mail}});
            </script>
        @endif
        <center><h2 style="margin-bottom: -10px;">{{$d}}</h2>
            <blockquote><h1>Welcome, {{$admin->name}}</h1></blockquote>
            @if($admin->category=='Super')
            <button class="btn btn-lg btn-danger" style="white-space: normal!important; padding: 40px 30px; border-radius: 100px;" id="refresher">REFRESH <br>SYSTEM</button><br>
            <span id="refreshStatus" class="text-danger"></span>
            @endif
            <br>

        </center>
        @if(isset($success))
            <script>alert('{{$success}}');</script>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <hr>
            </div>
            <div class="col-sm-10 col-sm-offset-1 bg-danger" style="padding: 20px;">
                <div class="col-sm-8">
                    <h3>Would there be game across all the stores today?</h3>
                </div>
                <?php
                    $datee = date('d-m-Y');
                    $stat = \App\System::where('id', '1')->where('activeGameDate', $datee)->first();
                ?>
                <div class="col-sm-4 input-group input-group-lg">
                    <select name="" class="form-control" id="activeSelector">
                        <option value="1" @if(isset($stat) && $stat->activeGameStatus=='1') selected @endif>Yes, there would be!</option>
                        <option value="0" @if(isset($stat) && $stat->activeGameStatus=='0') selected @endif>No, doesn't seems so!</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('levelJS')

    <script>
        $(document).ready(function () {
            $('#activeSelector').on('change', function () {
                var op = $('option:selected', this).attr('value');
                var url = '{{route('/activeGameStat')}}';
                swal({
                    title:'HEY, SURE TO CHANGE STATUS?',
                    //text:'Click Ok to continue',
                    type:'warning',
                    showCancelButton:true,
                    closeOnConfirm:false,
                    showLoaderOnConfirm:true,
                    confirmButtonColor:'#DD6B55',
                    confirmButtonText:'Yes, please'
                },function(){
                    $.ajax({
                        type: "GET",
                        url: url+'/'+op,
                        success: function (data) {
                            swal('OK, STATUS CHANGED!','','success');
                        },
                        failure: function (data) {
                            alert("SOMETHING ISN'T RIGHT");
                            location.reload();
                        }
                    });
                });



            });
        });

    </script>

    <script>
        $(document).ready(function () {
            countPredictions();

            function countPredictions() {
                boilerCounter('predictions', 'predictHolder');
                countTestimonial();
            }

            function countTestimonial() {
                boilerCounter('testimonials', 'testimonialHolder');
                countBlog();
            }

            function countBlog() {
                boilerCounter('blogs', 'blogHolder');
                countAds();
            }

            function countAds() {
                boilerCounter('ads', 'adsHolder');
                countLeague();
            }

            function countLeague() {
                boilerCounter('leagues', 'leagueHolder');
                countMember();
            }
            function countMember() {
                boilerCounter('members', 'userHolder');
                countSmsActive();
            }
            function countSmsActive() {
                boilerCounter('smsactive', 'SmsActive');
                CountSmsExpired();
            }
            function CountSmsExpired() {
                boilerCounter('smsexpired', 'SmsExpired');
                // countSmsActive();
            }

            function boilerCounter(key, holder) {
                $.ajax({
                    type: "GET",
                    url: "counter/"+key,
                    success: function (data) {
                        $('#'+holder).html(data);
                    }
                });
            }
        });
    </script>
@endsection


