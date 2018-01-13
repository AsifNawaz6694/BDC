@extends('layouts.panal_layout')
@section('content')

<div class="wrapper">
    <div class="heading_one">
        <h1>Submit Listing</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">Please provide valid information</h4>
                </div>
                <!-- Form -->

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 r-m-p">
                    <div class="Form_main form_submit_listing">
                        <form method="post" action="{{ route('submit_listing_post') }}" id="ajaxFormListing">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="product" value="5"> <span class="badge blue_check">A</span>
                                </label>
                                <label>
                                    <input type="radio" name="product" value="1"> <span class="badge green_check">F</span>
                                </label>
                                <label>
                                    <input type="radio" name="product" value="4"> <span class="badge red_check">P</span>
                                </label>
                                <label>
                                    <input type="radio" name="product" value="2"> <span class="badge orange_check">S</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Product Service</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" disabled> <img src="{{ asset('panel_assets/images/r_img.png') }}"
                                                                 class="img-responsive sheld_img "/>
                                </label>
                                <label>
                                    <input type="checkbox" disabled> <img src="{{ asset('panel_assets/images/image-e.png') }}"
                                                                 class="img-responsive sheld_img "/>
                                </label>
                                <label>
                                    <input type="checkbox" disabled> <img src="{{ asset('panel_assets/images/image-a.png') }}"
                                                                 class="img-responsive sheld_img "/>
                                </label>
                                <label>
                                    <input type="checkbox" disabled> <img src="{{ asset('panel_assets/images/image-d.png') }}"
                                                                 class="img-responsive sheld_img "/>
                                </label>
                                <label>
                                    <input type="checkbox" disabled> <img src="{{ asset('panel_assets/images/image-y.png') }}"
                                                                 class="img-responsive sheld_img "/>
                                </label>
                                {{--<label class="form_error">--}}
                                    {{--<p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zero attempts to--}}
                                        {{--Strategies</p>--}}
                                {{--</label>--}}
                            </div>
                            <div class="form-group">
                                <label>Funding Needs</label>
                                <input type="text" class="form-control" name="funding">
                            </div>
                            <div class="form-group">
                                <label for="fileEdit" class="form-control file_input_bar">
                                    <i class="fa-2x fa fa-paperclip" aria-hidden="true"></i>
                                    <span class="file_text">
                                    choose File
                                    </span>
                                    <input id="fileEdit" class="hidden" type="file" name="file" />
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Description (Problem it solves)</label>
                                <textarea class="form-control" rows="10" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default" id="msg_btn">Submit
                                </button>
                            </div>
                        </form>
                        <div class="alert alert-danger" id="errors" style="display: none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection