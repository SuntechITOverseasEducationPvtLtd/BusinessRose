import { Component, OnInit, Injectable } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService, GlobalService, AlertService  } from './../services';
import { first } from 'rxjs/operators';
import { ActivatedRoute } from '@angular/router';
import { User, Connection } from './../models';


declare var $: any;

@Component({
  selector: 'app-account-settings',
  templateUrl: './account-settings.component.html',
  styleUrls: ['./account-settings.component.css']
})
export class AccountSettingsComponent implements OnInit {
	changePasswordForm: FormGroup;
	user: User;
	userForm: FormGroup;
	filters = [];
	submittedinv= false;
	loading= false;
	public inv_received = 0;
	public inv_sent = 0;
	public shortlists_count = 0;
	public views = 0;
	public avail_credits = 0;
	public used_credits = 0;
	unamePattern = "^[a-z0-9_-]{2,15}$";
	pwdPattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$";
	mobnumPattern = "^((\\+91-?)|0)?[0-9]{10}$"; 
	emailPattern = "^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";
	
	constructor(private formBuilder: FormBuilder, private userService: UserService, private global: GlobalService, private route: ActivatedRoute, private alertService: AlertService) {}

	get inv() { return this.userForm.controls; }
		
	ngOnInit() {
		this.getAllFilters();
		this.getUserDetails();
		this.getAccountSettings();
		
		this.changePasswordForm = this.formBuilder.group({
			password: ['', Validators.required],
			c_password: ['', Validators.required],            
		});
		this.userForm = this.formBuilder.group({
			name: ['', Validators.required],
			email: ['', [
			  Validators.required,
			  Validators.email
			]],
			gender: ['', Validators.required],
            date_of_birth: ['', Validators.required],
            mobile: ['', Validators.required],
            whatsup_number: ['', Validators.required],
            country: ['', Validators.required],
            state: ['', Validators.required],
            city: ['', Validators.required],			
            qualification: ['', Validators.required],
            occupation: ['', Validators.required],
            experience: ['', Validators.required],
            investment_range: ['', Validators.required],
            //investment_type: ['', Validators.required],
            //co_investment: ['', Validators.required],
            relationship_status: ['', Validators.required],
            religion: ['', Validators.required],
            mother_tongue: ['', Validators.required],
            known_languages: ['', Validators.required],
			category: ['', Validators.required],
            sub_category: ['', Validators.required],
            //linked_in_url: ['', Validators.required],
            //profile_pic: ['', Validators.required],
            description_of_skills_experience: ['', Validators.required],
            //description_of_sales: ['', Validators.required],
            description_you_family: ['', Validators.required],
            //description_of_profound_value: ['', Validators.required],
            //description_relocation_preferance: ['', Validators.required],
            description_place_business: ['', Validators.required],
			is_accept_terms: ['', Validators.required],			
		});
	}
	get cp() { return this.changePasswordForm.controls; }
	get userEmail() { return localStorage.getItem('userEmail'); }
	get viewAlert() { return localStorage.getItem('viewAlert'); }
	get shortlistAlert() { return localStorage.getItem('shortlistAlert'); }
	get invitationAlert() { return localStorage.getItem('invitationAlert'); }
	get hideProfileAlert() { return localStorage.getItem('hideProfile'); }
	get deleteProfileAlert() { return localStorage.getItem('deleteProfile'); }
	
	userFormSubmit() {
		this.submittedinv = true;
		console.log(this.userForm.invalid);
	    if (this.userForm.invalid) {
            return;
        }
		$("#loadingModalCenter").modal("show");
		this.userService.update(this.userForm.value)
            .pipe(first())
            .subscribe(
                data => {
                    this.alertService.success('Profile updated successful', true);
					$("#alertModalCenter").modal("show");
                    $("#loadingModalCenter").modal("hide");
                    $("#editModalCenter2").modal("hide");
                },
                error => {
                    this.alertService.error(error);
                    this.loading = false;
                });
		
	}
	
	getUserDetails():void {
		this.userService.getCurrentUser().subscribe(user => {
                    this.user = user['data'];
					console.log(user);
					//$("#loadingModalCenter").modal({show:'false'});
					$("#loadingModalCenter").modal("hide");
                },
                error => {
                    this.alertService.error(error);
                    $("#loadingModalCenter").modal("hide");
                });		
	}
	
	
	setViewAlert(value): void {
		this.userService.setViewAlert(value).subscribe(data => {
			localStorage.setItem('viewAlert',value);				
			if(value == 1)
			{
				this.alertService.success(this.global.EMAIL_ALERT, true);
			}
			else{
				this.alertService.success(this.global.UNSUBSCRIBE_ALERT, true);
			}
			//$("#alertModalCenter").modal("show");
		},
		error => {
			this.alertService.error(error);
		});
	}
	
	
	getAccountSettings():void {
		this.userService.accountSettings().subscribe(user => {
                    //this.users = user['data']['shortlists'];
                    this.inv_received = user['data']['inv_received'];
                    this.inv_sent = user['data']['inv_sent'];
                    this.shortlists_count = user['data']['shortlists_count'];
                    this.views = user['data']['views'];
                    this.avail_credits = user['data']['avail_credits'];
                    this.used_credits = user['data']['used_credits'];
                },
                error => {
                    this.alertService.error(error);
                });		
	}

	
	setShortlistAlert(value): void {
		this.userService.setShortlistAlert(value).subscribe(data => {
			localStorage.setItem('shortlistAlert',value);				
			if(value == 1)
			{
				this.alertService.success(this.global.EMAIL_ALERT, true);
			}
			else{
				this.alertService.success(this.global.UNSUBSCRIBE_ALERT, true);
			}
			//$("#alertModalCenter").modal("show");
		},
		error => {
			this.alertService.error(error);
		});
	}
	
	setInvitationAlert(value): void {
		this.userService.setInvitationAlert(value).subscribe(data => {
			localStorage.setItem('invitationAlert',value);				
			if(value == 1)
			{
				this.alertService.success(this.global.EMAIL_ALERT, true);
			}
			else{
				this.alertService.success(this.global.UNSUBSCRIBE_ALERT, true);
			}
			//$("#alertModalCenter").modal("show");
		},
		error => {
			this.alertService.error(error);
		});
	}
	
	hideProfile(value): void {
		this.userService.hideProfile(value).subscribe(data => {
			localStorage.setItem('hideProfile',value);				
			if(value == 1)
			{
				this.alertService.success(this.global.EMAIL_ALERT, true);
			}
			else{
				this.alertService.success(this.global.UNSUBSCRIBE_ALERT, true);
			}
			//$("#alertModalCenter").modal("show");
		},
		error => {
			this.alertService.error(error);
		});
	}
	
	getAllFilters():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.getAllFilters().subscribe(filters => {
			//console.log(filters['data']);
			$("#loadingModalCenter").modal("hide");
			this.filters = filters['data'];
			//console.log(this.filters.categories]);
		},
		error => {
			this.alertService.error(error);
			$("#loadingModalCenter").modal("hide");
		});		
	}

}
