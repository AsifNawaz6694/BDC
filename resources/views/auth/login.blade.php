@extends('layouts.app')

@section('content')
    @include('partials/no-slider')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 login">
                <div class="image-signup"><img src="{{ asset('app/images/bdc_logo.png') }}" class="img-responsive">
                </div>
                <hr>
                <form method="POST" action="{{ route('login') }}">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <div class="pass">
                            <a href="{{ route('password.request') }}">Forgot your password ?</a>
                        </div>
                    </div>


                    <div class="form-group" role="group" aria-label="...">
                        <a href="{{ route('login') }}" class="btn btn-default_signup">NO ACCOUNT? SIGN UP NOW</a>

                        <button type="submit" class="btn login_now">LOGIN NOW</button>
                        {{ csrf_field() }}
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection