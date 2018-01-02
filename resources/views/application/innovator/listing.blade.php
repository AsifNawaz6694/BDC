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
            @include('layouts.application_panel_partials.listingpage_box_panel')                    
            </div>
        </div>
    </div><!--./End My Listing Here -->
</div>

@endsection