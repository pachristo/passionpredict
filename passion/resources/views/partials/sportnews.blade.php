<div class="col-lg-12 col-sm-12 border-left-dt px-0 nopaddingsmall mt10 ">

    <h5 class="black_bar">

        Sport News
    </h5>

    <div>


        <div class="col-12 pt-2 bg-light nopaddingsmall px-1 pb-2 ">
            <div class="row  no-margin-0">
                @php
                    $blog = DB::table('blogs')
                        ->latest('created_at')
                        ->where('status', 'Publish')
                        ->paginate(4);
                @endphp
                {{-- id creator title slug category content display_image status likes other created_at updated_at --}}

                        @foreach ($blog as $key => $value)
                            @php

                                $title = $value->title;
                                if (strlen($value->title) > 50) {
                                    $title = substr($value->title, 0, 50) . '...';
                                }

                            @endphp
                            {{-- desktop --}}
                            <div class="col-lg-3 hideSM">
                                <div class="card " style="">
                                    <div class="row">
                                        <div class="blog-img-wrap col-sm-12 px-0">

                                            <a href="{{ url('/blog') }}/{{ $value->slug }}  "><img
                                                    src="{{ $path }}/blog/{{ $value->display_image }}"
                                                    alt="{{ $title }}" class="width-100" style="    height: 173px;
                                                    width: 100%;
                                                    border-radius: 5px;"></a>
                                        </div>
                                        <div class="col-sm-12 px-1 pt-2 ">
                                            <div class="blog-title-wrap  pl-2 pr-0" style="padding-top: 0px;">
                                                <h4>
                                                    <a href="{{ url('/blog') }}/{{ $value->slug }}  ">

                                                        <p class="hideSM" >{{ $value->title }}

                                                        </p>

                                                    </a>
                                                </h4>




                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            {{-- mobile --}}
                            <div class="col-12 nopaddingsmall hideLG">
                                <div class="card " style="">
                                    <div class="row">
                                        <div class="blog-img-wrap col-sm-3 col-5 p-0">

                                            <a href="{{ url('/blog') }}/{{ $value->slug }}  "><img
                                                    src="{{ $path }}/blog/{{ $value->display_image }}"
                                                    alt="{{ $title }}" class="width-100" ></a>
                                        </div>
                                        <div class="col-sm-9 col-7 p-0 pt-2 ">
                                            <div class="blog-title-wrap  pl-2" style="padding-top: 0px;">
                                                <h4>
                                                    <a href="{{ url('/blog') }}/{{ $value->slug }}  ">
                                                        <p class="hideLG">{{ $title }}

                                                        </p>
                                                        <p class="hideSM">{{ $value->title }}

                                                        </p>

                                                    </a>
                                                </h4>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


            </div>



        </div>

    </div>

</div>
