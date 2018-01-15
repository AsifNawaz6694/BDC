        <div class="heading_one">
            <h1>notification</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default panel-min">
                    <!-- Default panel contents -->
                      @foreach(auth()->user()->notifications as $notificaiton)
                        <ul class="list-group">
                            <li class="list-group-item notification_list">
                                <div class="media">
                                    <div class="media-body">                                       
                                            <h4 class="media-heading">

                                                   @if($notificaiton->type == 'App\Notifications\ListingApproved' && $notificaiton->data['listing']['status'] == 1)
                                                      <a href="#">{{ $notificaiton->data['user']['name'] }} has Approved your listing {{ $notificaiton->data['listing']['title'] }} </a>
                                                    @endif
                                                    @if($notificaiton->type == 'App\Notifications\ListingDisApproved' && $notificaiton->data['listing']['status'] != 1)
                                                      <a href="#">{{ $notificaiton->data['user']['name'] }} has Declined your listing {{ $notificaiton->data['listing']['title'] }} </a>
                                                    @endif
                                                    @if($notificaiton->type == 'App\Notifications\FeaturedApproved' && $notificaiton->data['listing']['featured'] == 1)
                                                      <a href="#">{{ $notificaiton->data['user']['name'] }} has featured your listing {{ $notificaiton->data['listing']['title'] }} </a>
                                                    @endif
                                                    @if($notificaiton->type == 'App\Notifications\FeaturedDisApproved' && $notificaiton->data['listing']['featured'] != 1)
                                                      <a href="#">{{ $notificaiton->data['user']['name'] }} has unfeatured your listing {{ $notificaiton->data['listing']['title'] }} </a>
                                                   @endif
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
                    </ul>
                     @endforeach
                </div>
            </div>
        </div>