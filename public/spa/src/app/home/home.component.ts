import { Component, OnInit, Injectable } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { UserService } from './../services';

@Component({templateUrl: 'home.component.html'})
export class HomeComponent implements OnInit {
	
	constructor(
        private http: HttpClient, private userService: UserService
		) {}
		
	ngOnInit() {
        if(localStorage.getItem('ipAddress') == null || localStorage.getItem('ipAddress') == '')
		{
			this.userService.getIpAddress();
		}
		//alert(localStorage.getItem('ipAddress'));	
    }
}
