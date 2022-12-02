@extends('layouts.master')

@section('title')
    Passion Predict   | Advertisement
@endsection
@section('page')
    Sponsored Ads
@endsection
@section('content')
    <div class="col-sm-12">
        <span class="pull-right"><a href="#" data-target="#sponsorModal" data-toggle="modal"><button class="btn btn-md btn-success">ADD NEW LINK</button></a></span>
        <hr>
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>SN</th>
                <th>SPONSOR NAME</th>
                <th>SPONSOR LINK</th>
                <th>STATUS</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ads as $key => $item)
                <tr id="record{{$item->id}}">
                    <td class="red">{{$key+1}}</td>
                    <td>{{$item->sponsorName}}</td>
                    <td>{{$item->sponsorUrl}}</td>
                    <td>
                        @if($item->publishStatus=='0')
                            <span class="text-success">Published</span>
                        @else
                            <span class="text-danger">Draft</span>
                        @endif
                    </td>
                    <td><a class="fetchSponsor" href="{{route('/editSponsor')}}" data-id="{{$item->id}}" data-target="#editSponsor" data-toggle="modal"><span style="color: green;"><i class="fa fa-edit"></i> EDIT</span></a></td>
                    <td><a href="{{route('/deleteSponsor')}}" class="deleteItem" data-id="{{$item->id}}" data-msg="DELETE THIS SPONSOR"><i class=" fa fa-trash-o"></i> DELETE</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
