@extends('admin.layout.main')                

@section('main_content') 


	<!-- Core JS files -->
	<script src="{{ url('/') }}/theme_assets/js/main/jquery.min.js"></script>
	<script src="{{ url('/') }}/theme_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="{{ url('/') }}/theme_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ url('/') }}/theme_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="{{ url('/') }}/theme_assets/js/plugins/forms/styling/uniform.min.js"></script>
	
	<script src="{{ url('/') }}/theme_assets/js/demo_pages/form_layouts.js"></script>

<!-- Page content -->
	<div class="page-content">


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Skilled Person</span> - Edit Profile</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="form_layout_horizontal.html" class="breadcrumb-item">Form layouts</a>
							<span class="breadcrumb-item active">Horizontal</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Horizontal form options -->
				
				<!-- /vertical form options -->


				<!-- 2 columns form -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h4 class="card-title">Subscription Details</h4>
						<!-- <div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div> -->
					</div>

					<div class="card-body"> 
						<form action="{{url('admin/update_user_type')}}" name="update_user_type">
			<input type="hidden" name="id" value="{{$user_types->id}}">
							<div class="row">

	<div class="col-lg-12">
		<div class="form-control-plaintext">
			<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
		</div>
	</div>

		<div class="col-md-8">
			<fieldset>
				<div class="form-group row">
					<label class="col-lg-4 col-form-label">User Type:</label>
					<div class="col-lg-8">
						<input type="text" name="user_type" class="form-control" value="{{$user_types->user_type}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label">Description:</label>
					<div class="col-lg-8">
						<input type="text" name="description" class="form-control" value="{{$user_types->description}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-lg-4 col-form-label">Status:</label>
					<div class="col-lg-8">
						<select class="form-control" name="status">                   
	                        <option value="1" <?=$user_types->status == 1 ? ' selected="selected"' : '';?>>Active</option>
	                        <option value="0" <?=$user_types->status == 0 ? ' selected="selected"' : '';?>>Deative</option>
	                       
	                    </select>
					</div>
				</div>
				
			</fieldset>
		</div>

								
							</div>

							<div class="text-left">
								<label class="col-lg-4 col-form-label">&nbsp;</label>
								<input type="submit" value="Submit form" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
				<!-- /2 columns form -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();   
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get_state_list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select State</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get_city_list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>


@stop  