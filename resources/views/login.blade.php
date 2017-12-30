@extends('layouts.app')

@section('content')
    @include('partials/no-slider')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 login">
                <div class="image-signup"><img src="images/bdc_logo.png" class="img-responsive"></div>
                <hr>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Forgot your password ?">
                    </div>


                    <div class="form-group" role="group" aria-label="...">
                        <a href="{{ route('publicPages', ['slug' => 'signup']) }}" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>
                        <a href="#" class="btn btn-default_login">LOGIN NOW</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection