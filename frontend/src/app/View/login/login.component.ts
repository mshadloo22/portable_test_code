import { Component, OnInit } from '@angular/core';
import { SrvrecordsService } from 'src/app/Service/Srvrecords.service';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  _username:string;
  _password:string;

  constructor(private _srvRecords:SrvrecordsService) { }

  ngOnInit() {
  }

  loginButton(){

  }

}
