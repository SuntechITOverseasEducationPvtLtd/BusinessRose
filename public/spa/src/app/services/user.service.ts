import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { User } from '../models';
import { GlobalService } from './global.service';

@Injectable()
export class UserService {
	
    constructor(private http: HttpClient, private global:GlobalService) { }
	
	private registerUrl = this.global.registerUrl;
	

    getAll() {
        return this.http.get<User[]>(`/users`);
    }

    getById(id: number) {
        return this.http.get(`/users/` + id);
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