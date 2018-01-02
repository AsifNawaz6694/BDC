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
                        <form id="Sign_up_form" method="post" action="  ">
                            <div class="form-group">
                                <label>Full Name *</label>
                                <input type="text" class="form-control validate[required]"
                                       data-errormessage-value-missing="Name of entity is required!" id="">
                            </div>
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" class="form-control validate[required]"
                                       data-errormessage-value-missing="Email of entity is required!">
                            </div>
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="text" class="form-control validate[required]"
                                       data-errormessage-value-missing="Phone of entity is required!">
                            </div>
                            <div class="form-group">
                                <label>DOB *</label>
                                <input type="date" class="form-control validate[required]"
                                       data-errormessage-value-missing="Date Of Birth of entity is required!">
                            </div>
                            <div class="form-group">
                                <label>I am a *</label>
                                <select class="form-control validate[required]"
                                        data-errormessage-value-missing="I am a of entity is required!">
                                    <option>Select</option>
                                    <option>Innovator</option>
                                    <option>Funder</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="{{ route('publicPages', ['slug' => 'terms-and-conditions']) }}">Terms and Conditions</a> of the website
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{csrf_field()}}
                                <a href="login" class="btn btn-default all_r_login">Already Account / Login</a>
                                <button type="submit">Submit</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection