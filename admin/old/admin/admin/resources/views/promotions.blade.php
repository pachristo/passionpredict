@extends('layouts.master')

@section('title')
    Passion Predict   | PROMOTIONS
@endsection
@section('page')
    Promotions
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>
{{--        {{date('Y-m-d H:i:s', strtotime('29-08-2017 01:46pm'))}}--}}
        <a href="{{route('/createPromotion')}}"><button class="btn btn-md btn-success">CREATE PROMOTION</button></a>

        <hr>
        <div class="row">
            <div class="col-xs-12" id="">
                <table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>TITLE</th>
                        <th>PUBLISH ON</th>
                        <th>AUDIENCE</th>
                        <th>PUBLISH STATUS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sn=1; ?>
                    @foreach($promotions->all() as $promotion)
                        <tr id="prom{{$promotion->id}}">
                            <td>{{$sn++}}</td>
                            <td>{!! $promotion->title !!}</td>
                            <td>{!! \Carbon\Carbon::parse($promotion->publishOn)->format('j M, Y h:ia') !!}</td>
                            <td>{{$promotion->accessible}}</td>
                            <td>@if($promotion->publishStatus==1) Publish @else Draft @endif</td>
                            <td>
                                <a href="{{route('/viewProm')}}" class="viewProm" data-id="{{$promotion->id}}" data-target="#promotionView" data-toggle="modal"><i class="fa fa-eye fa-2x"></i></a> &nbsp;
                                <a href="{{route('/editPromotion')}}" class="viewProm" data-id="{{$promotion->id}}" data-target="#promotionView" data-toggle="modal"><i class="fa fa-edit fa-2x"></i></a> &nbsp;
                                <a href="{{route('/deletePromotion')}}" data-id="{{$promotion->id}}" class="deletePromotion"><i class="fa fa-trash fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
