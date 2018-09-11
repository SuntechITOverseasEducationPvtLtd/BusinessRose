import { Component, OnInit, Injectable } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import { UserService, GlobalService, AlertService  } from './../services';
declare var $: any;

import {TitleCasePipe} from './../app.titlecase.component';
import {KeysPipe} from './../app.keyspipe.component';

@Component({templateUrl: 'registration.component.html'})
export class RegistrationComponent implements OnInit {
	investorForm: FormGroup;
	skillPersonForm: FormGroup;
	loading= false;
	submittedSp= false;
	submittedinv= false;
	registerUserType =1;
	unamePattern = "^[a-z0-9_-]{2,15}$";
	pwdPattern = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$";
	mobnumPattern = "^((\\+91-?)|0)?[0-9]{10}$"; 
	emailPattern = "^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";
	filters = [];
  
	constructor(
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router,
        private userService: UserService,
		private alertService: AlertService
		) {}
	get inv() { return this.investorForm.controls; }	
	get sp() { return this.skillPersonForm.controls; }
	ngOnInit() {
		this.getAllFilters();
		$("#exampleModalCenter").modal("hide");
        this.investorForm = this.formBuilder.group({
			name: ['', Validators.required],
			email: ['', [
			  Validators.required,
			  Validators.email
			]],
			password: ['', Validators.required],
			c_password: ['', Validators.required],
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
            category: ['', Validators.required],
            sub_category: ['', Validators.required],
            investment_range: ['', Validators.required],
            investment_type: ['', Validators.required],
			is_accept_terms: ['', Validators.required],
			relationship_status: ['', Validators.required],
            religion: ['', Validators.required],
            mother_tongue: ['', Validators.required],
            known_languages: ['', Validators.required],
			description_of_skills_experience: ['', Validators.required],
			description_place_business: ['', Validators.required],
			description_you_family: ['', Validators.required],
			profile_created_by: ['', Validators.required],
		},{validator: this.checkIfMatchingPasswords('password', 'c_password')});
		this.skillPersonForm = this.formBuilder.group({
			name: ['', Validators.required],
			email: ['', [
			  Validators.required,
			  Validators.email
			]],
			password: ['', Validators.required],
			c_password: ['', Validators.required],
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
            category: ['', Validators.required],
            sub_category: ['', Validators.required],
            investment_range: ['', Validators.required],
            investment_type: ['', Validators.required],
            co_investment: ['', Validators.required],
            relationship_status: ['', Validators.required],
            religion: ['', Validators.required],
            mother_tongue: ['', Validators.required],
            known_languages: ['', Validators.required],
            //linked_in_url: ['', Validators.required],
            //profile_pic: ['', Validators.required],
            description_of_skills_experience: ['', Validators.required],
            description_of_sales: ['', Validators.required],
            description_you_family: ['', Validators.required],
            description_of_profound_value: ['', Validators.required],
            description_relocation_preferance: ['', Validators.required],
            is_accept_terms: ['', Validators.required],
            profile_created_by: ['', Validators.required],
		},{validator: this.checkIfMatchingPasswords('password', 'c_password')});

    }
	
	investorSubmit() {
		this.submittedinv = true;
	   //console.log(this.investorForm.invalid);
	   //console.log(this.investorForm.errors);
        // stop here if form is invalid
        if (this.investorForm.invalid) {
            return;
        }
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.investorForm.value.user_type = this.registerUserType;
		this.investorForm.value.is_accept_terms = this.investorForm.value.accept_terms;
		
		this.userService.register(this.investorForm.value)
            .pipe(first())
            .subscribe(
                data => {
                    //this.alertService.success('Registration successful', true);
					$("#loadingModalCenter").modal("hide");
                    this.router.navigate(['/login']);
                },
                error => {
                    this.alertService.error(error);
					$("#loadingModalCenter").modal("hide");
                    this.loading = false;
                });
		
	}
	skillPersonSubmit() {
		this.submittedSp = true;
	   //console.log(this.skillPersonForm.invalid);
        // stop here if form is invalid
        if (this.skillPersonForm.invalid) {
            return;
        }
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.skillPersonForm.value.user_type = this.registerUserType;
		this.skillPersonForm.value.is_accept_terms = this.skillPersonForm.value.accept_terms;
		
		this.userService.register(this.skillPersonForm.value)
            .pipe(first())
            .subscribe(
                data => {
                    //this.alertService.success('Registration successful', true);
                    this.router.navigate(['/login']);
                },
                error => {
                    this.alertService.error(error);
                    this.loading = false;
                });
	}
	checkIfMatchingPasswords(passwordKey: string, passwordConfirmationKey: string) {
          return (group: FormGroup) => {
            let passwordInput = group.controls[passwordKey],
                passwordConfirmationInput = group.controls[passwordConfirmationKey];
            if (passwordInput.value !== passwordConfirmationInput.value) {
              return passwordConfirmationInput.setErrors({notEquivalent: true})
            }
            else {
                return passwordConfirmationInput.setErrors(null);
            }
          }
        }
	
	changeUserType(user_type) {
		this.registerUserType = user_type.target.value;
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
