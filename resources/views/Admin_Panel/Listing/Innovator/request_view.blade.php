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
						<a href="#">Innovator Request</a>						
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
											<i class="fa fa-user"></i>About Innovator
										</div>										
									</div>									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form class="form-horizontal" role="form">
											<div class="form-body">
												<div class="col-md-12">
													<div class="col-md-6">
														<h2 class="margin-bottom-20"> Innovator Name - {{$value->user->name}} </h2>
													</div>
													<div class="col-md-6">
														<img src="{{ URL::asset('/storage/' . $value->user->profile->image ) }}" class="img-responsive img-thumbnail userPic">
													</div>
												</div>
												<h3 class="form-section">Innovator Info</h3>
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
												<h3 class="form-section">Service Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$value->service->service}}
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cost:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	  {{$value->service->cost}}
																</p>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	   {{$value->service->description}}
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<!--/row-->											
												
												<h3 class="form-section">Request Service Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Transaction:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	{{$value->transaction->type}}
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
																@if($value->status == '1')
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
												<h3 class="form-section">Transactions Details</h3>
												<?php $string = json_decode($value->transaction->description) ?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">ID:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	{{ $string->id }}
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Status:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{ $string->state }}
																</p>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Total Amount</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	{{ $string->transactions[0]->amount->total}}
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Currency:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{ $string->transactions[0]->amount->currency}}
																</p>
															</div>
														</div>
													</div>
												</div>
												<h4 class="form-section">Payer's Info</h4>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$string->payer->payer_info->email}}
																</p>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Full Name:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 {{$string->payer->payer_info->first_name}} {{$string->payer->payer_info->last_name}}
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