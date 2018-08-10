
<?php
        $admin_path     = config('app.project.admin_panel_slug');
?>
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="mr-3">
						<a href="#"><img src="../images/logo.png" width="38" height="38" class="rounded-circle" alt=""></a>
					</div>

					<div class="media-body">
						<div class="media-title font-weight-semibold">Business Rose</div>
						<div class="font-size-xs opacity-50">
							<i class="icon-pin font-size-sm"></i> &nbsp;Hyderabad, TS
						</div>
					</div>

					<!-- <div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div> -->
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->
				<!-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li> -->
				<li class="nav-item">
					<a href="dashboard" class="nav-link active">
						<i class="icon-home4"></i>
						<span>
							Dashboard
						</span>
					</a>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Price List</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Layouts">
						<li class="nav-item"><a href="price_list" class="nav-link active">Manage</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Members</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Themes">
						<li class="nav-item"><a href="member_activations" class="nav-link active">A/C Activations</a></li>
						<li class="nav-item"><a href="member_profiles" class="nav-link">Profiles</a></li>
						<li class="nav-item"><a href="member_purchases" class="nav-link">Purchases</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Investors</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
						<li class="nav-item"><a href="investor_activations" class="nav-link">A/C Activations</a></li>
						<li class="nav-item"><a href="investor_profiles" class="nav-link">Profiles</a></li>
						<li class="nav-item"><a href="investor_purchases" class="nav-link">Purchases</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-spell-check"></i> <span>CMS</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Themes1">
						<li class="nav-item"><a href="#" class="nav-link active">Privacy & Policy</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Terms & Conditions</a></li>
						<li class="nav-item"><a href="#" class="nav-link">About US</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-grid"></i> <span>Careers</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Themes">
						<li class="nav-item"><a href="#" class="nav-link active">Manage</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Job Profiles</a></li>
					</ul>
				</li>
				<li class="nav-item nav-item-submenu">
					<a href="#" class="nav-link"><i class="icon-pencil3"></i> <span>Email Settings</span></a>

					<ul class="nav nav-group-sub" data-submenu-title="Themes2">
						<li class="nav-item"><a href="#" class="nav-link active">Manage</a></li>
					</ul>
				</li>
				<!-- /main -->

				<!-- Forms -->
				
				<!-- /page kits -->

			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->
	
</div>
<!-- /main sidebar -->

