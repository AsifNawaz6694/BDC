@extends('layouts.index')
@section('content')
		<div class="page-content">			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="">Listing</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Funder Request</a>						
					</li>				
				</ul>				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable-line boxless tabbable-reversed">
						<ul class="nav nav-tabs">							
							<li class="active">
								<a href="#tab_3" class="active" selected data-toggle="tab">
								 Detailed View</a>
							</li>
						</ul>
						<div class="tab-content">							
							<div class="active" id="tab_3">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-user"></i>About Funder
										</div>										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form class="form-horizontal" role="form">
											<div class="form-body">
												<div class="col-md-12">
													<div class="col-md-6">
														<h2 class="margin-bottom-20"> Funder Name - {{$value->user->name}} </h2>
													</div>
													<div class="col-md-6">
														<img src="{{ URL::asset('/storage/' . $value->user->profile->image ) }}" class="img-responsive img-thumbnail userPic">
													</div>
												</div>
												<h3 class="form-section">Funder Info</h3>
												<!--/row-->
												<div class="row">
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->user->email}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Phone:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->user->profile->phone}}
																</p>
															</div>
														</div>
													</div>													
												</div>
												<!--/row-->
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gender:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->user->profile->gender}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date of Birth:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->user->profile->birth_date}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>												
												<h3 class="form-section">Listing Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Title:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->requests->title}}
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Category:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->requests->category->name}}
																</p>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->requests->service->service}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Funding:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	  {{$value->requests->funding}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Listing Status:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 @if($value->requests->status == 1)
																	 Approved
																	 @else
																	 DisApproved
																	 @endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Listing Featured:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	@if($value->requests->featured == 1)
																	 Approved
																	 @else
																	 DisApproved
																	 @endif
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->requests->description}}
																</p>
															</div>
														</div>
													</div>													
												</div>
												<h3 class="form-section">Request Listing Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Subject:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->subject}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Request Status:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 @if($value->request_status == 1)
																	 Approved
																	 @else
																	 DisApproved
																	 @endif
																</p>
															</div>
														</div>
													</div>												
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Created At:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	{{$value->created_at}}
																</p>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Message:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	{{$value->message}}
																</p>
															</div>
														</div>
													</div>											
												</div>
											</div>											
										</form>
										<!-- END FORM-->
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>	
@endsection()