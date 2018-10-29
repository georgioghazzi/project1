import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  private recipes = [];
  private apiURL = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient) { }
  getrecipes() {
    return this.http.get(this.apiURL).subscribe((res: any[]) => {
      console.log(res);
      this.recipes = res;
      });
}
  ngOnInit() {
this.getrecipes() ;
  }

}
