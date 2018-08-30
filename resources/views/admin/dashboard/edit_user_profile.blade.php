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
						<h4 class="card-title">Profile Details</h4>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body"> 

			<?php if($users->userType == 3) { ?>
			<form action="{{url('admin/update_member_profile')}}" name="update_profile">
			<?php } else if($users->userType == 2) { ?>
			<form action="{{url('admin/update_investor_profile')}}" name="update_profile">
			<?php } else if($users->userType == 4) { ?>
			<form action="{{url('admin/update_smallInvestor_profile')}}" name="update_profile">
			<?php } else if($users->userType == 5) { ?>
			<form action="{{url('admin/update_seedInvestor_profile')}}" name="update_profile">
			<?php } else if($users->userType == 6) { ?>
			<form action="{{url('admin/update_fresher_profile')}}" name="update_profile">
			<?php } ?>


			<input type="hidden" name="userId" value="{{$users->user_id}}">
			<input type="hidden" name="userType" value="{{$users->userType}}">
							<div class="row">

	<div class="col-lg-12">
		<div class="form-control-plaintext">
			<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
		</div>
	</div>

								<div class="col-md-6">
									<fieldset>
									
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Name:</label>
											<div class="col-lg-8">
												<input type="text" name="username" class="form-control" value="{{$users->name}}">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Date of Birth:</label>
											<div class="col-lg-8">
												<input class="form-control" type="date" name="date_of_birth" value="{{$users->date_of_birth}}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Phone No:</label>
											<div class="col-lg-8">
												<input type="text" name="mobile" value="{{$users->mobile}}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Qualification</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="qualification">
					                                <?php foreach($qualifications as $row1) { ?>
					                                <option value="{{$row1->id}}" <?=$row1->id == $users->qualification ? ' selected="selected"' : '';?> >{{$row1->qualification}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Experience</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="experience">
					                                <?php foreach($experiences as $row3) { ?>
					                                <option value="{{$row3->id}}" <?=$row3->id == $users->experience ? ' selected="selected"' : '';?> >{{$row3->experience}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Business Category</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="category">
					                                <?php foreach($categories as $row5) { ?>
					                                <option value="{{$row5->id}}" <?=$row5->id == $users->category ? ' selected="selected"' : '';?> >{{$row5->cat_name}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Religion</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="religion">
					                                <?php foreach($religions as $row7) { ?>
					                                <option value="{{$row7->id}}" <?=$row7->id == $users->religion ? ' selected="selected"' : '';?> >{{$row7->religion}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Languages Known</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="language">
					                                <?php foreach($languages as $row9) { ?>
					                                <option value="{{$row9->id}}" <?=$row9->id == $users->known_languages ? ' selected="selected"' : '';?> >{{$row9->language}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">State Living In</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="state" id="state">
					                                <option value="{{$users->state}}">Select State</option>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Relationship Status</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="relation">
					                                <?php foreach($relationship_statusses as $row13) { ?>
					                                <option value="{{$row13->id}}" <?=$row13->id == $users->relationship_status ? ' selected="selected"' : '';?> >{{$row13->relation}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Financials (about profit sharing, benefits, compensation/salary)</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="investment_type">
					                                <?php foreach($investment_types as $row15) { ?>
					                                <option value="{{$row15->id}}" <?=$row15->id == $users->investment_type ? ' selected="selected"' : '';?> >{{$row15->investment_type}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
											<label class="col-lg-4 col-form-label">LinkedIn Url:</label>
											<div class="col-lg-8">
												<input type="text" name="linkedin" value="{{$users->linked_in_url}}" class="form-control">
											</div>
										</div>
										<?php if($users->userType == 3 || $users->userType == 6) { ?>
										<!-- for members -->
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Skill and experience i am looking for...:</label>
											<div class="col-lg-8">
												<textarea rows="5" cols="8" class="form-control" name="skills_experience">{{$users->description_of_skills_experience}}</textarea>
											</div>		
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">About Me:</label>
											<div class="col-lg-8"> 	
												<textarea rows="5" cols="8" class="form-control" name="description_you_family">{{$users->description_you_family}}</textarea>
											</div>
										</div>
										<?php } else { ?>
										<!-- for investors -->

										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Mention about your skill, experience, achivment, your role etc:</label>
											<div class="col-lg-8">
												<textarea rows="5" cols="8" class="form-control" name="desc_skills_experience">{{$users->description_of_skills_experience}}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">About Me and my family etc:</label>
											<div class="col-lg-8">
												<textarea rows="5" cols="8" class="form-control" name="desc_you_family">{{$users->description_you_family}}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Relocation preferance Are you will to relocate.:</label>
											<div class="col-lg-8">
												<textarea rows="5" cols="8" class="form-control" name="relocation_preferance">{{$users->description_relocation_preferance}}</textarea>
											</div>
										</div>
										<?php } ?>
									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
					                	<!-- <legend class="font-weight-semibold"><i class="icon-truck mr-2"></i> Shipping details</legend> -->

										
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Email:</label>
											<div class="col-lg-8">
												<input type="text" value="{{$users->email}}" class="form-control" name="email" readonly="true">
											</div>
										</div>
										<div class="form-group row">
										<label class="col-lg-4 col-form-label">Gender:</label>
										<div class="col-lg-8">
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" value="1" class="form-input-styled" name="gender" <?=$users->gender == 1 ? ' checked="checked"' : '';?> data-fouc>
													Male
												</label>
											</div>

											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" value="2" class="form-input-styled" name="gender" <?=$users->gender == 2 ? ' checked="checked"' : '';?> data-fouc>
													Female
												</label>
											</div>
										</div>
									</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Whatsapp No:</label>
											<div class="col-lg-8">
												<input type="text" name="whatsup_number" value="{{$users->whatsup_number}}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Occupation</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="occupation">
					                                <?php foreach($occupations as $row2) { ?>
					                                <option value="{{$row2->id}}" <?=$row2->id == $users->occupation ? ' selected="selected"' : '';?> >{{$row2->occupation}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Profile Created By</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="profile_created_by">
					                                <option value="1" <?=$users->profile_created_by == 1 ? ' selected="selected"' : '';?>>Self</option>
					                                <option value="2" <?=$users->profile_created_by == 2 ? ' selected="selected"' : '';?>>Sibling/Friend/Others</option>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Sub Category</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="sub_category">
					                                <?php foreach($sub_categories as $row4) { ?>
					                                <option value="{{$row4->id}}" <?=$row4->id == $users->sub_category ? ' selected="selected"' : '';?> >{{$row4->sub_cat_name}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Mother Tongue</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="mother_tongue">
					                                <?php foreach($languages as $row6) { ?>
					                                <option value="{{$row6->id}}" <?=$row6->id == $users->mother_tongue ? ' selected="selected"' : '';?> >{{$row6->language}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Country Living In</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="country" id="country">
					                                <?php foreach($countries as $row8) { ?>
					                                <option value="{{$row8->id}}" <?=$row8->id == $users->country ? ' selected="selected"' : '';?> >{{$row8->country_name}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">City Living In</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="city" id="city">
					                                <option value="{{$users->city}}">Select City</option>
					                            </select>
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                        	<label class="col-form-label col-lg-4">Investment Range</label>
				                        	<div class="col-lg-8">
					                            <select class="form-control" name="investment_range">
					                                <?php foreach($investment_range as $row12) { ?>
					                                <option value="{{$row12->id}}" <?=$row12->id == $users->investment_range ? ' selected="selected"' : '';?> >{{$row12->range}}</option>
					                                <?php } ?>
					                            </select>
				                            </div>
				                        </div>


				                        <div class="form-group row">
											<label class="col-lg-4 col-form-label">Upload  Image:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
											<div class="col-lg-8">
												<input type="file" name="profile_pic" value="{{$users->profile_pic}}" class="form-input-styled" data-fouc>{{$users->profile_pic}}
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Facebook Url:</label>
											<div class="col-lg-8">
												<input type="text" name="facebook_url" value="{{$users->facebook_url}}" class="form-control">
											</div>
										</div>
										<?php if($users->userType == 3 || $users->userType == 6) { ?>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Place of business , I want to invest in Odisha, Hyderabad:</label>
											<div class="col-lg-8">
												<textarea rows="5" name="desc_place_business" cols="5" class="form-control">{{$users->description_place_business}}</textarea>
											</div>
										</div>
									<?php } else { ?>
										<!-- for investors -->

										<div class="form-group row">
											<label class="col-lg-4 col-form-label">No. of cients/customer and average sales in one month, year?:</label>
											<div class="col-lg-8">
												<textarea rows="5" name="monthly_yearly_sales" cols="5" class="form-control">{{$users->monthly_yearly_sales}}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label">Describe your profound value etc:</label>
											<div class="col-lg-8">
												<textarea rows="5" name="profound" cols="5" class="form-control">{{$users->description_of_profound_value}}</textarea>
											</div>
										</div>
									<?php } ?>

									</fieldset>
								</div>
							</div>

							<div class="text-right">
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