@extends('layouts.index')
@section('content')	
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Admin Profile</a>
						<i class="fa fa-angle-right"></i>
					</li>					
				</ul>
				<div class="page-toolbar">					
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable-line tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Overview </a>
							</li>
							<li>
								<a href="#Account" data-toggle="tab">
								Account </a>
							</li>							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-unstyled profile-nav">
											<li>
												<img class="img-responsive" alt="" src="{{ URL::asset('storage/'.$admin_profile->image  ) }}"/>
											</li>											
										</ul>
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12 profile-info">
												<p>
													{{$admin_profile->user_name }}
												</p>
												<p>
													{{$admin_profile->user->email}}
												</p>
												<p>
													{{$admin_profile->gender}}
												</p>
												<p>
													{{$admin_profile->phone}}
												</p>
												<p>
													{{$admin_profile->birth_date}}
												</p>
												<p>
													<a href="javascript:;">
													www.bdc.com </a>
												</p>													
											</div>
											<!--end col-md-8-->											
										</div>
										<!--end row-->										
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="Account">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Personal info </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-picture-o"></i> Change Avatar </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Change Password </a>
											</li>											
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<form role="form" action="{{route('admin-update-info',['id'=>$admin_profile->id])}}">
													<div class="form-group">
														<label class="control-label">User Name</label>
														<input type="text" name="user_name" value="{{$admin_profile_edit->user_name}}" placeholder="John" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Email</label>
														<input type="text" name="email" value="{{$admin_profile_edit->user->email}}" placeholder="admin@bdc.com" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Phone Number</label>
														<input type="text" name="phone" value="{{$admin_profile_edit->phone}}" placeholder="+1 646 580 DEMO (6284)" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Gender</label>
														<input type="text" name="gender" value="{{$admin_profile_edit->gender}}" placeholder="Male" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Date Of Birth</label>
														<input type="date" name="birth_date" value="{{$admin_profile_edit->birth_date}}" placeholder="2018-01-01" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<button type="submit" class="btn green">
														Save Changes </button>
														<a href="" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">
												<form id="form1" method="post" action="{{route('admin-update-image',['id'=>$admin_profile->user->id])}}" enctype="multipart/form-data" >
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
														
															<div>			
																	<input type="hidden" name="_token" value="{{ csrf_token()}}"/>						
																	<label class="fileContainer" for="file">
																	<input name="image" id="file1" type="file"/>
																	</label>
																				
															</div>
														</div>
													</div>
													<!-- <div class="margin-top-10">
														<a href="javascript:;" type="Submit" class="btn green">
														Submit </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div> -->
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="{{route('update-password')}}">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" name="old_password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" name="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-Type New Password</label>
														<input type="password" name="confirm_password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<button type="submit" class="btn green">
														Change Password </button>
														<a href="" class="btn default">
														Cancel </a>
													</div>
													{{ csrf_token() }}
												</form>
											</div>
											
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>						
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
 <script>
    document.getElementById("file1").onchange = function() {
        document.getElementById("form1").submit();
    };  
 </script>
@endsection