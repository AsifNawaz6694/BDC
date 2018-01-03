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
								<i class="fa fa-user"></i>Categories
							</div>	
							<div class="actions">
								<a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-primary" >New</a>
							</div>					
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="all_users">
							<thead>
							<tr>								
								<th>
									Name
								</th>
								<th>
									Description
								</th>
								<th>
									 Symbol
								</th>		
								<th>
									 Color Code
								</th>
								<th>
									 Action
								</th>								
							</tr>
							</thead>
							<tbody>
							@foreach( $category as $key => $value)
								<tr>
									<td>
										 {{$value->name }}
									</td>
									<td>
										{{$value->description}}
									</td>
									<td>
										 {{$value->symbol}}
									</td>	
									<td>
										 {{$value->color_code}}
									</td>	
									<td>
										<a href="{{ route('category.edit',[ 'category' => $value->id ]) }} " class="btn btn-sm btn-primary" >Edit</a>										
										<form action="{{ route('category.destroy', ['category' => $value->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
											<button type="submit" class="btn btn-sm btn-danger">Delte</button>
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