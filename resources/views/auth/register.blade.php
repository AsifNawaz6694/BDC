@extends('layouts.app')

@section('content')
    @include('partials/no-slider')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 clearfix col-center signup_form">
                    <div class="signup_form_text">
                        <p>Sign up for your account</p>
                    </div>
                    <div class="signup_form_box">
<<<<<<< HEAD
                        <form id="Sign_up_form" method="post" action="  ">
                            <div class="form-group">
=======
                        <form id="Sign_up_form" method="post" action="{{ route('register') }}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
>>>>>>> 8b93b005166ddffa1e9977121735b25e145ee1f3
                                <label>Full Name *</label>
                                <input type="text" class="form-control validate[required]"
                                       data-errormessage-value-missing="Name of entity is required!" id="" name="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email Address *</label>
                                <input type="email" class="form-control validate[required]"
                                       data-errormessage-value-missing="Email of entity is required!" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="text" class="form-control{{ $errors->has('phone') ? ' has-error' : '' }} validate[required]"
                                       data-errormessage-value-missing="Phone of entity is required!" name="phone" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>DOB </label>
                                <input type="date" class="form-control validate[required]"
                                       data-errormessage-value-missing="Date Of Birth of entity is required!" name="birth_date" >
                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>I am a *</label>
                                <select class="form-control validate[required]{{ $errors->has('user_role') ? ' has-error' : '' }}"
                                        data-errormessage-value-missing="I am a of entity is required!" name="user_role" required>
                                    <option>Select</option>
                                    <option value="3">Innovator</option>
                                    <option value="2">Funder</option>
                                </select>
                                @if ($errors->has('user_role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password *</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox{{ $errors->has('agreement') ? ' has-error' : '' }}" name="agreement" required> I agree to the <a href="{{ route('publicPages', ['slug' => 'terms-and-conditions']) }}">Terms and Conditions</a> of the website
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                {{csrf_field()}}
                                <a href="login" class="btn btn-default all_r_login">Already Account / Login</a>
                                <button type="submit">Submit</button> 
=======
                                {{ csrf_field() }}
                                <a href="login" class="btn btn-default all_r_login">Already Account / Login</a>
                                <button type="sbumit" class="btn login_now">Submit</button>
>>>>>>> 8b93b005166ddffa1e9977121735b25e145ee1f3
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection