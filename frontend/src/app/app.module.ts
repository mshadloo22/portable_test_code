import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {FormsModule,ReactiveFormsModule} from '@angular/forms';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {NgxPaginationModule} from 'ngx-pagination';
import {AccordionModule} from "ngx-accordion";
import { AngularFontAwesomeModule } from 'angular-font-awesome';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import * as $ from 'jquery';










import { AppComponent } from './app.component';
import {SrvrecordsService} from './Service/Srvrecords.service';
import {HttpClientModule} from '@angular/common/http';
import {UserService} from './Service/User.service';
import {AuthGuard} from './Service/auth.guard';

import {AppRoutingModule } from './app-routing.module';
import { HomeComponent } from './View/home/home.component';
import { LoginComponent } from './View/login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    LoginComponent,

  ],
  imports: [ReactiveFormsModule,NgxPaginationModule,NgbModule,FormsModule,AccordionModule,
    BrowserModule,HttpClientModule,AppRoutingModule,AngularFontAwesomeModule,
      ],
  providers: [SrvrecordsService,UserService,AuthGuard],
  bootstrap: [AppComponent]
})
export class AppModule {
  testname:string;
  constructor(){
    this.testname="this is another test for this app";
  }
 }