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
								<i class="fa fa-user"></i>Innovator Request Listings
							</div>										
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="all_users">
							<thead>
							<tr>						
								
								<th>Innovator</th>
								<th>Service</th>								
								<th>Status</th>		
								<th>View Details</th>
								<th>Delete</th>								
							</tr>
							</thead>
							<tbody>
							@foreach($request_services as $key => $value)
								<tr>
									<td>
										{{$value->user->name}}
									</td>
									<td>
										 {{$value->service->service}}
									</td>																		
									<td>
										@if($value->status == '1')
										<a href="{{route('innovator-disapprove-status',['id'=>$value->id])}}" title="Click To DisApprove" class="btn btn-sm btn-primary" >Approve</a>
										@else
										<a href="{{route('innovator-approve-status',['id'=>$value->id])}}" title="Click To Approve" class="btn btn-sm btn-danger" >DisApprove</a>
										@endif
									</td>
									<td>
										<a href="{{route('innovator-request-detail-view',['id'=>$value->id])}}" title="Click To View Details" class="btn btn-sm btn-primary" >View</a>
									</td>										
									<td>
										<form action="{{ route('delete-innovator-request', ['id' => $value->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" title="Click To Delete" class="btn btn-sm btn-danger">Delete</button>
										</form>										
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