@extends('layouts.master')

@section('title')
    Passion Predict   | Notifications
@endsection
@section('page')
    Manage Notifications
@endsection
@section('content')
    <div class="col" style="min-height: 323px;;">
        <br>
        <table class="table">
            @foreach($notes->all() as $note)
            <tr id="note{{$note->id}}">
                <td><img src="{{$path}}/notification/{{$note->note_image}}" class="img-responsive" style="max-height: 150px;"> </td>
                <td><a href="{{$note->id}}" class="notedelete"><button class="btn btn-sm btn-danger">DELETE</button></a> </td>
            </tr>
            @endforeach
        </table>
    </div>


@endsection
