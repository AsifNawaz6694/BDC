@extends('layouts.index')
@section('content')
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
											<i class="fa fa-gift"></i>Edit Listing
										</div>									
									</div>
									<div class="portlet-body form">					
					{!! Form::open(['route' => ['listing.update', $listing->id], 'method' => 'PUT']) !!}
											<div class="form-body">
												<h3 class="form-section">Listing Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Title</label>
															<div class="col-md-9">
																{!! Form::text('title', $listing->title, [ 'class' => 'form-control'] ) !!}
																<span class="help-block">
																	{{ $errors->first('title') }}
																 </span>
															</div>
														</div>
													</div>													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Category</label>
															<div class="col-md-9">
															{{ Form::select('category_id', $category, $listing->category_id, [ 'class' => 'form-control', ] )}}
																<span class="help-block">
																	{{ $errors->first('category_id') }}
																 </span>
															</div>
														</div>
													</div>													
												</div>												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service</label>
															<div class="col-md-9">
															{{ Form::select('service_id', $service, $listing->service_id, [ 'class' => 'form-control', ] )}}
																<span class="help-block">
																	{{ $errors->first('service_id') }}
																 </span>
															</div>
														</div>
													</div>												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Funding</label>
															<div class="col-md-9">
																{!! Form::text('funding', $listing->funding, [ 'class' => 'form-control'] ) !!}
																<span class="help-block">
																	{{ $errors->first('funding') }}
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
@endsection