import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs';
import { AuthService} from '../Service/auth.service';
import {Router} from '@angular/router';
import { UserService } from './User.service';
import {map} from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {


  constructor(private auth:AuthService,
    private router: Router,
    private user: UserService){

  }
    canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean 
    {
      console.log('canactivate status is checkiing......'+this.auth.loggedInStatus);
      if(this.auth.loggedInStatus){
        return true;
      }else{
        
        return this.user.isLoggedIn().pipe(map(res=>{
          console.log(res.status);
          if(res.status){
            this.auth.setLoggedInStatus(true);
            return true;
          }else{
            this.router.navigate(['login']);
            return false;
          }
          // console.log('res.status ='+res.status);
          // this.auth.setLoggedInStatus(res.status);
        }))
      }
  }
}
