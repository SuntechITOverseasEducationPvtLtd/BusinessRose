import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { User } from '../models';
import { GlobalService } from './global.service';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/x-www-form-urlencoded', 'Authorization' : 'Bearer '+localStorage.getItem('userToken') })
};

@Injectable()
export class UserService {
	
    constructor(private http: HttpClient, private global:GlobalService) { }
	
	private registerUrl = this.global.registerUrl;
	private detailsUrl = this.global.detailsUrl;
	private currentEncUserId = btoa(localStorage.getItem('currentUserId')); 	
		
	

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
}