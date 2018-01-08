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
								<i class="fa fa-user"></i>Listings
							</div>	
										
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="all_users">
							<thead>
							<tr>						
								<th>Title</th>
								<th>Category</th>
								<th>Service</th>
								<th>Funding</th>
								<th>Status</th>		
								<th>Featured</th>								
								<th>Action</th>								
							</tr>
							</thead>
							<tbody>
							@foreach( $listing as $key => $value)
								<tr>
									<td>
										 {{$value->title }}
									</td>
									<td>
										{{$value->category->name}}
									</td>
									<td>
										{{$value->service->service}}
									</td>
									<td>
										{{$value->funding}}
									</td>
									<td>
										@if($value->status == '1')
										<a href="{{route('disapprove-status',['id'=>$value->id])}}" class="btn btn-sm btn-primary" >Approve</a>
										@else
										<a href="{{route('approve-status',['id'=>$value->id])}}" class="btn btn-sm btn-danger" >DisApprove</a>
										@endif
									</td>	
									<td>
										@if($value->featured == '1')
										<a href="{{route('disapprove-featured',['id'=>$value->id])}}" class="btn btn-sm btn-primary" >Featured</a>
										@else
										<a href="{{route('approve-featured',['id'=>$value->id])}}" class="btn btn-sm btn-danger" >Not Featured</a>
										@endif
									</td>	
									<td>
										<a href="{{ route('listing.edit',[ 'listing' => $value->id ]) }}" class="btn btn-sm btn-primary" >Edit</a>
										<form action="{{ route('listing.destroy', ['listing' => $value->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" class="btn btn-sm btn-danger">Delete</button>
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