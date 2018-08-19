import { Component, OnInit, Input } from '@angular/core';
import { UserService, GlobalService, AlertService  } from './../services';
import { User, Connection } from './../models';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {
	@Input() user: User;
	connections: Connection[];
	
	private user_id = this.route.snapshot.paramMap.get('id');
		
	constructor(
        private userService: UserService, private route: ActivatedRoute, private global: GlobalService, 
		private alertService: AlertService, private router: Router
		) {}
	ngOnInit():void {
		this.getUserDetails();		
    }
	
	getUserDetails():void {
		this.userService.getById(this.user_id).subscribe(user => this.user = user.data);		
	}
	
	calculateAge(date_of_birth)
	{
		if(date_of_birth){
			let time = new Date(date_of_birth);
            var timeDiff = Math.abs(Date.now() - time.getTime());
			
            //Used Math.floor instead of Math.ceil
            //so 26 years and 140 days would be considered as 26, not 27.
            return Math.floor((timeDiff / (1000 * 3600 * 24))/365);
        }
		return '';
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
