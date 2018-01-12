@extends('layouts.panal_layout')
@section('content')

<div class="wrapper">
    <div class="heading_one">
        <h1>Viewed Listings</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                @foreach($listings as $listing)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 listing_item">
                    <div class="Funding_box Funding_box_small {{ $listing->color_code }}_box">
                        <h5>

                            <a href="#">{{ $listing->title }}</a> 
                        </h5>
                        <div class="button_groups">
                            <a class="btn btn-default Badge_tag">{{ $listing->symbol }}</a>
                            <a class="btn btn-default fund_Price">Funding needs: ${{ $listing->funding }}</a>
                        </div>
                        <div class="funding_description">
                            <h2>Problem it solves:</h2>
                            <p>
                                {{ $listing->descri }}
                            </p>
                        </div>
                        <div class="Funding_box_footer clearfix">
                            <span class="ready_img">
                                <img src="{{ asset('panel_assets/images/ready_img.png') }}" class="img-responsive"/>
                            </span>
                            <span class="Fund_contact">
                                <a href="#" class="btn btn-default">Contact</a>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><!--./End My Listing Here -->
</div>

@endsection