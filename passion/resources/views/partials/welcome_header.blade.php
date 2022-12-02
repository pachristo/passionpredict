<div class="container-fluid container-bg p-0 pb-4"
    style="
        background-image: linear-gradient(to bottom, rgb(0 63 62 / 94%), rgb(0 63 62)), url({{ asset('stadium.jpeg') }});
">
    <div class=" container">
        <style>

        </style>

        <div class="row center-banner  padding-50  nopaddingsmall ">

            <div class="col-lg-5 px-1 pt-4">
                <h1 class="text-white header-text-banner-big">Free
                    <br class="hideLG"> Football
                    <br class=""><span class="text-green">Predictions Website</span>
                </h1>
                <p class="text-white header-text-banner-small">Passion Predict is an innovative Free Football Prediction
                    site passionately provided in providing the most Accurate Football Predictions, Tips and Analysis to
                    its users around the W🌎rld
                </p>

                <div class="row mx-0">
                    <div class="col-lg-6 col-6 px-1 ">
                        @if (!currentUser())
                            <a href="{{ route('/register') }}" class="btn btn-green   w-100">
                                Register
                            </a>
                        @else
                            <a href="{{ route('/portal/home') }}" class="btn btn-green  w-100">
                                <i class="fa fa-user-circle-o "></i> &nbsp; Account
                            </a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-6 px-1">
                        @if (!currentUser())
                            <a href="{{ route('/login') }}" class="btn btn-green  w-100">
                                Login
                            </a>
                        @else
                            <a href="{{ route('/logout') }}" class="btn btn-green  w-100">
                                <i class="fa fa-sign-out "></i> &nbsp; Logout
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 hideSM">
                <div class="row">
                    <span class="hideSM mt-2">
                        &nbsp;
                    </span>
                    <span class="hideSM mt-2">
                        &nbsp;
                    </span>
                    <div class="col-lg-12 col-12 mt-2 mb-3 ">
                        <a href="{{ route('/pricing') }}" class="btn text-white bg-green  w-100">
                           <strong> VIP Packages</strong>
                        </a>
                    </div>


                    <div class="col-lg-12 col-12 mt-2 mb-3  ">
                        <a href="{{ route('/pricing') }}" class="btn text-white  bg-pink w-100">
                           <strong>How To Pay</strong>
                        </a>
                    </div>

                    <div class="col-lg-12 col-12 mt-2 mb-3  ">
                        <a href="{{ route('stores_tips') }}" class="btn text-black  bg-white w-100">
                           <strong class="text-white">Tips Store</strong>
                        </a>
                    </div>

                    <div class="col-lg-12 col-12 mt-2  ">
                        <a href="{{ $telegramlink }}" class="btn btn-success btn-blue-light  w-100">
                            <strong><i class="fa  fa-telegram "></i>&nbsp; Join us on Telegram</strong>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 hideLG px-0">
                <div class="row mx-0">

                    <div class="col-lg-12 col-12 mt-2 px-1 ">
                        <a href="{{ route('/pricing') }}" class="btn text-white bg-green  w-100">
                           <strong> VIP Packages</strong>
                        </a>
                    </div>


                    <div class="col-lg-12 col-12 mt-2 px-1  ">
                        <a href="{{ route('/pricing') }}" class="btn text-white  bg-pink w-100">
                           <strong>How To Pay</strong>
                        </a>
                    </div>

                    <div class="col-lg-12 col-12 mt-2 px-1 ">
                        <a href="{{ route('stores_tips') }}" class="btn text-black  bg-white w-100">
                           <strong class="text-white">Tips Store</strong>
                        </a>
                    </div>

                    <div class="col-lg-12 col-12 mt-2 px-1  ">
                        <a href="{{ $telegramlink }}" class="btn btn-success btn-blue-light  w-100">
                            <strong><i class="fa  fa-telegram "></i>&nbsp; Join us on Telegram</strong>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4  pt-4 nopaddingrightsmall  nopaddingleftsmall">

                <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">

                    <a href="#" target="_blank"><img
                            src="./images/ads/mobile.gif" alt=""
                            class="img-responsive"></a>


                </div>


                {{-- <div class="  text-center col-lg-12 pb-2 nopaddingsmall mb-2">

                    <a href="#" target="_blank"><img
                            src="./images/ads/desktop.gif" alt=""
                            class="img-responsive"></a>


                </div> --}}
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
