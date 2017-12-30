@extends('layouts.app')

@section('content')
    @include('partials/slider')


    <div class="container-fluid listing_search">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-mg-10 col-lg-10 clearfix col-center">
                    <div class="listing_search_box">
                        <form>
                            <p>perspiciatis undeelit omnis exercitationem ullam perspiciatis unde omnis</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="">
                                <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">SEARCH</button>
                            </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid poular_main_area">
        <div class="container">
            <div class="row">
                <?php
                $color = array('green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box', 'green_box', 'red_box', 'blue_box', 'orange_box');
                ?>
                @for ($a = 0; $a <= 11; $a++)
                    @include('partials/idea-box')
                @endfor
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="bread_number">
                        <ul class="">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#"><img src="{{ asset('app/images/left_btn.png') }}"
                                                 class="img-responsive"/></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><img src="{{ asset('app/images/right_btn.png') }}" class="img-responsive"/></a>
                            </li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection