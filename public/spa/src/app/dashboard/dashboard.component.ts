import { Component, OnInit, Input } from '@angular/core';
import { UserService, GlobalService, AlertService  } from './../services';
import { User, Connection } from './../models';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators, FormControl, FormArray } from '@angular/forms';


import {TitleCasePipe} from './../app.titlecase.component';
import {KeysPipe} from './../app.keyspipe.component';

declare var $: any;

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

	@Input() users: Array<User>=[];	
	filters = {};
	coinvestmentIds = [];
	public sidebarFilters: FormGroup;
	coinvestment = [{ id: '', name: 'Any' },{ id: 1, name: 'Yes' },{ id: 2, name: 'No' }];
	public defaultChecked = true;
	public checkConinvestment = true;
	public user_id;
	
	constructor(private userService:UserService, private alertService:AlertService, private global: GlobalService,private formBuilder: FormBuilder) {
	const controlsCoinvest = this.coinvestment.map(c => new FormControl(false));
    controlsCoinvest[0].setValue(true); // Set the first checkbox to true (checked)
		
	this.sidebarFilters = this.formBuilder.group({
		user_type: new FormControl(),
		category: new FormControl(),
		coinvestment: new FormArray(controlsCoinvest),
		state: new FormControl(),
		investmentRange: new FormControl(),
		qualification: new FormControl(),
		experience: new FormControl(),
		religion: new FormControl(),
		motherTounge: new FormControl(),
		relationshipStatus: new FormControl(),
	});
	}
  
	ngOnInit() {
		this.getAllFilters();
		this.getAllUserDetails();	
	}
  
	getAllUserDetails():void {
		this.userService.getAll().subscribe(users => {
			this.users = users['data'];
			$("#loadingModalCenter").modal("hide");
		},
		error => {
			this.alertService.error(error);
			$("#loadingModalCenter").modal("hide");
		});		
	}
	
	getAllFilters():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.getAllFilters().subscribe(filters => {
			//console.log(filters['data']);
			this.filters = filters['data'];
		},
		error => {
			this.alertService.error(error);
			$("#loadingModalCenter").modal("hide");
		});		
	}
	
	connectNow(user_id): void {
		this.userService.connectNow(user_id).subscribe(data => {
                    this.alertService.success(this.global.CONNECTED_NOW, true);
					$("#alertModalCenter").modal("show");
					this.getAllUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	shortlistNow(user_id) : void {
		this.userService.shortlistNow(user_id).subscribe(data => {
                    this.alertService.success(this.global.SHORTLIST_NOW, true);
					$("#alertModalCenter").modal("show");
					this.getAllUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	inviteNow(user_id) : void {
		this.userService.inviteNow(user_id).subscribe(data => {
                    this.alertService.success(this.global.INVITATION_SENT, true);
					$("#alertModalCenter").modal("show");
					this.getAllUserDetails();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	applyFilter = function () {
		this.checkConinvestment = false;
		//console.log(this.sidebarFilters.value);
		this.coinvestmentIds = this.sidebarFilters.value.coinvestment
		  .map((v, i) => v ? i : null)
		  .filter(v => v !== null);
		//console.log(this.coinvestmentIds); 
		//this.sidebarFilters.controls['coinvestmentIds'] = 	this.coinvestmentIds;	
	    this.sidebarFilters.value.coinvestment = [];
	    this.sidebarFilters.value.coinvestment.push(this.coinvestmentIds);
	  
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.getAllUsersByFilters(this.sidebarFilters.value).subscribe(users => {
			this.users = users['data'];
			$("#loadingModalCenter").modal("hide");
		},
		error => {
			this.alertService.error(error);
			$("#loadingModalCenter").modal("hide");
		});
	}

}
