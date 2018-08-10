import { Injectable } from '@angular/core';

@Injectable()
export class GlobalService {

	constructor() { }
	
	public baseUrl = "http://localhost:8080/businessrose/public";
	public loginUrl = this.baseUrl+'/api/login';
	public homeUrl = this.baseUrl+'/api/login';
	public registerUrl = this.baseUrl+'/api/register';
	
}
