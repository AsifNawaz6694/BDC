@extends('layouts.panal_layout')
@section('content')

<div class="wrapper">
    <div class="heading_one">
        <h1>Request Listing Review</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
                @if(Session::has('err_message'))
                    <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{ Session::get('err_message') }}
                    </div>
                    @endif 
                    @if(Session::has('success_msg'))
                    <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('success_msg') }}
                    </div>
                @endif 
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">Feel free to ask anything</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <div class="Form_main">
                        <form id="requestListingForm" method="post" action="{{ route('request_listing_submit') }}">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            <div class="form-group">
                                 <label>Listing Title</label>
                                <select name="title">
                                    @foreach($listings as $list)
                                    <option value="{{$list->id}}">{{$list->title}}</option>
                                    @endforeach                                    
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Your Message</label>
                                <textarea class="form-control" name="message" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                <button type="submit" class="btn btn-default" id="msg_btn">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection