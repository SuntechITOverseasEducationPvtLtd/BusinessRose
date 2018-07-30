import { Component, OnInit } from '@angular/core';
//import { home } from '../home';
//import { HomeService } from '../home.service';


@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

 

  constructor() { }


  ngOnInit() {
	  //this.getHomeFilters();
  }
  
   /*getHomeFilters(): void {
    this.homeService.getFilters()
      .subscribe(filters => this.filters = filters.slice(1, 5));
  }*/

}
