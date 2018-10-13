import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { User } from './models';
import { first } from 'rxjs/operators';
import { AuthenticationService, GlobalService, AlertService } from './services';

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
	message = '';
	
	
	constructor(
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router,
		private authenticationService: AuthenticationService,
		private global: GlobalService,
		private alertService:AlertService
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
	get currentUserId(): any {
		return btoa(localStorage.getItem('currentUserId'));
	}

   onLogin() {
	   this.submitted = true;
		//console.log(this.loginForm);
        // stop here if form is invalid
        if (this.loginForm.invalid) {
			$('.invalid-feedback').show();
            return;
        }
		$("#loadingModalCenter").modal("show");
		$("#exampleModalCenter").css({'opacity':'0.4'});
        this.loading = true;
		this.authenticationService.login(this.f.email.value, this.f.password.value)
            .pipe(first())
            .subscribe(
                data => {
					$("#loadingModalCenter").modal("hide");
					$("#exampleModalCenter").modal("hide");
					$("#exampleModalCenter").css({'opacity':'1'});					
					$(".alert-warning").hide();					
					this.router.navigate([this.returnUrl]);
                },
                error => {
					//console.log(error.error.errors.email[0]);
					//this.alertService.error(error.errors);
					$("#loadingModalCenter").modal("hide");	
					$(".alert-warning").show();
					$("#exampleModalCenter").css({'opacity':'1'});	
					var message;
					/*if(error.error.length > 0)
					{
						if(typeof error.error.errors.email != 'undefined' )
						$(".alert-warning").html(error.error.errors.email[0]);
						
						if(typeof error.error.errors.password != 'undefined' )
						$(".alert-warning").html(error.error.errors.password[0]);
					}*/
					
					if(error.error.message.length > 0)
					{
						if(typeof error.error.message != 'undefined' )
						$(".alert-warning").html(error.error.message);
					}
					
                    this.loading = false;
                });
   }
   
   logout()
   {
	   this.authenticationService.logout();
	   this.router.navigate(['/']);
   }
   
}