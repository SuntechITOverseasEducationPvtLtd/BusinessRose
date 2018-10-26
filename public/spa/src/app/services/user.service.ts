import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams} from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

import { User, Connection, Filters } from '../models';
import { GlobalService } from './global.service';


declare var $: any;

@Injectable()
export class UserService {
    constructor(private http: HttpClient, private global:GlobalService) {

	}
	
	private registerUrl = this.global.registerUrl;
	private updateProfileUrl = this.global.updateProfileUrl;
	private getAllUsersUrl = this.global.getAllUsersUrl;
	private detailsUrl = this.global.detailsUrl;
	private connectionUrl = this.global.connectionUrl;
	private shortlistUrl = this.global.shortlistUrl;
	private myShortlistsUrl = this.global.myShortlistsUrl;
	private myInvitationsUrl = this.global.myInvitationsUrl;
	private invitationUrl = this.global.invitationUrl;
	private getAllFiltersUrl = this.global.getAllFiltersUrl;
	private purchaseHistoryUrl = this.global.purchaseHistoryUrl;
	private viewAlertUrl = this.global.viewAlertUrl;
	private shortlistAlertUrl = this.global.shortlistAlertUrl;
	private accountSettingsUrl = this.global.accountSettingsUrl;
	private invitationAlertUrl = this.global.invitationAlertUrl;
	private hideProfileUrl = this.global.hideProfileUrl;
	private deleteProfileUrl = this.global.deleteProfileUrl;
	private currentUserUrl = this.global.currentUserUrl;
	private usersCountUrl = this.global.usersCountUrl;
	private currentEncUserId = btoa(localStorage.getItem('currentUserId')); 	
	publicIP : string;
	

    getAll() {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
        return this.http.get<User[]>(this.getAllUsersUrl, httpOptions);
    }
	
	usersCount() {
        return this.http.get<User[]>(this.usersCountUrl);
    }
	
	getAllFilters() {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
        return this.http.get<Filters[]>(this.getAllFiltersUrl, httpOptions);
    }
	
	getAllUsersByFilters(filters) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : filters
			});
        return this.http.post<User[]>(this.getAllUsersUrl, body, httpOptions);
    }

    getById(id: String): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.detailsUrl + this.currentEncUserId + '/' + id, httpOptions).pipe(
			  tap(_ => console.log(`fetched user id=${id}`)),
			  catchError(this.handleError<User>(`getById id=${id}`))
			);
    }
	getCurrentUser(): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.currentUserUrl, httpOptions).pipe(
			  
			);
    }

    register(user: User) {
        return this.http.post(this.registerUrl, user);
    }

    update(user: User) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
        return this.http.put(this.updateProfileUrl, user, httpOptions);
    }

    delete(id: number) {
        return this.http.delete(`/users/` + id);
    }
	
	getIpAddress() {
		$.getJSON('http://www.geoplugin.net/json.gp?jsoncallback=?', function(data) {
		  //console.log(JSON.stringify(data, null, 2));
		  localStorage.setItem('ipAddress',data.geoplugin_request);
		 
		});
    }
	
	connectNow(connected_to) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'connected_to' : connected_to,
				'connected_by' : this.currentEncUserId,
				'ip_address' : localStorage.getItem('ipAddress')
			  }
			});
		return this.http.post(this.connectionUrl, body, httpOptions);
    }
	
	shortlistNow(shortlist_to) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'shortlist_to' : shortlist_to,
				'shortlist_by' : this.currentEncUserId,
				'ip_address' : localStorage.getItem('ipAddress')
			  }
			});
		return this.http.post(this.shortlistUrl, body, httpOptions);
    }
	
	inviteNow(invited_to) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'invited_to' : invited_to,
				'invited_by' : this.currentEncUserId,
				'ip_address' : localStorage.getItem('ipAddress')
			  }
			});
		return this.http.post(this.invitationUrl, body, httpOptions);
    }
	
	shortlists(): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.myShortlistsUrl, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	accountSettings(): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.accountSettingsUrl, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	invitations(type : String): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.myInvitationsUrl + type, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	purchaseHistory(): Observable<User> {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		return this.http.get<User>(this.purchaseHistoryUrl, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	setViewAlert(value) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'views_alert' : value
			  }
			});
		return this.http.post(this.viewAlertUrl, body, httpOptions);
    }
	setShortlistAlert(value) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'shortlist_alert' : value
			  }
			});
		return this.http.post(this.shortlistAlertUrl, body, httpOptions);
    }
	setInvitationAlert(value) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'invitations_alert' : value
			  }
			});
		return this.http.post(this.invitationAlertUrl, body, httpOptions);
    }
	
	hideProfile(value) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'is_email_verified' : value
			  }
			});
		return this.http.post(this.hideProfileUrl, body, httpOptions);
    }
	
	deleteProfile(value) {
		let httpOptions = {
		  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
		};
		let body = new HttpParams({
			  fromObject : {
				'deleted_at' : value
			  }
			});
		return this.http.post(this.deleteProfileUrl, body, httpOptions);
    }
	
	/**
	* Handle Http operation that failed.
	* Let the app continue.
	* @param operation - name of the operation that failed
	* @param result - optional value to return as the observable result
	*/
	private handleError<T> (operation = 'operation', result?: T) {
	return (error: any): Observable<T> => {

	  // TODO: send the error to remote logging infrastructure
	  console.error(error); // log to console instead

	  // TODO: better job of transforming error for user consumption
	  this.log(`${operation} failed: ${error.message}`);

	  // Let the app keep running by returning an empty result.
	  return of(result as T);
	};
	}

	/** Log a HeroService message with the MessageService */
	private log(message: string) {
	//this.messageService.add(`HeroService: ${message}`);
	}
}