import { Component, OnInit, Injectable } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { UserService } from './../services';

@Component({templateUrl: 'home.component.html'})
export class HomeComponent implements OnInit {
	public investors=0;
	public skilledPersons=0;
	public freshers=0;
	public categories=[];
	constructor(
        private http: HttpClient, private userService: UserService
		) {}
		
	ngOnInit() {
        if(localStorage.getItem('ipAddress') == null || localStorage.getItem('ipAddress') == '')
		{
			this.userService.getIpAddress();
		}
		this.usersCount();
		//alert(localStorage.getItem('ipAddress'));	
    }
	usersCount():void {
		this.userService.usersCount().subscribe(users => {
			this.investors = users['data']['investors'];
			this.skilledPersons = users['data']['skilledPersons'];
			this.freshers = users['data']['freshers'];
			this.categories = users['data']['categories'];
		},
		error => {
		});		
	}
}
