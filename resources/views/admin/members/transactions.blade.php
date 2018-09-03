@extends('admin.layout.main')    
@section('main_content')


	<script src="{{ url('/') }}/theme_assets/js/plugins/tables/footable/footable.min.js"></script>
	<script src="{{ url('/') }}/theme_assets/js/demo_pages/table_responsive.js"></script>


<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Skilled Persons</span> - Transaction History</h4>
						<!-- <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> -->
					</div>

					<!-- <div class="header-elements d-none">
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
					</div> -->
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="datatable_responsive.html" class="breadcrumb-item">Skilled Persons</a>
							<span class="breadcrumb-item active">Transaction History</span>
						</div>

						<!-- <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> -->
					</div>

					<!-- <div class="header-elements d-none">
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
					</div> -->
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Transaction History</h5>
						<!-- <div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div> -->
					</div>

					<div class="card-body">
						The <code>Responsive</code> extension for DataTables can be applied to a DataTable in one of two ways; with a specific <code>class name</code> on the table, or using the DataTables initialisation options. 
					</div>

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>SNo</th>
								<th>Transaction Id</th>
								<th>Subscription Name</th>
								<th>Price</th>
								<th>Credits</th>
								<th>Discount</th>
								<th>Validity</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($users as $user) { ?>
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $user->transaction_id }}</td>
								<td>{{ $user->title }}</td>
								<td>{{ $user->tprice }}</td>
								<td>{{ $user->tcredits }}</td>
								<td>{{ $user->tdiscount }}</td>
								<td>{{ date('F d, Y',strtotime(now().'+'.$user->tvalidity.'Days')) }}</td>
								<td><span class="badge badge-success">{{($user->tstatus==1)?"Active":"Deactive"}}</span></td>
								
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