import { Injectable } from '@angular/core';

@Injectable()
export class GlobalService {

	constructor() { }
	
	public baseUrl = "http://localhost:8080/businessrose/public";
	public loginUrl = this.baseUrl+'/api/login';
	public homeUrl = this.baseUrl+'/api/login';
	public registerUrl = this.baseUrl+'/api/register';
	public detailsUrl = this.baseUrl+'/api/getUserProfile/';
	
	export const CO_INVESTMENT_YES: number = 1;
	export const CO_INVESTMENT_NO: number = 2;
	export const MALE: number = 1;
	export const FEMALE: number = 2;
	
}
