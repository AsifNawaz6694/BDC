@extends('layouts.app')

@section('content')

    @include('partials/slider')

    <div class="container-fluid featured_slider_main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="featured_heading">
                        <h1>Featured Listings</h1>
                    </div>
                    <div class="customNavigation Featured_slider_btn">
                        <a class="btn prev"><img src="{{ asset('app/images/left_btn.png') }}"
                                                 class="img-responsive"/></a>
                        <a class="btn next"><img src="{{ asset('app/images/right_btn.png') }}" class="img-responsive"/></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    @for ($a = 1; $a <= 6; $a++)
                        <div class="item">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="Funding_box {{{ $a == 1 ? 'red_box' : 'green_box' }}}">
                                    <h5><a href="#">perspiciatis unde omnis</a></h5>
                                    <h6>exercitationem ullam</h6>
                                    <div class="button_groups">
                                        <a class="btn btn-default Badge_tag">p</a>
                                        <a class="btn btn-default fund_Price">Funding needs: $21,000</a>
                                    </div>
                                    <div class="funding_description">
                                        <h2>Problem it solves:</h2>
                                        <p>
                                            Dignissimos ducimus qui blandit pruiis praesentium voluptatum deleniti atque
                                            corrupti
                                            quos
                                            dolores et quastert
                                        </p>
                                    </div>
                                    <div class="Funding_box_footer clearfix">
                                        <span class="ready_img">
                                            <img src="{{ asset('app/images/ready_img.png') }}" class="img-responsive"/>
                                        </span>
                                        <span class="Fund_contact">
                                            <a href="#" class="btn btn-default">Contact</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!--./End Item Box-->
                    @endfor
                </div><!--./End main Owl Slider Box-->
            </div>
        </div>
    </div><!--./End Featured Main Area -->
    <div class="container-fluid poular_main_area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="heading_one">
                        <h1>Popular Listings</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $color = array('green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box');
                ?>
                @for ($a = 0; $a <= 11; $a++)
                    @include('partials/idea-box')
                @endfor
            </div>
        </div>
    </div>

@endsection
