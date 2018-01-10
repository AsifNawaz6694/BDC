@extends('layouts.panal_layout')
@section('content')

    <div class="wrapper">
        <div class="heading_one">
            <h1>Dashboard</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            @include('layouts.application_panel_partials.aboutme_panel')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="dashboard_box">
                <div class="panel panel-default panel-min">
                    <!-- Default panel contents -->
                    <div class="panel-body">
                        <h4 class="float-left text-left">Recent Notifications</h4>
                        <h4 class="float-right text-right"><a href="{{ route('innovator_notifications_index') }}">View All</a></h4>
                    </div>
                    <!-- List group -->
                    <ul class="list-group">
                        <?php for ($a = 1; $a <= 3; $a++) { ?>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">Neque porro quisquam est qui dolorem ipsum...</a>
                                    </h4>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus...
                                    </p>
                                </div>
                                <div class="media-right media-middle">
                                                <span class="media-object">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> 3 min ago</span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div><!--end notification-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body ">
                        <h4 class="float-left text-left">my Listing</h4>
                        <h4 class="float-right text-right"><a href="{{ route('innovator_listings') }}">View All</a></h4>
                        <div class="list_border clearfix"></div>
                        <div class="row">


                            @each('layouts.application_panel_partials.listingviewBox_panel', $listings, 'listing', 'layouts.application_panel_partials.no_listingviewBox_panel')

                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End My Listing Here -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="dashboard_box">
                <div class="panel panel-default panel-min">
                    <!-- Default panel contents -->
                    <div class="panel-body">
                        <h4 class="float-left text-left">Transaction details</h4>
                        <h4 class="float-right text-right"><a href="{{ route('transaction_page') }}">View All</a></h4>
                    </div>
                    <!-- List group -->
                    <ul class="list-group">
                        @foreach ($transactions as $tr)
                            <?php $description = json_decode($tr->description); ?>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="#">{{ $tr->service->description }} - ${{ $tr->service->cost }}</a>
                                    </h4>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!---./End Transaction--->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                <div class="dashboard_box">
                    <div class="panel panel-default panel-min">
                        <!-- Default panel contents -->
                        <div class="panel-body">
                            <h4 class="float-left text-left">Request Services</h4>
                            <h4 class="float-right text-right"><a href="{{ route('request_services_page') }}">View All</a></h4>
                        </div>
                        <!-- List group -->
                        <ul class="list-group">
                            @foreach ($services as $service)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                You have asked for service "{{ $service->service->description }}" on {{ date("j-n-Y", strtotime($service->created_at)) }}, Payment Status {{{ $service->status == 1 ? 'Complete' : 'Pending' }}}
                                            </h4>
                                        </div>
                                        <div class="media-right media-middle">
                                                <span class="media-object">
                                                    Amount {{ $service->service->cost }}
                                                </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection