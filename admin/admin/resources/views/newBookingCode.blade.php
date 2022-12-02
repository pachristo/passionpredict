@extends('layouts.master')

@section('title')
    Passion Predict   | NEW BOOKING CODE
@endsection

@section('page')
    New Booking Code
@endsection

@section('content')
    <div class="col" style="min-height: 323px;;">
        <br><br>

        <form method="POST" action="{{route('/newBookingCode')}}" id="codeForm">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="form-group col-sm-6">
                        <label for="">*MATCH DATE</label>
                        <input class="form-control" name="codeDate" id="matchdate" type="text" placeholder="MATCH TIME *" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">*PREDICTION STORE</label>
                        <select name="VIPCategory" required class="form-control" id="">
                            <option value="">**SELECT VIP STORE**</option>
                            <option value="sure2">Sure 2 Odds</option>
                            <option value="sure3">Sure 3 Odds</option>
                            <option value="over35">Over 3.5 Goals</option>
                            <option value="superSingle">Super Singles</option>
                            <option value="sure5">Sure 5 Odds</option>
                            <option value="sure50">50 Odds</option>
                            <option value="weekend">Weekend Tips</option>
                            <option value="htft">HTFT Tips</option>
                            <option value="investment">Super Investment Tip</option>
                            <option value="free">Free Tips</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="">*BATCH</label>
                        <select name="codeTime" required class="form-control" id="">
                            <option value="">**BATCH**</option>
                            <option value="one">Set One</option>
                            <option value="two">Set Two</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="moreoption">*BOOKING CODE *</label>
                        <input type="text" name="bookingCode" required class="form-control">
                        {{ csrf_field() }}
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">*BOOKMAKER</label>
                        <select name="bookMaker" required class="form-control" id="">
                            <option value="GIBET">GIBET</option>
                            <option value="1XBet">1XBet</option>
                            <option value="BetKing">BetKing</option>
                            <option value="Bigibet">Bigibet</option>
                            <option value="Bet9ja">Bet9ja</option>
                            <option value="ZEbet">ZEbet</option>
                            <option value="MSPORT">MSPORT</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                    <label>*SELECT COUNTRIES</label>
                                <select name="country" class="form-control crs-country select2form" data-region-id="one" required id=""></select>
                 </div>
                    {{--<div class="form-group col-sm-4">--}}
                        {{--<label for="">STATUS</label>--}}
                        {{--<select name="status" required class="form-control" id="">--}}
                            {{--<option value="0" selected>Publish Now</option>--}}
                            {{--<option value="1">Save as Draft</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    <div id="pstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <br>
                        <button class="btn btn-md btn-success" name="submit" id="codeBtn">SUBMIT CODE</button>
                    </div>
                </div>
            </div>
            {{--</div>--}}
        </form>
    </div>
@endsection