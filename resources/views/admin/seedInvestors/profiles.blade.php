@extends('admin.layout.main')  
@section('main_content')


	<!-- Core JS files -->
	<script src="js/admin/jquery.min.js"></script>
	<script src="js/admin/bootstrap.bundle.min.js"></script>
	<script src="js/admin/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="js/admin/datatables.min.js"></script>
	<script src="js/admin/responsive.min.js"></script>
	<script src="js/admin/select2.min.js"></script>

	<script src="js/admin/app.js"></script>
	<script src="js/admin/datatables_responsive.js"></script>


<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Datatables</span> - Responsive</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-bars-alt text-pink-300"></i>
								<span>Statistics</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calculator text-pink-300"></i>
								<span>Invoices</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calendar5 text-pink-300"></i>
								<span>Schedule</span>
							</a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="datatable_responsive.html" class="breadcrumb-item">Datatables</a>
							<span class="breadcrumb-item active">Responsive</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Manage Member Profiles</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>SNo</th>
								<th>Name</th>
								<th>Details</th>
								<th>Gender</th>
								<th>Email</th>
								<th>PH No</th>
								<th>Purchase Transactions</th>
								<th>Exp Level</th>
								<th>Category</th>
								<th>Sub Category</th>
								<th>A/C Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($users as $user) { ?>
							<tr>
								<td>{{ $i }}</td>
								<td >
									<div style="width:320px;">
									<div class="" style="width:60px; height:60px;float:left; overflow: hidden; margin-right: 10px;">
										<img style="width:100%; border-radius: 50%;" src="../images/dummy.jpg">
									</div>
									<div style="font-size:13px;">
									<p style="margin-bottom: 2px;"><strong>{{ $user->name }}</strong></p>
									<p style="margin-bottom: 2px;color:blue;"><i class="icon-calendar2"  style="font-size: 13px;">&nbsp;{{ date('d M Y',strtotime($user->date_of_birth)) }}</i></p>
									<p style="margin-bottom: 2px;"><i class="icon-location4" style="font-size: 13px;">&nbsp;{{ $user->city_name.', '.$user->state_name .', '. $user->country_name }}</i></p>
									</div>
									<div class="clearfix"></div>
								</div>
								</td>
								<td>
									<div style="font-size:13px;width: 150px;">
									<p style="margin-bottom: 2px;"><i class="icon-graduation" style="font-size: 13px;">&nbsp;{{ $user->qualification }}</i></p>
									<p style="margin-bottom: 2px;color:blue;"><i class="icon-user-check"  style="font-size: 13px;">&nbsp;{{ date('d M,Y, h:iA',strtotime($user->user_created_at)) }}</i></p>
									<p style="margin-bottom: 2px;color:blue;"><i class=" icon-diff-added"  style="font-size: 13px;">&nbsp;{{ date('d M,Y, h:iA',strtotime($user->activated_at)) }}</i></p>
									</div>
								</td>
								<td>{{ $user->gender==1?"Male":"Female" }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->mobile }}</td>
								<td>{{ '0' }}</td>
								<td>{{ $user->experience }}</td>
								<td>{{ $user->cat_name }}</td>
								<td>{{ $user->sub_cat_name }}</td>
								<td>@if($user->active == Config::get('constants.PENDING'))
										<span class="badge badge-primary">{{'PENDING'}}</span>
									@elseif($user->active == Config::get('constants.ACTIVE'))
										<span class="badge badge-primary">{{'ACTIVATED'}}</span>
									@elseif($user->active == Config::get('constants.INACTIVE'))
										<span class="badge badge-primary">{{'INACTIVE'}}</span>
									@elseif($user->active == Config::get('constants.ACCOUNT_CLOSED'))
										<span class="badge badge-primary">{{'ACCOUNT CLOSED'}}</span>
									@elseif($user->active == Config::get('constants.BLOCKED'))
										<span class="badge badge-primary">{{'BLOCKED'}}</span>
									@elseif($user->active == Config::get('constants.PURCHASED'))
										<span class="badge badge-primary">{{'PURCHASES'}}</span>
									@elseif($user->active == Config::get('constants.ACCOUNT_DENIED'))
										<span class="badge badge-primary">{{'DENIED'}}</span>
									@elseif($user->active == Config::get('constants.NOT_CONNECTED'))
										<span class="badge badge-primary">{{'NOT CONNECTED'}}</span>
									@endif
								</td>
								<td>
									<div class="list-icons">							
										<a href="{{url('admin/seedInvestor_profile_view',$user->user_id)}}" class="list-icons-item">&nbsp;<i class="icon-eye text-success-600"></i>View</a>
										<a href="{{url('admin/edit_seedInvestor',$user->user_id)}}" class="list-icons-item">&nbsp;<i class="icon-pencil7  text-violet-600"></i>Edit</a>
										<a href="{{url('admin/delete_seedInvestor',$user->user_id)}}" class="list-icons-item">&nbsp;&nbsp;<i class="icon-trash text-primary-600"></i>Delete</a>
										<a href="{{url('admin/block_seedInvestor',$user->user_id)}}" class="list-icons-item">&nbsp;<i class="icon-blocked text-danger-600"></i>Block</a>
									</div>									
								</td>
								
							</tr>
							<?php $i++; } ?>
							
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->


				


			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->
@stop  