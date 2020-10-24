import { Component, OnInit } from '@angular/core';
import { SrvrecordsService } from 'src/app/Service/Srvrecords.service';
import {ɵangular_packages_common_common_g} from "@angular/common";
import {log} from "util";

export class UserDTO {
    constructor(public email: string,
                public password?:string,
                public displayName?:string,
                public canCreate?: boolean,
                public canEdit?: boolean,
                public canDelete?: boolean,
                public canManageUser?: boolean,
                public canView?: boolean
    ){};
}


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  _userDto:UserDTO=new UserDTO('');

  constructor(private _srvRecords:SrvrecordsService) { }

  ngOnInit() {
  }

  loginButtonClicked(){
console.log('this is email='+this._userDto.email);

//--info your service imported as an private var in constructor
this._srvRecords.AuthenticateUser(this._userDto.email,this._userDto.password).subscribe(data=>{
  console.log('login returned result'+this._userDto.email);
            });

  }

}
