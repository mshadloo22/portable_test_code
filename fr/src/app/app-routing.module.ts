import { NgModule } from '@angular/core';
import { RouterModule, Routes} from '@angular/router';
import {FormsModule} from '@angular/forms';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {NgxPaginationModule} from 'ngx-pagination';
import { HomeComponent } from './View/home/home.component';
import {LoginComponent} from './View/login/login.component';


//---------------------------------------------------------------------------------------------------------#start routing
const appRoutes=[
  {
    path:'home',
    component:HomeComponent
  },
  {
    path:'login',
    component:LoginComponent
  }  
    ];
    
    //----------------------------------------------------------------------------------------------------------#end routing
@NgModule({

  imports: [RouterModule.forRoot(
      appRoutes,{useHash:true}
      // {enableTracing:true} //for debugpurpose
    )],
    exports:[RouterModule]
  
  
})
export class AppRoutingModule { }
