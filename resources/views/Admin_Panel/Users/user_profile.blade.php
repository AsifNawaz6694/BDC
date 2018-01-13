@extends('layouts.index')
@section('content')
<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="">{{$admin_profile->user->name}} Profile</a>
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
													Name : {{$admin_profile->user->name }}
												</p>
												<p>
													 Email : {{$admin_profile->user->email}}
												</p>
												<p>
													 Gender : {{$admin_profile->gender}}
												</p>
												<p>
													Phone : {{$admin_profile->phone}}
												</p>
												<p>
													Birth Date :{{$admin_profile->birth_date}}
												</p>
												
											</div>
											<!--end col-md-8-->											
										</div>
										<!--end row-->										
									</div>
								</div>
							</div>
							<!--tab_1_2-->
												
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			</div>
 <script>
    document.getElementById("file1").onchange = function() {
        document.getElementById("form1").submit();
    };  
 </script>
@endsection