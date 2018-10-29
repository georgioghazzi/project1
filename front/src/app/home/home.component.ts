import { RecipesService } from './../Services/recipes.service';



import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  public recipes = [];
  private apiURL = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient,
              private recipesService: RecipesService) { }
  getrecipes() {
    return this.http.get(this.apiURL).subscribe((res: any[]) => {
      this.recipes = res;
      });
}
  ngOnInit() {
this.getrecipes() ;
  }
AddToCart(recipes) {
  event.preventDefault();
  this.recipesService.addToCart(recipes);


}
}
