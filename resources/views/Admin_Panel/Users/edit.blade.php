@extends ('layouts.index')
@section('content')
<div class="page-container">	
	<div class="page-content-wrapper">
		<div class="page-content">		
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
					<div class="tabbable-line boxless tabbable-reversed">						
						<div class="tab-content">							
							<div class="tab-pane active" id="tab_2">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit User
										</div>									
									</div>
									<div class="portlet-body form">
					
					{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
											<div class="form-body">
												<h3 class="form-section">Person Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Name</label>
															<div class="col-md-9">
																{!! Form::text('name', $user->name, [ 'class' => 'form-control'] ) !!}

																<span class="help-block">
																	{{ $errors->first('name') }}
																 </span>
															</div>
														</div>
													</div>													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email</label>
															<div class="col-md-9">
																{!! Form::text('email', $user->email, [ 'class' => 'form-control'] ) !!}
																<span class="help-block">
																	{{ $errors->first('email') }}
																 </span>
															</div>
														</div>
													</div>													
												</div>												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Roles</label>
															<div class="col-md-9">
															{{ Form::select('roles', $roles, $user->roles, [ 'class' => 'form-control', ] )}}
																<span class="help-block">
																	{{ $errors->first('roles') }}
																 </span>
															</div>
														</div>
													</div>												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password</label>
															<div class="col-md-9">
																{!! Form::text('password', NULL, [ 'class' => 'form-control'] ) !!}
																<span class="help-block">
																	{{ $errors->first('password') }}
																 </span>
															</div>
														</div>
													</div>													
												</div>												
											</div>											
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Submit</button>
																<a href="{{url('admin/users')}}" type="button" class="btn default">Cancel</a>
															</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										{!! Form::close() !!}										
									</div>
								</div>							
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection