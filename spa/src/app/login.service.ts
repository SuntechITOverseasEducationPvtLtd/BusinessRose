import { Injectable } from '@angular/core';
import { HttpClient , HttpParams   } from '@angular/common/http';
import { Observable } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';


@Injectable({ providedIn: 'root' })
export class LoginService {
  private OauthLoginEndPointUrl = 'http://127.0.0.1:8000/login';  // Oauth Login EndPointUrl to web API
  private clientId ='2';
  private clientSecret ='A4iX0neXv4LCwpWf0d4m9a8Q78RGeiCzwqfuiezn';

  constructor(private http: HttpClient) {}

  /*login(username, password) : Observable {
	  event.preventDefault();
    console.log("obs");
	//alert(123);
    let params: URLSearchParams = new HttpParams();
    params.set('username', username );
    params.set('password', password );
	//alert(password);
    //params.set('client_id', this.clientId );
    //params.set('client_secret', this.clientSecret );
    //params.set('grant_type', 'password' );
	console.log(this.http.post(this.OauthLoginEndPointUrl , {
      search: params
    }));
    return this.http.get(this.OauthLoginEndPointUrl , {
      search: params
    }).map(this.handleData)
      .catch(this.handleError);
  }

  private handleData(res: Response) {
    let body = res.json();
    return body;
  }

  private handleError (error: any) {
    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message
    let errMsg = (error.message) ? error.message :
      error.status ? `${error.status} - ${error.statusText}` : 'Server error';
    console.error(errMsg); // log to console instead
    return Observable.throw(errMsg);
  }*/

  public logout() {
    localStorage.removeItem('token');
  }
}