@extends('layout.auth')
@section('title')
    Reset Password - Passionpredict.com
@endsection
@section('seo')
@endsection
@section('levelCSS')
@endsection


@section('body')



    <h3 class="text-white">RESET PASSWORD</h3>
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
    <form method="post" id="resetForm" action="{{ route('/resetPassword') }}">

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email Address"
                aria-label="Email Address">
        </div>


        @csrf

        <div class="form-group mb-0 clearfix">
            <button type="submit" class="btn-md btn-theme btn float-start w-100"id="resetBtn">RESET NOW </button>
        </div>


    </form>
    <p class="mt-2 text-white">Yes, I remember ! <a href="{{ url('/login') }}" class="thembo text-success"> Login
            here</a> <br>

    </p>
@endsection
