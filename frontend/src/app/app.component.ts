import { Component } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'aangulartute';
  constructor(private _router: Router,private _route: ActivatedRoute) { }
  ngOnInit() {
    console.log('appcommponentnginit');
    let url=location.href;

  }

}
