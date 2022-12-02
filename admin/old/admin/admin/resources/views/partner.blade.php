@extends('layouts.master')

@section('title')
     Admin Panel   | Partners page
@endsection
@section('page')
   Partners
@endsection
@section('content')
    <div class="col">
        <br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
     

        <form action="{{ url('/partners') }}" method="POST" id="partnersForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">

                   

                    
                      

                        <div class="form-group col-sm-4">
                            <label>WEBSITE URL (if any)</label>
                            <input class="form-control" name="link" placeholder="URL here">
                        </div>
                        
                        
                        <div class="form-group col-sm-4">
                            <label>WEBSITE NAME</label>
                            <input class="form-control" name="name" placeholder="URL here">
                        </div>


                        
                      

                       
                

                        {!! csrf_field() !!}
                        <div class="form-group col-sm-4"  style="    padding-top: 22px;">
                            <button class="btn btn-md btn-success" name="submit" id="adsBtn">ADD PARTNERS</button>
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
                    <th>WEBSITE NAME</th>
                    <th>URL </th>
                 
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $ad)
                    <tr id="d{{ $ad->id }}">
                        <td class="red">{{ $ad->id }}</td>
                        <td>{{ $ad->name }}</td>
                        <td>
                          
                            {{ $ad->link }}
                        </td>
                     

                        <td>
                            <div class="btn-group">
                                <a class="adsdelete" href="{{ url('/partners_del') }}"
                                            data-id="{{ $ad->id }}">DELETE</a>
                              
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection