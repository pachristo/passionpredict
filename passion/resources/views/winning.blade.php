@extends('layout.main')
@section('title')
    Testimonial - Passionpredict.com
@endsection

@section('seo')


@endsection
@section('winning', 'active')
@section('levelCSS')

@endsection


@section('content')
    @include('partials.breadcrum', ['title' => 'Testimonial '])
    @if (session()->has('error'))
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
    @endif
    <style>
        .pricing {
            text-align: center;

        }
    </style>

    <div class="container container-bg">

            <div class="col-sm-12" style=" padding: 0px;">
                <?php
                $testimonials = \App\Solos\Modules\Prediction\Model\Prediction::where('display', '0')
                    ->where('testimonial', '1')
                    ->where('testimonialValue', '!=', '')
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(25);

                ?>

                <div class="col-sm-12 px-0 nopaddingsmall">

                    @if (count($testimonials) > 0)
                        <table style="" width="100%" class="table table-striped myTableSmall">
                            <thead style="">
                                <tr>
                                    <td style="width: 8%;">Time</td>
                                    <td style="width: 8%;">League</td>
                                    <td style="width: 67%;">Match</td>
                                    <td style="width: 9%;">Tip</td>
                                    <td style="width: 10%;">Score</td>


                                </tr>
                            </thead>
                            <tbody style="text-align: center!important;">
                                @foreach ($testimonials as $key => $item)
                                    <tr style="height: 21px;">
                                        <td style="">
                                            <span>{{ \Carbon\Carbon::parse($item->gameDate)->format('d/m') }}</span>
                                        </td>
                                        <td><span>{{ $item->league }}</span></td>
                                        <td style=""><span>{{ $item->teamOne }}
                                                <span style="color: #ff0000;"><strong>VS</strong></span>
                                                {{ $item->teamTwo }}</span></td>
                                        <td><span><strong>{{ $item->testimonialValue }}</strong></span></td>
                                        <td><span>
                                            <strong>{{ $item->teamOneScore }}
                                                @if (trim($item->teamOneScore) != 'pstp')
                                                        :
                                                    @endif
                                                    {{ $item->teamTwoScore }}</strong></span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <center>{{ $testimonials->render() }}</center> --}}
                        <div class="d-flex justify-content-center">
                            {!! $testimonials->links() !!}
                        </div>
                    @else
                        <span>
                            <center>
                                <h4 class="alert alert-warning">STILL GATHERING TESTIMONIALS!</h4>
                            </center>
                        </span>
                    @endif
                    <br>
                </div>
            </div>

        <br>
        <br>
    </div>



@endsection
