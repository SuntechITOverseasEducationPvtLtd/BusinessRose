import { Component, OnInit, Input } from '@angular/core';
import { UserService, GlobalService, AlertService  } from './../services';
import { User, Connection } from './../models';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';

import {TitleCasePipe} from './../app.titlecase.component';

declare var $: any;

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {
	user: User;
	connections: Connection[];
	
	private user_id = this.route.snapshot.paramMap.get('id');
	private is_auth_user = false;
	filters = {};
	submittedinv= false;
	loading= false;
	
	userForm: FormGroup;
	catForm: FormGroup;
	aboutForm: FormGroup;
	salesForm: FormGroup;
	relationshipForm: FormGroup;
	get authUserProfile() { return this.is_auth_user; }
		
	constructor(
        private userService: UserService, private route: ActivatedRoute,public global: GlobalService, 
		private alertService: AlertService, private router: Router, private formBuilder: FormBuilder
		) {}
	ngOnInit():void {
		
		if(this.user_id == btoa(localStorage.getItem('currentUserId')))
		{
			this.is_auth_user = true;
		}
		this.getAllFilters();
		this.getUserDetails();	
		this.catForm = this.formBuilder.group({
			//occupation: ['', Validators.required],
            experience: ['', Validators.required],
            category: ['', Validators.required],
            sub_category: ['', Validators.required],
            investment_range: ['', Validators.required],
            investment_type: ['', Validators.required],
			co_investment: ['', Validators.required],
		});
		this.aboutForm = this.formBuilder.group({
			
		});
		this.salesForm = this.formBuilder.group({
			
		});
		this.relationshipForm = this.formBuilder.group({
			
		});
		this.userForm = this.formBuilder.group({
			gender: ['', Validators.required],
            //date_of_birth: ['', Validators.required],
            mobile: ['', Validators.required],
            whatsup_number: ['', Validators.required],
            country: ['', Validators.required],
            state: ['', Validators.required],
            city: ['', Validators.required],			
            qualification: ['', Validators.required],
            
			//is_accept_terms: ['', Validators.required],
			relationship_status: ['', Validators.required],
            religion: ['', Validators.required],
            mother_tongue: ['', Validators.required],
            known_languages: ['', Validators.required],
			//description_of_skills_experience: ['', Validators.required],
			//description_place_business: ['', Validators.required],
			//description_you_family: ['', Validators.required],          
		});
    }
	get inv() { return this.userForm.controls; }
	
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
	
	getAllFilters():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});		
		this.userService.getAllFilters().subscribe(filters => {
			//console.log(filters['data']);
			this.filters = filters['data'];
		},
		error => {
			$("#loadingModalCenter").modal("hide");
		});		
	}
	
	getUserDetails():void {
		this.userService.getById(this.user_id).subscribe(user => {
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
	
	connectNow(): void {
		this.userService.connectNow(this.user_id).subscribe(data => {
                    this.alertService.success(this.global.CONNECTED_NOW, true);
					$("#alertModalCenter").modal("show");
					this.getUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	shortlistNow() : void {
		this.userService.shortlistNow(this.user_id).subscribe(data => {
                    this.alertService.success(this.global.SHORTLIST_NOW, true);
					$("#alertModalCenter").modal("show");
					this.getUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	inviteNow() : void {
		this.userService.inviteNow(this.user_id).subscribe(data => {
                    this.alertService.success(this.global.INVITATION_SENT, true);
					$("#alertModalCenter").modal("show");
					this.getUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	
}
