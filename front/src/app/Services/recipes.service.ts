import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Recipes } from '../recipes';
import { formatNumber } from '@angular/common';

@Injectable({
  providedIn: 'root'
})
export class RecipesService {
  navbarCartCount = 0;
  public recipes = [];
  public success = null;
  public totalValue: number| 2 = this.getTotal();
  public isEmpty: boolean;
  private apiURL = 'http://localhost:8000/api/recipes';
  constructor(private http: HttpClient, private router: Router) {
    
   }



  // Get All Recipes
  getRecipes() {
    return this.http.get(this.apiURL).subscribe((res: any[]) => {
      this.recipes = res;
      });
  }


  // Post Find a cart item(Never Used?)
  find(id: number) {
    return this.http.get(this.apiURL + '/' + id).subscribe((res: any[]) => {
      this.recipes = res;
      console.log(res);
      });
  }


  // Add An Item To Cart
  addToCart(data: Recipes) {
    let found = false;
    let recipes: Recipes[];
    recipes = JSON.parse(localStorage.getItem('avct_item')) || [];
    // loop in Recipes to see if the item passed already exits.
    for (let i = 0; i < recipes.length; i++) {
      if (recipes[i].id === data.id) {
        found = true;
        recipes[i].qtt = recipes[i].qtt + 1;
          this.success = 'Added Quantity!';
        localStorage.setItem('avct_item', JSON.stringify(recipes));
       break;
      }
        }
        if (!found) {
          data.qtt = 1;
          recipes.push(data);
          localStorage.setItem('avct_item', JSON.stringify(recipes));
          this.success = 'Item Added!';
          console.log(this.success);
          this.calculateLocalCartProdCounts();
        }
     }


     // Get Total Of All Items In Cart
     getTotal() {
       let total: number = 0;
       console.log(JSON.parse(localStorage.getItem('avct_item')));
      if (JSON.parse(localStorage.getItem('avct_item')) === null || localStorage.getItem('avct_item')  [''] ) {
        console.log('cart empty!');
        return 0;
      } else  {
      const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
      recipes.forEach(recipe => {
        total += recipe.qtt *  recipe.Price * 1;
      });
    }

   return Number(total.toFixed(2));
    }
    // Minus The Quantity in Cart
    minusqtt(data: Recipes) {
      let recipes: Recipes[];
    recipes = JSON.parse(localStorage.getItem('avct_item'));
    // loop in Recipes to see if the item passed already exits.
    for (let i = 0; i < recipes.length; i++) {
      if (recipes[i].id === data.id) {
        if (recipes[i].qtt === 1) {
             this.removeLocalCartProduct(recipes[i]);
            break;
        }
        recipes[i].qtt = recipes[i].qtt - 1;
        localStorage.setItem('avct_item', JSON.stringify(recipes));
        this.totalValue = this.getTotal();
       break;
      }
    }
  }

  // Add Quantity in Cart
   addqtt(data: Recipes) {
      let recipes: Recipes[];
    recipes = JSON.parse(localStorage.getItem('avct_item'));
    // loop in Recipes to see if the item passed already exits.
    for (let i = 0; i < recipes.length; i++) {
      if (recipes[i].id === data.id) {
        recipes[i].qtt = recipes[i].qtt + 1;
        localStorage.setItem('avct_item', JSON.stringify(recipes));
        this.totalValue = this.getTotal();
       break;
      }
    }
    }

  // Remove A Product From LocalStorage
  removeLocalCartProduct(recipe: Recipes) {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
      if (recipes.length < 2) {
        this.cleanLocalStorage();
      } else {
        for (let i = 0; i < recipes.length; i++) {
          if (recipes[i].id === recipe.id) {
            recipes.splice(i, 1);
            this.totalValue = Number((this.totalValue - recipe.Price).toFixed(2));
            break;
         }
          }
      // ReAdding the products after remove
      localStorage.setItem('avct_item', JSON.stringify(recipes));
      this.calculateLocalCartProdCounts();
      }
  }

  // Cleans LocalStorage
  cleanLocalStorage() {
    localStorage.clear();
    this.navbarCartCount = 0;

  }

  // Get Cart Recipes From LocalStorage
  getLocalCartRecipes(): Recipes[] {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));
    if ( recipes  === null  ) {
      const products: Recipes[] = [];
      this.isEmpty = false;
    } else {

      const products: Recipes[] = JSON.parse(localStorage.getItem('avct_item')) || [];
      this.isEmpty = true;
    return products;
    }
  }


  // Set Shopping Cart Items Badge
  calculateLocalCartProdCounts() {
    if (JSON.parse(localStorage.getItem('avct_item')) === null) {
        this.navbarCartCount = 0;
    } else {
      this.navbarCartCount = this.getLocalCartRecipes().length;
    }

  }

}


