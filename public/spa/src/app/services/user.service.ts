import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams} from '@angular/common/http';

import { User, Connection } from '../models';
import { GlobalService } from './global.service';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
};

@Injectable()
export class UserService {
	
    constructor(private http: HttpClient, private global:GlobalService) { }
	
	private registerUrl = this.global.registerUrl;
	private detailsUrl = this.global.detailsUrl;
	private connectionUrl = this.global.connectionUrl;
	private shortlistUrl = this.global.shortlistUrl;
	private invitationUrl = this.global.invitationUrl;
	private currentEncUserId = btoa(localStorage.getItem('currentUserId')); 	
	publicIP : string;	
	

    getAll() {
        return this.http.get<User[]>(`/users`);
    }

    getById(id: string) {
		return this.http.get(this.detailsUrl + this.currentEncUserId + '/' + id, httpOptions);
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
}