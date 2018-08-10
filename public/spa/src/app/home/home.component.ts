import { Component, OnInit, Injectable } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';

@Component({templateUrl: 'home.component.html'})
export class HomeComponent implements OnInit {
	ngOnInit() {
        //this.loadAllUsers();
    }
}
