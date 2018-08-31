import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams} from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

import { User, Connection, Filters } from '../models';
import { GlobalService } from './global.service';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
};
declare var $: any;

@Injectable()
export class UserService {
	
    constructor(private http: HttpClient, private global:GlobalService) { }
	
	private registerUrl = this.global.registerUrl;
	private getAllUsersUrl = this.global.getAllUsersUrl;
	private detailsUrl = this.global.detailsUrl;
	private connectionUrl = this.global.connectionUrl;
	private shortlistUrl = this.global.shortlistUrl;
	private myShortlistsUrl = this.global.myShortlistsUrl;
	private myInvitationsUrl = this.global.myInvitationsUrl;
	private invitationUrl = this.global.invitationUrl;
	private getAllFiltersUrl = this.global.getAllFiltersUrl;
	private purchaseHistoryUrl = this.global.purchaseHistoryUrl;
	private currentEncUserId = btoa(localStorage.getItem('currentUserId')); 	
	publicIP : string;	
	

    getAll() {
        return this.http.get<User[]>(this.getAllUsersUrl, httpOptions);
    }
	
	getAllFilters() {
        return this.http.get<Filters[]>(this.getAllFiltersUrl, httpOptions);
    }
	
	getAllUsersByFilters(filters) {
		let body = new HttpParams({
			  fromObject : filters
			});
        return this.http.post<User[]>(this.getAllUsersUrl, body, httpOptions);
    }

    getById(id: String): Observable<User> {
		return this.http.get<User>(this.detailsUrl + this.currentEncUserId + '/' + id, httpOptions).pipe(
			  tap(_ => console.log(`fetched user id=${id}`)),
			  catchError(this.handleError<User>(`getById id=${id}`))
			);
    }

    register(user: User) {
        return this.http.post(this.registerUrl, user);
    }

    update(user: User) {
        return this.http.put(`/users/` + user.id, user);
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
		return this.http.get<User>(this.myShortlistsUrl, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	invitations(type : String): Observable<User> {
		return this.http.get<User>(this.myInvitationsUrl + type, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
    }
	
	purchaseHistory(): Observable<User> {
		return this.http.get<User>(this.purchaseHistoryUrl, httpOptions).pipe(
			  tap(_ => console.log(null),
			  catchError(this.handleError<User>(null))
			));
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