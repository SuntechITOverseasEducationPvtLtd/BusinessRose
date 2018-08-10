import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { User } from './models';
import { first } from 'rxjs/operators';
import { AuthenticationService, GlobalService } from './services';

declare var $: any;

@Component({
    selector: 'app',
    templateUrl: 'app.component.html'
})

export class AppComponent implements OnInit { 

	loginForm: FormGroup;
	searchForm: FormGroup;
	loading = false;
    submitted = false;
    returnUrl: string;
	
	
	constructor(
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router,
		private authenticationService: AuthenticationService,
		private global: GlobalService
		) {}

    ngOnInit() {
        this.loginForm = this.formBuilder.group({
            email: ['', Validators.required],
            password: ['', Validators.required]
        });
		
		this.searchForm = this.formBuilder.group({
            search: ['', Validators.required]
        });
		
		
        // reset login status
        //this.authenticationService.logout();

        // get return url from route parameters or default to '/'
        //this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/dashboard';
        this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/dashboard';
    }
	
	get f() { return this.loginForm.controls; }
	get authUser(): any {
		return localStorage.getItem('userToken');
	}

   onLogin() {
	   this.submitted = true;
		//console.log(this.loginForm);
        // stop here if form is invalid
        if (this.loginForm.invalid) {
            return;
        }

        this.loading = true;
		this.authenticationService.login(this.f.email.value, this.f.password.value)
            .pipe(first())
            .subscribe(
                data => {
					$("#exampleModalCenter").modal("hide");		
					this.router.navigate([this.returnUrl]);
                },
                error => {
                    //this.alertService.error(error);
                    this.loading = false;
                });
   }
   
   logout()
   {
	   this.authenticationService.logout();
	   this.router.navigate(['/']);
   }
   
}