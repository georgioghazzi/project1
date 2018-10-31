import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Recipes } from '../recipes';

@Injectable({
  providedIn: 'root'
})
export class RecipesService {
  navbarCartCount = this.getLocalCartRecipes().length;
  public recipes = [];
  public success = null;
  public totalValue = 0 ;
  private apiURL = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient) { }

  getRecipes() {
    return this.http.get(this.apiURL).subscribe((res: any[]) => {
      this.recipes = res;
      });
  }
  find(id: number) {
    return this.http.get(this.apiURL + '/' + id).subscribe((res: any[]) => {
      this.recipes = res;
      console.log(res);
      });
  }
  addToCart(data: Recipes) {
    let a: Recipes[];
    let qtt: Recipes['qtt'];
    a = JSON.parse(localStorage.getItem('avct_item'));
    a.push(data);
    localStorage.setItem('avct_item', JSON.stringify(a));
    this.success = 'done';
    console.log(this.success);
    this.calculateLocalCartProdCounts();
     }
  removeLocalCartProduct(recipe: Recipes) {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
    for (let i = 0; i < recipes.length; i++) {
      if (recipes[i].id === recipe.id) {
        recipes.splice(i, 1);
        this.totalValue -= recipe.Price * 1;
        break;
      }
    }
    // ReAdding the products after remove
    localStorage.setItem('avct_item', JSON.stringify(recipes));

    this.calculateLocalCartProdCounts();
  }

  getLocalCartRecipes(): Recipes[] {
    const products: Recipes[] =
      JSON.parse(localStorage.getItem('avct_item')) || [];
    return products;
  }
  calculateLocalCartProdCounts() {
    this.navbarCartCount = this.getLocalCartRecipes().length;
  }

}


