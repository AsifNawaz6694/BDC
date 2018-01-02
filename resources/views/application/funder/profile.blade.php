@extends('layouts.panal_layout')
@section('content')

<div class="wrapper">
    <div class="heading_one">
        <h1>My Profile</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('layouts.application_panel_partials.myprofile_panel')    
    </div>
</div>

@endsection