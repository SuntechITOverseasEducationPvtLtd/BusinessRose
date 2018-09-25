import { Component, OnInit, Injectable } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService, GlobalService, AlertService  } from './../services';
import { first } from 'rxjs/operators';

declare var $: any;

@Component({
  selector: 'app-account-settings',
  templateUrl: './account-settings.component.html',
  styleUrls: ['./account-settings.component.css']
})
export class AccountSettingsComponent implements OnInit {
	changePasswordForm: FormGroup;
	constructor(private formBuilder: FormBuilder, private userService: UserService, private global: GlobalService, 
		private alertService: AlertService) {}

	ngOnInit() {
		this.changePasswordForm = this.formBuilder.group({
			password: ['', Validators.required],
			c_password: ['', Validators.required],            
		});
		
	}
	get cp() { return this.changePasswordForm.controls; }
	get userEmail() { return localStorage.getItem('userEmail'); }
	get viewAlert() { return localStorage.getItem('viewAlert'); }
	get shortlistAlert() { return localStorage.getItem('shortlistAlert'); }
	get invitationAlert() { return localStorage.getItem('invitationAlert'); }
	get hideProfileAlert() { return localStorage.getItem('hideProfile'); }
	get deleteProfileAlert() { return localStorage.getItem('deleteProfile'); }
	
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

}
