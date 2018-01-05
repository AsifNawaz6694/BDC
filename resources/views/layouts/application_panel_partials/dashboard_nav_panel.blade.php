<!-- Funder/Invester DASHBOARD NAV Generic Layout -->

<div class="dashboard_header">
    <div class="wrapper">
        <nav class="navbar">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse in" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav left_mobi_nav">
                    <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> /
                            Dashboard
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right icons right_mobi_nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                            <span class="badge">5</span>
                        </a>
                        <ul class="dropdown-menu media-list animated fadeInDown dash_nav clearfix">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="#">
                                    <div class="media-left">
                                        <i class="fa fa-times media-object bg-red" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <div class="media-left">
                                        <img src="{{ asset('panel_assets/images/user-1.jpg') }}" class="media-object" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <div class="media-left">
                                        <i class="fa fa-plus media-object bg-blue" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <div class="media-left">
                                        <i class="fa fa-envelope-o media-object bg-blue"
                                           aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a> -->
                        <form action="{{route('logout')}}" method="post">
                        <!--<li><a href="{{ route('register') }}">Logout</a></li> -->
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <!-- <input type="submit" name="logout" value="Logout"> -->
                            <button class="btn btn-default" type="submit" name="logout">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                        </form>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                         <button class="btn btn-default" type="button">
                                             <i class="fa fa-search" aria-hidden="true"></i>
                                         </button>
                                    </span>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<div class="dashboard_main_content_area">