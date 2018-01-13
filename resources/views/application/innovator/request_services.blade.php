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
                                    <a href="#" data-toggle="modal" data-target="#my_listings" data-service="2">
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
                                    <a href="#" data-toggle="modal" data-target="#my_listings"  data-service="3">
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
                                    <a href="#" data-toggle="modal" data-target="#my_listings" data-service="4">
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
                                    <a href="#" data-toggle="modal" data-target="#my_listings" data-service="5">
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
                                    <a href="#" data-toggle="modal" data-target="#my_listings" data-service="6">
                                        <img src="{{ asset('panel_assets/images/paypal_btn.png') }}"
                                             class="img-responsive center-block"/>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td><span class="heading_bold">COMBO</span></td>
                                <td><span class="text_time">30 minutes</span></td>
                                <td><span class="price_dolar">$49</span></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#my_listings" data-service="7">
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
                                                    You have asked for service "{{ $service->service->description }}" on "{{ $service->listing->title }}", date {{ date("j-n-Y", strtotime($service->created_at)) }}, Payment Status
                                                    @if($service->status == 1)
                                                        <a href="{{ route('transaction_page') }}">complete</a>
                                                    @else
                                                        <a href="{{ route('pending_payment', ['id' => $service->id]) }}">Pending</a>
                                                    @endif
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



    {{--popup modal for service listings--}}
    <div id="my_listings" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">My Listings</h4>
                </div>
                <form action="{{ route('request_services_post') }}" method="post">
                    <div class="modal-body">
                        <p>Please Select a listing from dropdown</p>
                        <select name="my_listings" id=""  class="form-control">
                            @foreach(Auth::user()->listings as $listing)
                            <option value="{{ $listing->id }}">{{ $listing->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        {{ csrf_field() }}
                        <input type="hidden" value="" name="service_id" id="service_id">
                        <button type="submit" class="btn btn-default">Continue</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection