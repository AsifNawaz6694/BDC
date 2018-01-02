<!-- Funder/Invester LEFT SIDEPANELW NAV Generic Layout -->

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 r-m-p left_dash">
    <div class="dashboard_left_side clearfix">
        <a href="index.php" class="navbar-brand">
            <img src="{{ asset('panel_assets/images/logo.png') }}" class="img-responsive center-block"/>
        </a>
        <div class="user_deatils">
            <a href="#">
                <div class="avatar_box">
                    <img src="{{ asset('panel_assets/images/funder_user_img.png') }}" class="img-responsive center-block img-circle"/>
                    <span class="camera_image">
                    <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                        <input type="file" id="image_upload" value="" style="display: none"/>
                </span>
                </div>
            </a>
            
              @if(Auth::check())
                <h3><a href="#">{{Auth::user()->name}}</a></h3>
              @endif
          
              @if(Auth::user()->roles == 2)
                <!-- Funder -->
                <p>Funder</p>                              
              @elseif(Auth::user()->roles == 3)
                <!-- Innovator -->
                <p>Innovator</p>
              @endif

        </div><!--./End user details-->
        <div class="dashboard_navigation">
            
              @if(Auth::user()->roles == 2)
                <!-- Funder -->
                    <ul class="nav">
                        <li><a href="{{route('funder_home')}}" class="actives" #"><i class="fa fa-tachometer"
                                                                      aria-hidden="true"></i>Dashboard</a></li>
                        <li><a href="{{route('funder_profile')}}"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                        <li><a href="{{route('funder_notifications_index')}}"><i class="fa fa-bell-o" aria-hidden="true"></i>Notifications</a></li>
                        <li><a href="{{route('funder_view_listings')}}"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Viewed Listings</a></li>
                        <li><a href="{{route('funder_request_listing')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>Request Listing Review</a>
                        </li>
                        <li><a href="{{route('funder_fund_details')}}"><i class="fa fa-credit-card" aria-hidden="true"></i>Funded Details</a>
                        </li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
                    </ul>

              @elseif(Auth::user()->roles == 3)
                <!-- Innovator -->
                    <ul class="nav">
                        <li><a href="{{route('innovator_home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                        <li><a href="{{route('innovator_profile')}}"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a></li>
                        <li><a href="{{route('innovator_notifications_index')}}"><i class="fa fa-bell-o" aria-hidden="true"></i>Notifications</a></li>
                        <li><a href="{{route('innovator_listings')}}"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Listing</a></li>
                        <li><a href="{{route('submit_listing_page')}}"><i class="fa fa-check" aria-hidden="true"></i>Submit listing</a></li>
                        <li><a href="{{route('contact_admin_page')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>Contact Admin</a></li>
                        <li><a href="{{route('request_services_page')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>Request Services</a></li>
                        <li><a href="{{route('transaction_page')}}"><i class="fa fa-credit-card" aria-hidden="true"></i>Transaction</a></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
                    </ul>
              @endif


        </div>
    </div>
</div><!---./End Left Side--->
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 r-m-p right_dash">