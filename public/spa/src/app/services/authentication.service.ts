import { Component, OnInit, Inject, Injectable } from '@angular/core';
import { Location } from '@angular/common';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { GlobalService } from './global.service';


@Injectable()

export class AuthenticationService {
	
	constructor(private http: HttpClient, private router: Router, private global:GlobalService) {}
	private login_url = this.global.loginUrl;
	

    login(email: string, password: string) {
		return this.http.post<any>(this.login_url, { email: email, password: password })
            .pipe(map(user => {
				//alert(user.access_token);
                // login successful if there's a jwt token in the response
                if (user && user.access_token) {
                    // store user details and jwt token in local storage to keep user logged in between page refreshes
                    //localStorage.setItem('currentUser', JSON.stringify(user));
					localStorage.setItem('userToken',user.access_token);
					localStorage.setItem('currentUserId',user.success.user_id);
					localStorage.setItem('userEmail',user.success.email);
					localStorage.setItem('viewAlert',user.success.views_alert);
					localStorage.setItem('shortlistAlert',user.success.shortlist_alert);
					localStorage.setItem('invitationAlert',user.success.invitations_alert);
					localStorage.setItem('hideProfile',user.success.profile_status);
					localStorage.setItem('deleteProfile',user.success.deleted_at);
					//this.router.navigate(['/home']);
                }

                return user;
            }));
    }

    logout() {
        // remove user from local storage to log user out
        localStorage.removeItem('userToken');
        localStorage.removeItem('currentUserId');
    }
}