<!DOCTYPE html>
<html lang="{{ app() ->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ env('app.name', 'BDC') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="{{ asset('app/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('app/css/animate.css') }}" rel="stylesheet">
    <!-- Owl Slider -->
    <link href="{{ asset('app/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- Owl Slider Theme -->
    <link href="{{ asset('app/css/owl.theme.css') }}" rel="stylesheet">
    <!--Jquery Validation -->
    <link href="{{ asset('app/css/validationEngine.jquery.css') }}" rel="stylesheet">
    <!-- Fareha Css Linkhs -->
    <link href="{{ asset('app/css/custom.css') }}" rel="stylesheet">
    <!--./End  Fareha Css Linkhs -->
    <!-- StyleSheet -->
    <link href="{{ asset('app/css/style.css') }}" rel="stylesheet">
    <!-- Responsive -->
    <link href="{{ asset('app/css/responsive.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Public Frontend Generic Layout -->

<nav class="navbar  navbar-fixed-top bdc_navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="{{ asset('app/images/bdc_logo.png') }}" class="img-responsive center-block"/>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right bdc_nav">
                <li><a href="{{ route('publicPages', ['slug' => 'home']) }}">Home</a></li>
                <li><a href="{{ route('publicPages', ['slug' => 'about']) }}">About Us</a></li>
                <li><a href="{{ route('publicPages', ['slug' => 'how-it-works']) }}">How It Works</a></li>
                <li><a href="{{ route('publicPages', ['slug' => 'get-ready']) }}">Get Ready</a></li>
                <li><a href="{{ route('publicPages', ['slug' => 'contact']) }}">Contact</a></li>

                @if(Auth::check())

                    @if(Auth::user()->roles==1)
                        <!-- Admin -->
                        <li><a href="{{ route('adminBackend') }}">{{Auth::user()->name}}</a></li>
                    @elseif(Auth::user()->roles==2)
                        <!-- Funder -->
                        <li><a href="{{ route('funder_home') }}">{{Auth::user()->name}}</a></li>                    
                    @elseif(Auth::user()->roles==3)
                        <!-- Innovator -->
                        <li><a href="{{ route('innovator_home') }}">{{Auth::user()->name}}</a></li>
                    @endif
                @else
                    <li><a href="{{ route('register') }}">signup</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


@yield('content')


{{--footer--}}
<footer id="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-12 col-xs-12 col-xs-12">
                <div class="footer_logo">
                    <a href="{{ route('publicPages', ['slug' => 'home']) }}">
                        <img src="{{ asset('app/images/footer_logo.png') }}" class="img-responsive center-block"/>
                    </a>
                </div>
                <div class="footer_navigation clearfix">
                    <ul class="clearfix">
                        <li>
                            <a href="{{ route('publicPages', ['slug' => 'home']) }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publicPages', ['slug' => 'about']) }}">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publicPages', ['slug' => 'how-it-works']) }}">
                                How It Works
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publicPages', ['slug' => 'get-ready']) }}">
                                Get Ready
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publicPages', ['slug' => 'contact']) }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid" id="copyright_area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="main_box_copy clearfix">
                    <div class="copyright_left_side float-left">
                        <h4>All rights Reserved © 2017 </h4>
                        <ul class="footer-links">
                            <li class="footer-condition"><a href="{{ route('publicPages', ['slug' => 'terms-and-conditions']) }}">Terms & Conditions</a></li>
                            <li class="footer-policy"><a href="{{ route('publicPages', ['slug' => 'privacy-policy']) }}">Privacy & Policy</a></li>
                        </ul>

                    </div>
                    <div class="copyright_left_side float-right">
                        <h4><a href="#">Design & Developed By Startupbug.net</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- This is login popup -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
            <div class="image-footer"><img src="{{ asset('app/images/footer_logo.png') }}" class="img-responsive"></div>
            <hr>

            <div class="signup_form_box1">
                <form id="Sign_up_form" action="{{ route('login') }}" method="POST">

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control validate[required]"
                               data-errormessage-value-missing="Email of entity is required!">
                    </div>


                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control">
                        <div class="pass">
                            <a href="{{ route('password.request') }}">Forgot your password ?</a>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="button-popup"><a href="#" class="btn btn-default all_r_login">NO ACCOUNT SIGN UP
                                    NOW</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="button-popup-last">
                                {{ csrf_field() }}
                                <button type="submit" class="btn login_now">LOGIN NOW</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('app/js/jquery-3.1.1.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
<!-- Validation -->
<script src="{{ asset('app/js/jquery.validationEngine.js') }}"></script>
<!-- Validation-en -->
<script src="{{ asset('app/js/jquery.validationEngine-en.js') }}"></script>
<!-- Carousel-min -->
<script src="{{ asset('app/js/owl.carousel.min.js') }}"></script>
<!-- Wow-min-js -->
<script src="{{ asset('app/js/wow.min.js') }}"></script>
<!-- Custom-js -->

<script src="{{ asset('js/custom1.js') }}"></script>

<script src="{{ asset('app/js/custom.js') }}"></script>

</body>
</html>