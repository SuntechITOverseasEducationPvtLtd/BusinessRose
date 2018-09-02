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
  selector: 'app-purchase-history',
  templateUrl: './purchase-history.component.html',
  styleUrls: ['./purchase-history.component.css']
})
export class PurchaseHistoryComponent implements OnInit {

	@Input() users: Array<User>=[];
	private inv_received = 0;
	private inv_sent = 0;
	private shortlists_count = 0;
	private views = 0;
	private avail_credits = 0;
	private used_credits = 0;
	
		
	constructor(
        private userService: UserService, private route: ActivatedRoute, private global: GlobalService, 
		private alertService: AlertService, private router: Router
		) {}
	ngOnInit():void {
		this.purchaseHistory();		
    }
	
	purchaseHistory():void {
		$("#loadingModalCenter").modal({backdrop: 'static', keyboard: false, show:true});
		this.userService.purchaseHistory().subscribe(user => {
                    this.users = user['data']['transactions'];
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
