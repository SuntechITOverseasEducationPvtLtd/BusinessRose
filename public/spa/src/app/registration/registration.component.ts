import { Component, OnInit, Injectable } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import { UserService } from './../services';
declare var $: any;

@Component({templateUrl: 'registration.component.html'})
export class RegistrationComponent implements OnInit {
	investorForm: FormGroup;
	skillPersonForm: FormGroup;
	loading= false;
	submittedSp= false;
	submittedinv= false;
	constructor(
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router,
        private userService: UserService,
		) {}
	get inv() { return this.investorForm.controls; }	
	get sp() { return this.skillPersonForm.controls; }
	ngOnInit() {
		$("#exampleModalCenter").modal("hide");
        this.investorForm = this.formBuilder.group({
			name: ['', Validators.required],
			email: ['', Validators.required],
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
		});
		this.skillPersonForm = this.formBuilder.group({
			name: ['', Validators.required],
			email: ['', Validators.required],
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
		});
    }
	
	investorSubmit() {
		this.submittedinv = true;
	   //console.log(this.investorForm.invalid);
        // stop here if form is invalid
        if (this.investorForm.invalid) {
            return;
        }
		this.investorForm.value.user_type = 3;
		this.investorForm.value.is_accept_terms = this.investorForm.value.accept_terms;
		
		this.userService.register(this.investorForm.value)
            .pipe(first())
            .subscribe(
                data => {
                    //this.alertService.success('Registration successful', true);
                    this.router.navigate(['/login']);
                },
                error => {
                    //this.alertService.error(error);
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
		this.skillPersonForm.value.user_type = 3;
		this.skillPersonForm.value.is_accept_terms = this.skillPersonForm.value.accept_terms;
		
		this.userService.register(this.skillPersonForm.value)
            .pipe(first())
            .subscribe(
                data => {
                    //this.alertService.success('Registration successful', true);
                    this.router.navigate(['/login']);
                },
                error => {
                    //this.alertService.error(error);
                    this.loading = false;
                });
	}
}
