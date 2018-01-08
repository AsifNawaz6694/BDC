@extends('layouts.panal_layout')
@section('content')

<<<<<<< HEAD
<div class="wrapper">
    <div class="heading_one">
        <h1>listing</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default">
                <!-- Default panel contents -->
            @include('layouts.application_panel_partials.listingpage_box_panel')                    
            </div>
        </div>
    </div><!--./End My Listing Here -->
</div>
=======
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
                            @each('layouts.application_panel_partials.listingviewBox_panel', $listings, 'listings', 'layouts.application_panel_partials.no_listingviewBox_panel')
                            {{--@include('layouts.application_panel_partials.listingviewBox_panel')--}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End My Listing Here -->
    </div>
>>>>>>> b2d6698b0b67dba81b129942f31611adf9d08f84

@endsection