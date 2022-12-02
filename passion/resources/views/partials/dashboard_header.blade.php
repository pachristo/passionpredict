{{-- <div class="container container-bg p-0" style="background: url({{ asset('bg1.jpg') }});
background-position: center;
background-repeat: no-repeat;">
    <div class=" mx-0 banner-cl">
        <style>

        </style>

        <div class="row center-banner  padding-50  nopaddingsmall ">
            <div class="col-lg-4 hideSM">
                <div class="row">
                    <div class="col-lg-6 col-6 ">

                            <a href="{{ url('/profile/update') }}" class="btn btn-green  w-100">
                                <i class="fa fa-pencil "></i> &nbsp; Edit Profile
                            </a>

                    </div>
                    <div class="col-lg-6 col-6">

                            <a href="{{ route('/logout') }}" class="btn btn-green  w-100">
                                <i class="fa fa-sign-out "></i> &nbsp; Logout
                            </a>

                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <a href="{{ route('/pricing') }}" class="btn btn-success  w-100">
                            VIP Packages
                        </a>
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <a href="{{ $telegramlink }}" class="btn btn-success btn-blue-light  w-100">
                            <i class="fa  fa-telegram "></i>&nbsp; Join us on Telegram
                        </a>
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <a href="{{ $telegramlink }}" class="btn btn-success btn-blue-light  w-100">
                            <i class="fa  fa-whatsapp "></i>&nbsp; Connect on Whatsapp
                        </a>
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <a href="{{ route('/pricing') }}" class="btn btn-warning  w-100">
                            How To Pay
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 px-1 pt-1">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Account Information</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="text-white font-bold"><strong>Name</strong></td>

                                <td class="text-white font-bold"><strong>{{ currentUser()->full_name }}</strong></td>
                            </tr>
                            @if (currentUser()->subscription_status == '0')
                                <tr>
                                    <td class="text-white font-bold"><strong>Plan</strong></td>
                                    <td class="text-white font-bold text-danger"><strong>
                                            @if (currentUser()->sub_count > 0)
                                                {{ currentUser()->sub->category }}
                                                ({{ currentUser()->sub->planName }})
                                            @else
                                                FREE PLAN
                                            @endif
                                        </strong></td>



                                </tr>
                                @if (currentUser()->sub_count > 0)
                                    <tr>
                                        <td class="text-white font-bold"><strong>Expired
                                            </strong>
                                        </td>
                                        <td class=" font-bold text-danger"><strong>


                                                {{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M @ h:ia') }}



                                            </strong>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td class="text-white font-bold"><strong>Plan</strong></td>
                                    <td class=" font-bold text-danger">
                                        <strong>{{ currentUser()->sub->category }} <small
                                                class="text-warning">({{ currentUser()->sub->planName }} Package
                                                )</small><span class="badge badge-success">active</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white font-bold"><strong>Date</strong></td>
                                    <td class="text-white font-bold "><strong>
                                            {{ \Carbon\Carbon::parse(currentUser()->date_subscribed)->format('d M @ h:ia') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-white font-bold"><strong>Expiry:</strong></td>
                                    <td class="text-danger font-bold"><strong>
                                            {{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M @ h:ia') }}</strong>
                                    </td>
                                </tr>



                            @endif

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col-lg-4 hideLG pb-4 px-0">
                <div class="row">
                    <div class="col-lg-6 col-6 ">
                        <a href="{{ url('/profile/update') }}" class="btn btn-green  w-100">
                            <i class="fa fa-pencil "></i> &nbsp; Edit Profile
                        </a>
                    </div>
                    <div class="col-lg-6 col-6">

                            <a href="{{ route('/logout') }}" class="btn btn-green  w-100">
                                <i class="fa fa-sign-out "></i> &nbsp; Logout
                            </a>

                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <?php
                $country = COUNTRYNAME;

                $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'code_mad1')
                    ->where('status', '0')
                    ->inRandomOrder()
                    ->first();
                ?>
                @if (isset($ad1))
                    <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">


                        {!! $ad1->website !!}


                    </div>
                @endif


                <?php
                $country = COUNTRYNAME;

                $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'mad1')
                    ->where('status', '0')
                    ->inRandomOrder()
                    ->first();

                ?>
                @if (isset($ad1))
                    <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">

                        <a href="{{ $ad1->website }}" target="_blank"><img
                                src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt=""
                                class="img-responsive"></a>


                    </div>
                @endif
            </div>


        </div>


    </div>

</div> --}}



<style>
    .custom-card {
        margin-bottom: 20px;
        border: 0;
        box-shadow: -7.829px 11.607px 20px 0 #e4e3f5;
    }
    .btn {
    background: linear-gradient(45deg, #004c4b 26%, #28a745 83%);
}
    @media (max-width:575px) {

    }

    .custom-card {
        box-shadow: 0 10px 30px 0 var(--primary005);
    }



    .img-bg {
        background: url(https://nextjs.spruko.com/spruha/preview/_next/static/media/Stars.d277efc1.png);
        background-position: 100%;
        background-size: auto;
        background-repeat: no-repeat;
    }

    @media (min-width:992px) {
        .mt-lg-4 {
            margin-top: 1.5rem !important;
        }
    }

    .tx-white-7 {
        color: hsla(0, 0%, 100%, .7);
    }

    :root {
        --fc-daygrid-event-dot-width: 8px;
    }

    .bg-primary {
        background-color: #003f3e !important;
    }

    :root {
        --primary-bg-color: #6259ca;
        --primary-bg-hover: #403fad;
        --primary-transparentcolor: rgba(98, 89, 202, .16);
        --primary-bg-border: #6259ca;
        --dark-theme: #0e0e23;
        --dark-body: #24243e;
        --dark-border: hsla(0, 0%, 100%, .15);
        --dark-color: #d0d0e2;
        --dark-primary: #6259ca;
        --indigo: indigo;
        --purple: #6f42c1;
        --pink: #f1388b;
        --orange: #fd7e14;
        --yellow: #ffc107;
        --green: #28a745;
        --teal: #20c997;
        --cyan: #17a2b8;
        --white: #fff;
        --gray: #6c757d;
        --gray-dark: #343a40;
        --primary: #007bff;
        --secondary: #6c757d;
        --success: #28a745;
        --info: #17a2b8;
        --warning: #ffc107;
        --danger: #dc3545;
        --light: #f8f9fa;
        --dark: #343a40;

    }
    .black_bar {

    margin: 0px ;
}
</style>

<div class="row row-sm mt-lg-4 ">

    <div class="col-sm-12 col-lg-12 px-0 col-xl-12">
        <div class="card bg-primary custom-card card-box">
            <div class="card-body px-1 pt-4">
                <div class="row align-items-center pt-5">
                    <div class="offset-xl-2 offset-sm-3 col-xl-3 col-sm-3 col-12 img-bg ">
                        <h4 class="d-flex mb-3"><span
                                class="font-weight-bold text-white ">Hi, {{ currentUser()->full_name }}</span>
                        </h4>
                        <p class="tx-white-7 mb-1">
                            @if (currentUser()->subscription_status == '0')
                                <tr>
                                    <td class="text-white font-bold"><strong>You are currently on a</strong></td>
                                    <td class="text-white font-bold text-warning"><strong class="text-warning">

                                                free Plan

                                        </strong></td>



                                </tr>
                                @if (currentUser()->sub_count > 0)
                                   ( <tr>
                                        <td class="text-white font-bold"><strong>Recent plan Expired:
                                            </strong>
                                        </td>
                                        <td class=" font-bold text-danger"><strong class="text-danger">


                                                {{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M @ h:ia') }}



                                            </strong>
                                        </td>
                                    </tr>)
                                @endif
                            @else
                                <tr>
                                    <td class="text-white font-bold"><strong>You are currently on</strong></td>
                                    <td class=" font-bold text-danger">
                                        <strong class="text-success">{{ currentUser()->sub->category }} <small
                                                class="text-warning">({{ currentUser()->sub->planName }} Package
                                                )</small><span class="badge badge-success">active</span></strong>
                                    </td>
                                </tr>
                                <br>
                                <tr>
                                    <td class="text-white font-bold"><strong>Subscribed Date:</strong></td>
                                    <td class="text-white font-bold "><strong class="text-warning">
                                            {{ \Carbon\Carbon::parse(currentUser()->date_subscribed)->format('d M @ h:ia') }}</strong>
                                    </td>
                                </tr>
                                <br class="hideLG">
                                <tr>
                                    <td class="text-white font-bold"><strong>Expiry date:</strong></td>
                                    <td class="text-danger font-bold"><strong class="text-danger">
                                            {{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M @ h:ia') }}</strong>
                                    </td>
                                </tr>



                            @endif
                        </p>
                    </div>
                    <div class="col-lg-2">
                        <div class="col-12 px-0">
                            <a  class="btn btn-default w-100 btn-sm text-white" href="{{ route('/portal/update') }}">
                            <span class="fa fa-pencil"></span> Edit Profile
                          </a>
                        </div>

                          <br>
                          <div class="col-12 px-0">
                          <a  class="btn btn-default btn-sm w-100 text-white" href="{{ url('/logout') }}">
                            <span class="fa fa-sign-out"></span> logout
                          </a>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center  ">

                        <br class="hideLG">

                            <a href="#" target="_blank"><img
                                    src="{{ url('/') }}/images/ads/advert.gif" alt=""
                                    class="img-responsive"></a>






                        <?php
                        $country = COUNTRYNAME;

                        $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'code_mad1')
                            ->where('status', '0')
                            ->inRandomOrder()
                            ->first();
                        ?>
                        @if (isset($ad1))
                            <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">


                                {!! $ad1->website !!}


                            </div>
                        @endif


                        <?php
                        $country = COUNTRYNAME;

                        $ad1 = \App\Solos\Modules\Ad\Model\Ad::where('location', 'mad1')
                            ->where('status', '0')
                            ->inRandomOrder()
                            ->first();

                        ?>
                        @if (isset($ad1))
                            <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">

                                <a href="{{ $ad1->website }}" target="_blank"><img
                                        src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt=""
                                        class="img-responsive"></a>


                            </div>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </div>
