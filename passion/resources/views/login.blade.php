@extends('layout.auth')
@section('title')
    Login - Passionpredict.com
@endsection
@section('seo')
@endsection
@section('levelCSS')
@endsection


@section('body')
    <h3 class="text-white">Account Login</h3>
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
    <form method="post" action="{{ route('/login') }}">

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
        </div>

        <div class="form-group clearfix">
            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password"
                aria-label="Password">
        </div>
        @csrf

        <div class="form-group mb-0 clearfix">
            <button type="submit" class="btn-md btn-theme btn float-start w-100">Login</button>
        </div>


    </form>
    <p class="mt-2 text-white">Don't have an account? <a href="{{ url('/register') }}" class="thembo text-success"> Register
            here</a> <br>
        <a href="{{ route('/reset') }}" class="forgot-password text-white">Forgot Password?</a>
    </p>
@endsection
