import { Injectable } from '@angular/core';

@Injectable()
export class GlobalService {

	constructor() { }
	
	public baseUrl = "http://localhost:8080/businessrose/public";
	public loginUrl = this.baseUrl+'/api/login';
	public homeUrl = this.baseUrl+'/api/login';
	public registerUrl = this.baseUrl+'/api/register';
	public detailsUrl = this.baseUrl+'/api/getUserProfile/';
	public connectionUrl = this.baseUrl+'/api/connectNow';
	public shortlistUrl = this.baseUrl+'/api/shortListNow';
	public invitationUrl = this.baseUrl+'/api/inviteNow';
	
	export const CO_INVESTMENT_YES: number = 1;
	export const CO_INVESTMENT_NO: number = 2;
	export const MALE: number = 1;
	export const FEMALE: number = 2;
	
	//Alert Messages
	const CONNECTED_NOW = "Your Successfully Connected";
	const SHORTLIST_NOW = "Your Successfully Shortlisted";
	const INVITATION_SENT = "Your Invitation Successfully Sent";
	
}
