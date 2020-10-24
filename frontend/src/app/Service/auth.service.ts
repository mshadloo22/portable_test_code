import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class AuthService {
loggedInStatus=JSON.parse(localStorage.getItem('loggedInStatus') || 'false');
  constructor(private http: HttpClient) { }

  getUserDetail(username,password){
    console.log('authsercie is called');
    return this.http.post<any>('/api1/Ct_people.php?func=getUserDetail',{
      username,password
    });

  }
  getUserDetailoztutor(email,password){
    
    return this.http.post<any>('/web/login',{
      email,password
    });

  }
  setLoggedInStatus(flag: boolean){
    this.loggedInStatus=flag;
    localStorage.setItem('loggedInStatus',flag?'true':'false');

    
  }



  isLoggedIn(){
    return JSON.parse(localStorage.getItem('loggedInStatus') || this.loggedInStatus.toString());

  }
}
