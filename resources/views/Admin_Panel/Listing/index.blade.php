@extends('layouts.index')
@section('content')
	<!-- BEGIN CONTENT -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->			
			<div class="row">				
				<div class="col-md-12">
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Users
							</div>	
							<div class="actions">
								<a href="{{ url('admin/users/create') }}" class="btn btn-sm btn-primary" >New</a>
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
									Email
								</th>
								<th>
									 Role
								</th>		
								<th>
									 Action
								</th>								
							</tr>
							</thead>
							<tbody>
							@foreach( $users as $key => $value)
								<tr>
									<td>
										 {{$value->name }}
									</td>
									<td>
										{{$value->email}}
									</td>
									<td>
										 {{$value->role_name}}
									</td>	
									<td>
										<a href="{{ route('users.edit',[ 'user' => $value->id ]) }}" class="btn btn-sm btn-primary" >Edit</a>
										<form action="{{ route('users.destroy', ['user' => $value->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
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