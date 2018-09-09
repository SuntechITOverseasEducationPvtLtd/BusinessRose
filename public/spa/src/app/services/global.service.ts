import { Injectable } from '@angular/core';
import {environment} from '../../environments/environment';

@Injectable()
export class GlobalService {

	constructor() { }
	
	public baseUrl = environment.baseUrl;
	public loginUrl = this.baseUrl+'/api/login';
	public homeUrl = this.baseUrl+'/api/login';
	public registerUrl = this.baseUrl+'/api/register';
	public getAllUsersUrl = this.baseUrl+'/api/allusers';
	public detailsUrl = this.baseUrl+'/api/getUserProfile/';
	public connectionUrl = this.baseUrl+'/api/connectNow';
	public shortlistUrl = this.baseUrl+'/api/shortListNow';
	public invitationUrl = this.baseUrl+'/api/inviteNow';
	public getAllFiltersUrl = this.baseUrl+'/api/filters';
	public myShortlistsUrl = this.baseUrl+'/api/myshortlists';
	public myInvitationsUrl = this.baseUrl+'/api/myinvitations/';
	public purchaseHistoryUrl = this.baseUrl+'/api/all-transactions';
	
	//Alert Messages
	public CONNECTED_NOW = "Your Successfully Connected";
	public SHORTLIST_NOW = "Your Successfully Shortlisted";
	public INVITATION_SENT = "Your Invitation Successfully Sent";
	
	public CO_INVESTMENT_YES: number = 1;
	public CO_INVESTMENT_NO: number = 2;
	public MALE: number = 1;
	public FEMALE: number = 2;
	public INVESTOR: number = 2;
	public SKILLED_PERSON: number = 3;
	
	
}


	
