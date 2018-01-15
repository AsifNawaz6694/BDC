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
                    @foreach ($featured_listings as $featured_listing)
                        <div class="item">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="Funding_box {{ $featured_listing->category->color_code }}_box">
                                    <h5><a href="#">{{$featured_listing->title}}</a></h5>
                                    <h6>exercitationem ullam</h6>
                                    <div class="button_groups">
                                        <a class="btn btn-default Badge_tag">{{ $featured_listing->category->symbol }}</a>
                                        <a class="btn btn-default fund_Price">Funding needs: {{$featured_listing->funding}}</a>
                                    </div>
                                    <div class="funding_description">
                                        <h2>Problem it solves:</h2>
                                        <p>
                                            {{ str_limit($featured_listing->description, $limit = 150, $end = '...') }}
                                        </p>
                                    </div>
                                    <div class="Funding_box_footer clearfix">
                                        <span class="ready_img">           

                                            <label>
                                                <img src="{{ asset('panel_assets/images/r_img.png') }}" class="img-responsive sheld_img2 {{{ $featured_listing->service_id > 1 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                             <label>
                                                <img src="{{ asset('panel_assets/images/image-e.png') }}" class="img-responsive sheld_img2 {{{ $featured_listing->service_id > 2 ? '' : 'grayscale' }}}"/>
                                            </label>
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-a.png') }}" class="img-responsive sheld_img2 {{{ $featured_listing->service_id > 3 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                           
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-d.png') }}" class="img-responsive sheld_img2 {{{ $featured_listing->service_id > 4 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-y.png') }}" class="img-responsive sheld_img2 {{{ $featured_listing->service_id > 5 ? '' : 'grayscale' }}}"/>
                                            </label>  

                                        </span>
                                        
                                        <span class="Fund_contact">
                                            <a href="{{ route('funder_request_listing') }}" class="btn btn-default">Contact</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!--./End Item Box-->
                    @endforeach
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
                @foreach ($listings as $listing)
                    @include('partials/idea-box')
                @endforeach
            </div>
        </div>
    </div>

@endsection
