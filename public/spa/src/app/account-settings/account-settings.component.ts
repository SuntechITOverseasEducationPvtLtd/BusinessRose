import { Component, OnInit, Injectable } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import { UserService } from './../services';
declare var $: any;

@Component({
  selector: 'app-account-settings',
  templateUrl: './account-settings.component.html',
  styleUrls: ['./account-settings.component.css']
})
export class AccountSettingsComponent implements OnInit {
	changePasswordForm: FormGroup;
	constructor(private formBuilder: FormBuilder, private userService: UserService,) { }

	ngOnInit() {
		this.changePasswordForm = this.formBuilder.group({
			password: ['', Validators.required],
			c_password: ['', Validators.required],            
		});
	}
	get cp() { return this.changePasswordForm.controls; }

}
