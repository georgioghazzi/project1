import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Recipes } from '../recipes';

@Injectable({
  providedIn: 'root'
})
export class RecipesService {
  navbarCartCount = 0;
  public recipes = [];
  public success = null;
  public totalValue = 0;
  public isEmpty: boolean;
  private apiURL = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient, private router: Router) { }

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
    let found = false;
    let recipes: Recipes[];
    recipes = JSON.parse(localStorage.getItem('avct_item')) || [];
    // loop in Recipes to see if the item passed already exits.
    for (let i = 0; i < recipes.length; i++) {
      if (recipes[i].id === data.id) {
        found = true;
       break;
      }
        }
        if (found) {
            console.log('found');
        } else {


          recipes.push(data);
          localStorage.setItem('avct_item', JSON.stringify(recipes));
          this.success = 'done';
          console.log(this.success);
          this.calculateLocalCartProdCounts();
        }
     }
     getTotal() {
      if (localStorage.getItem('avct_item') ['']) {
        console.log('cart empty!');
        return 0;
      } else {
      const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
      recipes.forEach(recipe => {
        this.totalValue += recipe.Price * 1;
        return this.totalValue;
      });
    }
    }

  removeLocalCartProduct(recipe: Recipes) {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
      if (recipes.length < 2) {
        this.cleanLocalStorage();
      } else {
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
  }

  cleanLocalStorage() {
    localStorage.clear();
    this.router.navigateByUrl('');
    this.navbarCartCount = 0;

  }
  getLocalCartRecipes(): Recipes[] {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
    if ( recipes  === null  ) {
      const products: Recipes[] = [];
      console.log('cart empty!');
      this.isEmpty = false;
    } else {

      const products: Recipes[] = JSON.parse(localStorage.getItem('avct_item')) || [];
      this.getTotal();
      this.isEmpty = true;
    return products;
    }
  }
  calculateLocalCartProdCounts() {
    this.navbarCartCount = this.getLocalCartRecipes().length;
  }

}


