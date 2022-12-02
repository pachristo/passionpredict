<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="collapse navbar-collapse pull-right">

            @if (!currentUser())
                <a href="{{ route('/login') }}"><button type="button" class="btn btn-success navbar-btn login-btn"
                        style="">LOGIN</button></a>
                <a href="{{ route('/register') }}"><button type="button" class="btn btn-warning navbar-btn"
                        style="margin-left: 0px;">REGISTER</button></a>
                <button class="text-center" style="background-color: black; color: white; border: none;"><span
                        class="box mask-type " data-description="Locale"
                        style="color:white;font-size:0.8em;">{{ COUNTRYCODE }}</span></button>
            @else
                <a href="{{ route('/portal/home') }}"><button type="button" class="btn btn-success navbar-btn login-btn"
                        style="">My Account</button></a>
                <button class="text-center" style="background-color: black; color: white; border: none;"><span
                        class="box mask-type " data-description="Locale"
                        style="color:white;font-size:0.8em;">{{ COUNTRYCODE }}</span></button>
            @endif
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="margin-top: 12px;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('/') }}"><img src="{{ asset('images/logo.png') }}"
                    class="logo" alt="Victors Predict" style="max-width: 100px; margin-top: -8px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ route('/') }}"><i class="fa fa-home"></i> <span
                            class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('/tip-stores') }}">TIP STORES</a></li>
                <li><a href="{{ route('/archives') }}">PREDICTION RESULTS</a></li>
                {{-- <li><a href="{{route('/bet_offers')}}">BET OFFERS</a></li> --}}
                <li><a href="{{ route('/league_table') }}">LEAGUE TABLE</a></li>
                <li><a href="{{ route('/1xbet') }}">1XBET</a></li>
                <li><a href="{{ url('/Cyberbet') }}">CYBER BET</a></li>
                {{-- <li><a href="{{route('/gibet')}}">GIBET</a></li> --}}
                <li class="hideLG hdeMD">

                    <div class="row">
                        <div class="col-sm-12">
                            @if (!currentUser())
                                <a href="{{ route('/login') }}" class="btn btn-success col-xs-5 navbar-btn"
                                    style="margin-left: 15px;">LOGIN</a>
                                <a href="{{ route('/register') }}"
                                    class="btn btn-warning col-xs-5 navbar-btn">REGISTER</a>

                                <br>
                                <br>
                                <button class="text-center" style="
                                  /*element {*/
                                background-color: #222;
                                color: white;
                                border: none;
                                margin-top: 9px;
                                border: ;
                                text-align: center;
                                margin-left: 19px;




                                  "><span class="box mask-type " data-description="Locale"
                                        style="color:white;font-size:0.8em;">{{ COUNTRYCODE }}</span></button>
                            @else
                                <a href="{{ route('/portal/home') }}"><button type="button"
                                        class="btn btn-success navbar-btn login-btn" style="">My Account</button></a>

                                <br>
                                <br>
                                <button class="text-center" style="
                                  /*element {*/
                                background-color: #222;
                                color: white;
                                border: none;
                                margin-top: 9px;
                                border: ;
                                text-align: center;
                                margin-left: 19px;




                                  "><span class="box mask-type " data-description="Locale"
                                        style="color:white;font-size:0.8em;">{{ COUNTRYCODE }}</span></button>
                            @endif
                        </div>
                    </div>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div>
</nav>
