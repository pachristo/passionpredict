@extends('layout.auth')
@section('title')
    Register - Passionpredict.com
@endsection
@section('seo')

@endsection


@section('body')
<h3 class="text-white">Create An Cccount</h3>
<div class="form-group col-sm-12">
    @if(session('err'))
        <div class="alert alert-danger alert-dismissible">
            <p>{{session('err')}}</p>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <p>{{session('success')}}</p>
        </div>
    @endif

</div>
<form action="{{route('/register')}}" method="post" id="registerForm" data-callback="{{route('/login')}}">
    <div class="form-group">
        <input type="text" name="full_name" class="form-control" placeholder="Full Name" aria-label="Full Name">
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
    </div>
    <div class="form-group">

        <select name="country" class="form-control form-control-lg crs-country select2" data-region-id="one" required id=""></select>
    </div>
    <div class="form-group clearfix">
        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
    </div>
    <div class="form-group ">
        <input type="password" name="password_confirmation" class="form-control" autocomplete="off" placeholder=" Confirm Password" aria-label="Password">
    </div>
    <div class="form-group clearfix">
        <div class="checkbox">
            <div class="form-check checkbox-theme">
                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                <label class="form-check-label text-white" for="rememberMe">
                    I agree to the<a href="#" class="terms text-white">terms of service</a>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group mb-0 clearfix">
        <button type="submit" class="btn-md btn-theme btn float-start w-100"  id="regBtn">Register</button>
    </div>


</form>
<p class="mt-2 text-white">Already a member? <a href="{{ url('/login') }}" class="thembo text-success"> Login here</a></p>
    </div>
@endsection

