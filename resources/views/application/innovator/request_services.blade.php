@extends('layouts.panal_layout')
@section('content')

    <div class="wrapper">
        <div class="heading_one">
            <h1>our services</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default clearfix">
                    <!-- Default panel contents -->
                    <div class="panel-body border_line_bottom">
                        <h4 class="float-left text-left">Get ready</h4>
                    </div>
                    <!-- Get Ready Table-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-responsive" id="get_ready_table">

                            <tr>
                                <td>
                                    <span class="heading_bold">Refine Innovation Strategy Session and Build</span>
                                </td>
                                <td>
                                    <span class="text_time">20 minutes </span>
                                </td>
                                <td>
                                    <span class="price_dolar">$29</span>
                                </td>
                                <td>
                                    <a href="{{ route('checkout', ['id' => 2]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="heading_bold">ENHANCE PROFILE STRATEGY SESSION AND BUILD</span></td>
                                <td>
                                    <span class="text_time">20 minutes</span>
                                </td>
                                <td>
                                    <span class="price_dolar">$29</span></td>
                                <td>
                                    <a href="{{ route('checkout', ['id' => 3]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>

                            </tr>


                            <tr>
                                <td><span class="heading_bold">ASSESS MARKET STRATEGY SESSION AND BUILD</span></td>
                                <td><span class="text_time">20 minutes</span></td>
                                <td><span class="price_dolar">$29</span></td>

                                <td>
                                    <a href="{{ route('checkout', ['id' => 4]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>
                            </tr>


                            <tr>
                                <td><span class="heading_bold">DEFINE GOALS STRATEGY SESSION AND BUILD</span></td>
                                <td><span class="text_time">30 minutes</span></td>
                                <td><span class="price_dolar">$29</span></td>
                                <td>
                                    <a href="{{ route('checkout', ['id' => 5]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td><span class="heading_bold">MISCELLANEOUS STRATEGY SESSION</span></td>
                                <td><span class="text_time">15 minutes</span></td>
                                <td><span class="price_dolar">$29</span></td>
                                <td>
                                    <a href="{{ route('checkout', ['id' => 6]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td><span class="heading_bold">MISCELLANEOUS STRATEGY SESSION</span></td>
                                <td><span class="text_time">30 minutes</span></td>
                                <td><span class="price_dolar">$49</span></td>
                                <td>
                                    <a href="{{ route('checkout', ['id' => 7]) }}">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>

                            </tr>


                        </table>
                    </div><!--./End Get Ready Table-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                        <div class="dashboard_box service_you_ask">
                            <div class="panel panel-default panel-min">
                                <!-- Default panel contents -->
                                <div class="panel-body">
                                    <h4 class="float-left text-left">Services you asked</h4>
                                </div>
                                <!-- List group -->
                                <ul class="list-group">
                                    @foreach ($services as $service)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    You have asked for service "{{ $service->service->description }}" on {{ date("j-n-Y", strtotime($service->created_at)) }}, Payment Status {{ $service->status == 1 ? 'Complete' : 'Pending' }}
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
        </div>
    </div>

@endsection