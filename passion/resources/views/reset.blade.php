


@extends('layout.auth')
@section('title')
    Set New Password - Passionpredict.com
@endsection
@section('seo')

@endsection
@section('levelCSS')
@endsection


@section('body')


    <h3 class="text-white">SET NEW PASSWORD</h3>
    <div class="form-group col-sm-12">
        @if (session('err'))
            <div class="alert alert-danger alert-dismissible">
                <p>{{ session('err') }}</p>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <p>{{ session('success') }}</p>
            </div>
        @endif

    </div>
    <form method="post"  action="{{route('/resetPasswordNow')}}">

        <div class="form-group">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="code" value="{{$code}}">

        </div>

        <div class="form-group clearfix">
            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Create New Password"
                aria-label="Password">
        </div>
        <div class="form-group clearfix">
            <input type="password" name="password_confirmation" class="form-control" autocomplete="off" placeholder="Confirm New Password"
                aria-label="Password">
        </div>
        @csrf

        <div class="form-group mb-0 clearfix">
            <button type="submit" class="btn-md btn-theme btn float-start w-100">Reset</button>
        </div>


    </form>
    <p class="mt-2 text-white">Yes, I Remember !  <a href="{{ url('/login') }}" class="thembo text-success"> login
            </a> <br>

    </p>
@endsection

