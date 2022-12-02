<div class="col-sm-12 nopaddingsmall mt10">
    <div class="container">

        <div class="col-sm-12 mt10">
            <center>
                <?php
                $country = COUNTRYNAME;
                $ad6 = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad6a', $country);
                
                //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();
                
                ?>
                <div class="hideSM">
                    @if (count($ad6)>0)
                    @foreach ($ad6 as $key=>$ad4 )
                        <br>
                        {!! $ad4->website !!}
                        <br> 
                    @endforeach
                   
                    @endif

                </div>
            </center>
            <center>
                <?php
                $country = COUNTRYNAME;
                $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('code_ad6b', $country);
                //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                ?>
                <div class="hideLG">
                    @if (count($ad4b)>0)
                    @foreach ($ad4b as $key=>$ad4b )
                        <br>
                        {!! $ad4b->website !!}
                        <br>
                    @endforeach
                        
                    @endif

                </div>


            </center>






            <center>
                <?php
                $country = COUNTRYNAME;
                $ad6 = \App\Solos\Modules\Ad\Model\Ad::getAds('ad6a', $country);
                
                //$ad4 =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();
                
                ?>
                <div class="hideSM">
                    @if (count($ad6)>0)
                    @foreach ($ad6 as  $key=>$ad4)
                         <br>
                        <a href="{{ $ad4->website }}" target="_blank"><img
                                src="{{ $path }}/ads/{{ $ad4->ads_image }}" alt=""
                                class="img-responsive"></a> <br>
                    @endforeach
                       
                    @endif

                </div>
            </center>
            <center>
                <?php
                $country = COUNTRYNAME;
                $ad4b = \App\Solos\Modules\Ad\Model\Ad::getAds('ad6b', $country);
                //$ad4b =\App\Solos\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                ?>
                <div class="hideLG">
                    @if (count($ad4b)>0)
                    @foreach ($ad4b as $key=>$ad4b )
                         <br>
                        <a href="{{ $ad4b->website }}" target="_blank"><img
                                src="{{ $path }}/ads/{{ $ad4b->ads_image }}" alt=""
                                class="img-responsive"></a><br>
                    @endforeach
                       
                    @endif

                </div>


            </center>
        </div>

    </div>
    {{-- <div class="row"> --}}

</div>
