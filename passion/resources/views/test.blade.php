@php

$bb = DB::connection('mysql2')->table("users")->where('email','Radioboyng@gmail.com')->first();
dd($bb);

@endphp