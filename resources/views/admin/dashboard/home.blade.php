@extends('admin.layout.main')                

@section('main_content') 

<!-- Content area -->
<div class="content">

	


	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-12">


			<!-- Quick stats boxes -->
			<div class="row">
				<div class="col-lg-3">

					<!-- Members online -->
					<div class="card bg-teal-400" style="min-height: 235px;">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">36,24,328.00/-</h3>
								
							</div>
							
							<div>Sales of 2018</div>
							<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>10 Credits  - 0.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>25 Credits  - 0.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>50 Credits  - 0.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>100 Credits - 0.00</div>
							</div>
						</div>

						
					</div>
					<!-- /members online -->

				</div>

				<div class="col-lg-3">
					<div class="card bg-pink-400" style="min-height: 235px;">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">15,39,323.00</h3>
									
							</div>
							
							<div>
								 Investors Sales of {{date('F Y')}}
							</div>
							<hr>
							<div>
								<div><span class="badge badge-mark border-black mr-1"></span>10 Credits  - (10) 6000.00</div>
								<div><span class="badge badge-mark border-black mr-1"></span>25 Credits  - (20) 15000.00</div>
								<div><span class="badge badge-mark border-black mr-1"></span>50 Credits  - (30) 18000.00</div>
								<div><span class="badge badge-mark border-black mr-1"></span>100 Credits - (40) 25000.00</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-3" style="min-height: 275px;">

					<!-- Today's revenue -->
					<div class="card bg-blue-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">1,18,100.00</h3>
							</div>
							<div>
								Skilled Persons Sales of {{date('F Y')}}
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>10 Credits  - (12) 7200.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>25 Credits  - (21) 18900.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>50 Credits  - (20) 32600.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>100 Credits - (15) 60000.00</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-slate-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">1,18,100.00</h3>
							</div>
							<div>
								 Startup Skilled Persons Sales of {{date('F Y')}}
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>10 Credits  - (12) 7200.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>25 Credits  - (21) 18900.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>50 Credits  - (20) 32600.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>100 Credits - (15) 60000.00</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-brown-400" style="min-height: 275px;">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">1,18,100.00</h3>
							</div>
							<div>
								Startup Investors Sales of {{date('F Y')}}
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>10 Credits  - (12) 7200.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>25 Credits  - (21) 18900.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>50 Credits  - (20) 32600.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>100 Credits - (15) 60000.00</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-success-400" style="min-height: 275px;">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">1,18,100.00</h3>
							</div>
							<div>
								Freshers Sales of {{date('F Y')}}
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>10 Credits  - (12) 7200.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>25 Credits  - (21) 18900.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>50 Credits  - (20) 32600.00</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>100 Credits - (15) 60000.00</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-warning-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ count($members['member_count']) }}</h3>
							</div>
							<div>
								Total No Of Skilled Persons
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Active - {{ count($members['active']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Inactive - {{ count($members['inactive']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>A/C Closed - {{ count($members['account_closed']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Blocked - {{ count($members['blocked']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Purchased - {{ count($members['purchased']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Account Denied - {{ count($members['account_denied']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Not Connected - {{ count($members['not_connected']) }}</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-violet-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ count($investors['investor_count']) }}</h3>
							</div>
							<div>
								Total No Of Investors
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Active - {{ count($investors['active']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Inactive - {{ count($investors['inactive']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>A/C Closed - {{ count($investors['account_closed']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Blocked - {{ count($investors['blocked']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Purchased - {{ count($investors['purchased']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Account Denied - {{ count($investors['account_denied']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Not Connected - {{ count($investors['not_connected']) }}</div>
							</div>	
						</div>
					</div>
				</div>
			<!-- /quick stats boxes -->

			<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-teal-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ count($startupSkilled['startupSkilled_count']) }}</h3>
							</div>
							<div>
								Total Startup Skilled Persons
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Active - {{ count($startupSkilled['active']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Inactive - {{ count($startupSkilled['inactive']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>A/C Closed - {{ count($startupSkilled['account_closed']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Blocked - {{ count($startupSkilled['blocked']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Purchased - {{ count($startupSkilled['purchased']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Account Denied - {{ count($startupSkilled['account_denied']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Not Connected - {{ count($startupSkilled['not_connected']) }}</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-pink-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ count($startupInvestor['startupInvestor_count']) }}</h3>
							</div>
							<div>
								Total No Of Startup Investors
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Active - {{ count($startupInvestor['active']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Inactive - {{ count($startupInvestor['inactive']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>A/C Closed - {{ count($startupInvestor['account_closed']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Blocked - {{ count($startupInvestor['blocked']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Purchased - {{ count($startupInvestor['purchased']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Account Denied - {{ count($startupInvestor['account_denied']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Not Connected - {{ count($startupInvestor['not_connected']) }}</div>
							</div>	
						</div>
					</div>
				</div>

				<div class="col-lg-3">

					<!-- Today's revenue -->
					<div class="card bg-blue-400">
						<div class="card-body">
							<div class="d-flex">
								<h3 class="font-weight-semibold mb-0">{{ count($fresher['fresher_count']) }}</h3>
							</div>
							<div>
								Total No Of Freshers
							</div>
						

						<hr>
							<div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Active - {{ count($fresher['active']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Inactive - {{ count($fresher['inactive']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>A/C Closed - {{ count($fresher['account_closed']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Blocked - {{ count($fresher['blocked']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Purchased - {{ count($fresher['purchased']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Account Denied - {{ count($fresher['account_denied']) }}</div>
								<div><span class="badge badge-mark border-danger mr-1"></span>Not Connected - {{ count($fresher['not_connected']) }}</div>
							</div>	
						</div>
					</div>
				</div>


			
			<!-- /latest posts -->

		</div>
	</div>
	<!-- /dashboard content -->

</div>
<!-- /content area -->
@stop  