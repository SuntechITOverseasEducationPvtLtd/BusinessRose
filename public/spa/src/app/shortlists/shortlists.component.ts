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
  selector: 'app-shortlists',
  templateUrl: './shortlists.component.html',
  styleUrls: ['./shortlists.component.css']
})
export class ShortlistsComponent implements OnInit {

	@Input() users: Array<User>=[];
	connections: Connection[];
	public inv_received = 0;
	public inv_sent = 0;
	public shortlists_count = 0;
	public views = 0;
	public avail_credits = 0;
	public used_credits = 0;
	
		
	constructor(
        private userService: UserService, private route: ActivatedRoute, private global: GlobalService, 
		private alertService: AlertService, private router: Router
		) {}
	ngOnInit():void {
		this.getShortLists();		
    }
	
	getShortLists():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.shortlists().subscribe(user => {
                    this.users = user['data']['shortlists'];
                    this.inv_received = user['data']['inv_received'];
                    this.inv_sent = user['data']['inv_sent'];
                    this.shortlists_count = user['data']['shortlists_count'];
                    this.views = user['data']['views'];
                    this.avail_credits = user['data']['avail_credits'];
                    this.used_credits = user['data']['used_credits'];
					$("#loadingModalCenter").modal("hide");
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
					this.getShortLists();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	shortlistNow(user_id) : void {
		this.userService.shortlistNow(user_id).subscribe(data => {
                    this.alertService.success(this.global.SHORTLIST_NOW, true);
					$("#alertModalCenter").modal("show");
					this.getShortLists();
                },
                error => {
                    this.alertService.error(error);
                });
	}
	
	inviteNow(user_id) : void {
		this.userService.inviteNow(user_id).subscribe(data => {
                    this.alertService.success(this.global.INVITATION_SENT, true);
					$("#alertModalCenter").modal("show");
					this.getShortLists();
                },
                error => {
                    this.alertService.error(error);
                });
	}

}
