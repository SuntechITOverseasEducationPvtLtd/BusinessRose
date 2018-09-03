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
  selector: 'app-invitations',
  templateUrl: './invitations.component.html',
  styleUrls: ['./invitations.component.css']
})
export class InvitationsComponent implements OnInit {

	@Input() users: Array<User>=[];
	connections: Connection[];
	public inv_received = 0;
	public inv_sent = 0;
	public shortlists_count = 0;
	public views = 0;
	public avail_credits = 0;
	public used_credits = 0;
	public invitation_type = 'sent';
	
		
	constructor(
        private userService: UserService, private route: ActivatedRoute, private global: GlobalService, 
		private alertService: AlertService, private router: Router
		) {}
	ngOnInit():void {
		if(this.router.url == '/invitations-received')
		{
			this.invitation_type = 'received';
		}
		this.getInvitations();		
    }
	
	getInvitations():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.invitations(this.invitation_type).subscribe(user => {
                    this.users = user['data']['invitations'];
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

}
