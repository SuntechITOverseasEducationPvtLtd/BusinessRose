import { Component, OnInit, Input } from '@angular/core';
import { UserService, GlobalService, AlertService  } from './../services';
import { User, Connection } from './../models';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import {TitleCasePipe} from './../app.titlecase.component';

declare var $: any;

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {
	@Input() user: Array<User>=[];
	connections: Connection[];
	
	private user_id = this.route.snapshot.paramMap.get('id');
	private is_auth_user = false;
	
	userForm: FormGroup;
	get authUserProfile() { return this.is_auth_user; }
		
	constructor(
        private userService: UserService, private route: ActivatedRoute, private global: GlobalService, 
		private alertService: AlertService, private router: Router, private formBuilder: FormBuilder
		) {}
	ngOnInit():void {
		
		if(this.user_id == btoa(localStorage.getItem('currentUserId')))
		{
			this.is_auth_user = true;
		}
		this.getUserDetails();		
    }
	
	getUserDetails():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.getById(this.user_id).subscribe(user => {
                    this.user = user['data'];
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
