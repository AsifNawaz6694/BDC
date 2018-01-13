@extends('layouts.index')
@section('content')
	<!-- BEGIN CONTENT -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->			
			<div class="row">				
				<div class="col-md-12">
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
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Funder Request Listings
							</div>										
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="all_users">
							<thead>
							<tr>						
								<th>Subject</th>
								<th>Funder</th>
								<th>Listing Title</th>								
								<th>Status</th>		
								<th>View Details</th>
															
							</tr>
							</thead>
							<tbody>
							@foreach( $request_listing as $key => $value)
								<tr>
									<td>
										 {{$value->subject }}
									</td>
									</td>									
									<td>
										{{$value->user->name}}
									</td>
									<td>
										{{$value->requests->title}}
									</td>									
									<td>
										@if($value->request_status == '1')
										<a href="{{route('funder-disapprove-status',['id'=>$value->id])}}" title="Click To DisApprove" class="btn btn-sm btn-primary" >Approve</a>
										@else
										<a href="{{route('funder-approve-status',['id'=>$value->id])}}" title="Click To Approve" class="btn btn-sm btn-danger" >DisApprove</a>
										@endif
									</td>
									<td>
										<a href="{{route('request-detail-view',['id'=>$value->id])}}" title="Click To View Details" class="btn btn-sm btn-primary" >View</a>
									</td>										
																	
								</tr>
							@endforeach						
							</tbody>
							</table>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>	
	<!-- END CONTENT -->
@endsection()