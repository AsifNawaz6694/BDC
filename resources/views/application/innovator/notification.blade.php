@extends('layouts.panal_layout')
@section('content')
    <div class="wrapper">
        <div class="heading_one">
            <h1>notification</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default panel-min">
                    <!-- Default panel contents -->
                    <ul class="list-group">
                        @foreach(auth()->user()->notifications as $notificaiton)
                            <li class="list-group-item notification_list">
                                <div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            @include('application.notifications.'.snake_case(class_basename($notificaiton->type)) )
                                            {{--{{ snake_case(class_basename($notificaiton->type)) }}--}}

                                        </h4>
                                    </div>
                                    <div class="media-right media-middle">
                                        <span class="media-object">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $notificaiton->created_at }}

                                            <form action="{{route('markAsSingleRead')}}" method="post">
                                                <input type="hidden" name="id" value="{{$notificaiton->id}}">
                                                {{ csrf_field() }}
                                                @if(!empty($notificaiton->read_at))
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-square-o singleRead"  aria-hidden="true"></i>
                                                @endif
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                    {{--@include('layouts.application_panel_partials.notificationpage_box_panel')--}}
                </div>
            </div>
        </div>
    </div>
@endsection