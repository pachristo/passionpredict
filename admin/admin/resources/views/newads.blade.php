@extends('layouts.master')

@section('title')
    Passion Predict | Image Advertisement
@endsection
@section('page')
    New Ads
@endsection
@section('content')
    <?php
    
    $persons = auth()->user();
    
    ?>
    @if ($persons->category == 'Super')

        <div class="col">
            <br>
            <?php
            $date = new dateTime();
            $d = $date->format('j F, Y');
            ?>
            @if (isset($success))
                <script>
                    alert('{{ $success }}');
                </script>
            @endif

            <form action="{{ route('/newAds') }}" method="POST" id="adsForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-10 col-md-offset-1">

                        <div class="col-md-4">
                            {{-- <label>ADs IMAGE</label> --}}
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 250px; height: 150px;"><img
                                        src="{{ asset('images/demoUpload.jpg') }}" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail"
                                    style="max-width: 160px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-sm btn-file btn-danger"><span class="fileupload-new">SELECT AD
                                            IMAGE</span><span class="fileupload-exists">Change</span>
                                        <input type="file" name="file" /></span>
                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists"
                                        data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group col-sm-4">
                                <label>ADS TYPE</label>
                                <select name="position" class="form-control" required>
                                    <option value="">*_*_*_*_*_*_*_*</option>
                                    <option value="image">Image</option>

                                    <option value="code">Code </option>
                                </select>
                            </div>

                            <div class="form-group col-sm-8">
                                <label>ADS POSITION</label>
                                <select name="location" class="form-control" required>
                                    <option value="">*_*_*_*_*_*_*_*</option>
                                    <optgroup label="Homepage Top Header">
                                        <option value="ad1">Homepage Top Header : 728 x 90px (image) (Desktop ONly)</option>
                                        <option value="code_ad1">Homepage Top Header : 728 x 90px (code) (Desktop ONly)
                                        </option>
                                        <option value="mad1">Homepage Top Header : 300 x 250px (image) (Mobile)</option>
                                        <option value="code_mad1">Homepage Top Header : 300 x 250px (code) ( Mobile)
                                        </option>
                                    </optgroup>
                                    <optgroup label="Under Homepage Header">
                                        <option value="ad2a">Under Homepage Header: 940 x 90px (image) (Desktop Only)
                                        </option>
                                        <option value="ad2b">Under Homepage Header : 300 x 250px (image)(Mobile Only)
                                        </option>
                                        <option value="code_ad2a">Under Homepage Header: 940 x 90px (code) (Desktop Only)
                                        </option>

                                        <option value="code_ad2b">Under Homepage Header : 300 x 250px (code)(Mobile Only)
                                        </option>
                                    </optgroup>

                                    <optgroup label="Above Investment  Homepage">
                                        <option value="ad3a">Above Investment Homepage : 940 x 90px (image) (Desktop Only)
                                        </option>
                                        <option value="ad3b">Above Investment Homepage : 300 x 250px (image) (Mobile Only)
                                        </option>

                                        <option value="code_ad3a">Above Investment Homepage : 940 x 90px (code) (Desktop
                                            Only)
                                        </option>
                                        <option value="code_ad3b">Above Investment Homepage : 300 x 250px (code) (Mobile
                                            Only)
                                        </option>
                                    </optgroup>
                                    <optgroup label="Under Investment Scheme homepage">
                                        <option value="uis">Under investment scheme homepage : 940 x 90px (image) (Desktop
                                            Only)
                                        </option>
                                        <option value="muis">Under investment scheme homepage : 300 x 250px (image) (Mobile
                                            Only)</option>
                                        <option value="code_uis">Under investment scheme homepage : 940 x 90px (code)
                                            (Desktop
                                            Only)</option>
                                        <option value="mcode_uis">Under investment scheme homepage : 300 x 250px (code)
                                            (Mobile
                                            Only)</option>
                                    </optgroup>
                                    <optgroup label="Under Upcoming Tips Homepage">

                                        <option value="uct">Under Upcoming Tips homepage : 300 x 250px (image) (Desktop &
                                            Mobile
                                            )
                                        </option>
                                        <option value="code_uct">Under Upcoming Tips homepage : 300 x 250px (code) (Desktop
                                            &
                                            Mobile )
                                        </option>
                                    </optgroup>


                                    <optgroup label="Above Tips category Homepage">

                                        <option value="ad5a">Above Tips category Homepage : 940 x 90px (image) (Desktop
                                            Only)
                                        </option>
                                        <option value="ad5b">Above Tips category Homepage: 300 x 25px (image)(Mobile Only)
                                        </option>

                                        <option value="code_ad5a">Above Tips category Homepage : 940 x 90px(code) (Desktop
                                            Only)
                                        </option>
                                        <option value="code_ad5b">Above Tips category Homepage: 300 x 25px (code)(Mobile
                                            Only)
                                        </option>
                                    </optgroup>

                                    <optgroup label="Category Page Advert">

                                        <option value="ad6a">Category Page Advert : 940 x 90px (image) (Desktop Only)
                                        </option>
                                        <option value="ad6b">Category Page Advert : 300 x 25px (image)(Mobile Only)</option>

                                        <option value="code_ad6a">Category Page Advert: 940 x 90px (code) (Desktop Only)
                                        </option>
                                        <option value="code_ad6b">Category Page Advert : 300 x 25px (code)(Mobile Only)
                                        </option>
                                    </optgroup>



                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>WEBSITE URL (if any)</label>
                                <input class="form-control" name="url" placeholder="URL here">
                            </div>

                            <input type="hidden" class="form-control" name="description"
                                placeholder="Name Or Description">

                            <div class="form-group col-sm-8">
                                <label>*SELECT COUNTRIES</label>
                                <select class="form-control" name="country">
                                    <option value="All">All</option>
                                    {{-- <option value="Nigeria">Nigeria</option> --}}
                                    {{-- <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> --}}
                                    {{-- <option value="Ghana">Ghana</option> --}}
                                    {{-- <option value="Uganda">Uganda</option> --}}
                                    {{-- <option value="Kenya">Kenya</option> --}}
                                    {{-- <option value="South Africa">South Africa</option>
                                    <option value="Zambia">Zambia</option> --}}
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>CODE</label>
                                <textarea name="code" class="form-control" style="width:650px;height:150px"></textarea>
                                {{-- <option value="1">Hide on PC/Show Mobile</option> --}}
                                {{-- <option value="2">Hide on Mobile/Show PC</option> --}}
                                {{-- <option value="0" selected>Show on All</option> --}}
                                {{-- </textarea> --}}
                            </div>

                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <button class="btn btn-md btn-success" name="submit" id="adsBtn">UPLOAD AD</button>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
            <hr>

            <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>REL</th>
                        <th>TYPE</th>
                        <th>POSITION</th>
                        <th>THUMBNAIL</th>
                        <th>COUNTRY</th>
                        <th>LINK URL</th>
                        <th>DISPLAY</th>

                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads->all() as $ad)
                        <tr id="d{{ $ad->id }}">
                            <td class="red">{{ $ad->id }}</td>
                            <td>{{ $ad->position }}</td>
                            <td>
                                @if ($ad->location == 'ad1')
                                    Homepage Top Header : 728 x 90px (image) (Desktop ONly)
                                @elseif($ad->location == 'code_ad1')
                                    Homepage Top Header : 728 x 90px (code) (Desktop ONly)
                                @elseif($ad->location == 'mad1')
                                    Homepage Top Header : 300 x 250px (image) (Mobile)

                                @elseif($ad->location == 'code_mad1')
                                    Homepage Top Header : 300 x 250px (code) ( Mobile)
                                @elseif($ad->location == 'ad2a')
                                    Under Homepage Header: 940 x 90px (image) (Desktop Only)
                                @elseif($ad->location == 'ad2b')
                                    Under Homepage Header : 300 x 250px (image)(Mobile Only)
                                @elseif($ad->location == 'ad3a')
                                    Above Investment Homepage : 940 x 90px (image) (Desktop Only)
                                @elseif($ad->location == 'ad3b')
                                    Above Investment Homepage : 300 x 250px (image) (Mobile Only)
                                @elseif($ad->location == 'ad4')
                                    Advert 4 : 300 x 250px (image)(Desktop & Mobile)
                                @elseif($ad->location == 'ad5a')
                                    Above Tips category Homepage : 940 x 90px (image)(Desktop Only)
                                @elseif($ad->location == 'ad5b')
                                    Above Tips category Homepage: 300 x 25px (image) (Mobile Only)
                                @elseif($ad->location == 'ad6a')
                                    Category Page Advert: 940 x 90px (image) (Desktop Only)
                                @elseif($ad->location == 'ad6b')
                                    Category Page Advert : 300 x 25px (image) (Mobile Only)

                                @elseif($ad->location == 'uct')
                                    Under Upcoming Tips homepage : 300 x 250px (image) (Desktop & Mobile )

                                @elseif($ad->location == 'code_uct')
                                    Under Upcoming Tips homepage : 300 x 250px (code) (Desktop & Mobile )


                                @elseif($ad->location == 'ad7')
                                    Header category small icons : 152px x 152px (image)(Desktop & Mobile)
                                @elseif($ad->location == 'ad8a')
                                    Advert 8A (Other Sports) : 940 x 90px (image) (Desktop Only)
                                @elseif($ad->location == 'ad8b')
                                    Advert 8B (Other Sports) : 300 x 250px (image)(Mobile Only)
                                @elseif($ad->location == 'stickya')
                                    Bottom Sticky Banner A : 728 by 90px (image)(Desktop Only)
                                @elseif($ad->location == 'stickyb')
                                    Bottom Sticky Banner A : 728 by 90px (image) (Desktop Only)
                                @elseif($ad->location == 'PopupAds')
                                    Pop up advert on Home Page : 300 by 250px
                                @endif

                                @if ($ad->location == 'code_ad1')
                                    Homepage Top Header : 300 x 250px (code) (Desktop & Mobile)
                                @elseif($ad->location == 'code_ad2a')
                                    Under Homepage Header: 940 x 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_ad2b')
                                    Under Homepage Header : 300 x 250px (code) (Mobile Only)


                                @elseif($ad->location == 'uis')

                                    Under investment scheme homepage : 940 x 90px (image) (Desktop Only)
                                @elseif($ad->location == 'muis')
                                    Under investment scheme homepage : 300 x 250px (image) (Mobile Only)

                                @elseif($ad->location == 'code_uis')
                                    Under investment scheme homepage : 940 x 90px (code) (Desktop Only)

                                @elseif($ad->location == 'mcode_uis')
                                    Under investment scheme homepage : 300 x 250px (code) (Mobile Only)

                                @elseif($ad->location == 'code_ad3a')
                                    Above Investment Homepage : 940 x 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_ad3b')
                                    Above Investment Homepage : 300 x 250px (code) (Mobile Only)
                                @elseif($ad->location == 'code_ad4')
                                    Advert 4 : 300 x 250px (code) (Desktop & Mobile)
                                @elseif($ad->location == 'code_ad5a')
                                    Above Tips category Homepage : 940 x 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_ad5b')
                                    Above Tips category Homepage: 300 x 25px (code) (Mobile Only)
                                @elseif($ad->location == 'code_ad6a')
                                    Category Page Advert: 940 x 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_ad6b')
                                    Category Page Advert : 300 x 25px (code) (Mobile Only)
                                @elseif($ad->location == 'code_ad7')
                                    Advert 7 (Other Sports) : 300 x 250px (code) (Desktop & Mobile)
                                @elseif($ad->location == 'code_ad8a')
                                    Advert 8A (Other Sports) : 940 x 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_ad8b')
                                    Advert 8B (Other Sports) : 300 x 250px (code) (Mobile Only)
                                @elseif($ad->location == 'code_stickya')
                                    Bottom Sticky Banner A : 728 by 90px (code) (Desktop Only)
                                @elseif($ad->location == 'code_stickyb')
                                    Bottom Sticky Banner A : 728 by 90px (code) (Desktop Only)

                                @endif
                            </td>
                            <td>
                                @if ($ad->position == 'code')

                                    <span>
                                        <h4>
                                            Code
                                        </h4>



                                    </span>
                                @else

                                    <a href="{{ asset('images/ads') }}/{{ $ad->ads_image }}" target="_blank">
                                        <center><img src="{{ asset('images/ads') }}/{{ $ad->ads_image }}"
                                                style="max-height: 50px;" class="img-responsive" alt=""></center>
                                    </a>
                                @endif
                            </td>
                            <td>{{ $ad->country }}</td>

                            <td>
                                @if ($ad->position == 'code')

                                    <span>
                                        <h4>
                                            Code
                                        </h4>



                                    </span>
                                @else



                                    {{ $ad->website }}

                                @endif



                            </td>
                            <td>
                                @if ($ad->other == '1')
                                    Hide on PC/Show Mobile
                                @elseif($ad->other == '2')
                                    Hide on Mobile/Show PC
                                @else
                                    Show on All
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu"
                                        style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                        {{-- <li style="cursor: pointer;"><a class="updateads" href="{{$ad->id}}" data-target="#updateads" data-toggle="modal">EDIT/UPDATE</a> --}}


                                        @if ($ad->status == '0')
                                            <li style="cursor: pointer;"><a class="hidead"
                                                    href="{{ $ad->id }}" id="h{{ $ad->id }}">HIDE THIS</a>
                                            @else
                                            <li style="cursor: pointer;"><a class="unhidead"
                                                    href="{{ $ad->id }}" id="h{{ $ad->id }}"><span
                                                        style="color: green;">SHOW
                                                        THIS</span></a>
                                        @endif

                                        <li style="cursor: pointer;"><a class="adsdelete"
                                                href="{{ route('/adDelete') }}" data-id="{{ $ad->id }}">DELETE</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <center>
            Oops , Sorry You don't have the facility to view this page
        </center>
    @endif

@endsection

@section('levelJS')
    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $(document).ready(function () {




        //      $('#adsForm').submit(function(e){
        //         var url = $(this).attr('action');
        //         var method = $(this).attr('method');

        //         $('#adsBtn').html('Processing Data...');
        //         $.ajax({
        //             type: method,
        //             url: url,
        //             data:{}
        //             success: function (data) {
        //                 $('#smsuserinfobody').html(data);
        //             },
        //             failure: function (data) {
        //                 console.log(data);
        //             }
        //         });
        //     });


        //  });
    </script>

@endsection
