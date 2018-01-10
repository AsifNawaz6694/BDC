@extends('layouts.panal_layout')
@section('content')


    <div class="wrapper">
        <div class="heading_one">
            <h1>listing</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body ">
                        <h4 class="float-left text-left">my Listing</h4>
                        {{--<h4 class="float-right text-right"><a href="#">View All</a></h4>--}}
                        <div class="list_border clearfix"></div>
                        <div class="row masonry_listing">
                            @each('layouts.application_panel_partials.listingviewBox_panel', $listings, 'listing', 'layouts.application_panel_partials.no_listingviewBox_panel')
                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End My Listing Here -->
    </div>
@endsection