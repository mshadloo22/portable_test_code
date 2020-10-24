import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

interface myData{//put this outside of export class
obj:object;
}

@Injectable()
export class SrvrecordsService {

  constructor(private http : HttpClient) { }
/**function to get sample data
*
**/
  getData() {
return this.http.get<any>('/api1/testjson.php');
  }
  /**function to get sports list
  *
  **/
  getSportList(){
    // return this.http.get<myData>('/api1/Ct_people.php?func=getSportList');
    return this.http.get<any>('/api1/Ct_people.php?func=getSportList');
  }

  getUserDetail(){
    //post user detail and return user info if that is correct


  }
getDataApi2(){
  return this.http.get<any>('/api/web/document/test1');

}
AuthenticateUser(email:string,password:string){
    return this.http.post<any>('/api/web/login',{email:email,password:password});
}
}
