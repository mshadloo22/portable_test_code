import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';

interface itisloggedin{
  status:boolean;
}
@Injectable({
  providedIn: 'root'
})
export class UserService {
  

  constructor(private http:HttpClient) { }
  isLoggedIn(): Observable<itisloggedin> {
    return this.http.get<itisloggedin>('/api1/Ct_people.php?func=isLoggedIn')
  }

  getSomeData(){
    return this.http.get<any>('/api1/Ct_people.php?func=getSomeData')
  }

  logout(){
    return this.http.get<any>('/api1/Ct_people.php?func=logout');
  }
}
