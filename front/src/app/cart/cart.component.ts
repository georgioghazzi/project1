import { RecipesService } from './../Services/recipes.service';
import { Component, OnInit } from '@angular/core';
import { Recipes } from '../recipes';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
cartRecipes: Recipes[];
isDis = false;

  constructor(private recipeService: RecipesService) {


   }

  ngOnInit() {
    this.getCartProduct();
    if (this.recipeService.totalValue === 0) {
      this.isDis = true;
    }
  }

  // Call To The Remove Product function in recipService
  removeCartProduct(recipe: Recipes) {
    event.preventDefault();
    this.recipeService.removeLocalCartProduct(recipe);
        // Recalling
    this.getCartProduct();
      }

  // Call To The Get Carts From LocalStorage in RecipeService
  getCartProduct() {
    this.cartRecipes = this.recipeService.getLocalCartRecipes();
     }
 

  // Call To Get Total in Recipe Service
     getTotal() {
      this.recipeService.getTotal();
     }

  // Button Is Disabled if Total is 0 (Useless)
  isDisabled(): boolean {
    return this.isDis;
  }

  // Call To Minus Qtt in RecipeService
  minusqtt(recipe: Recipes) {
    this.recipeService.minusqtt(recipe);
    this.getCartProduct();
  }
  // Call To Add Qtt in RecipeService
  addqtt(recipe: Recipes) {
    this.recipeService.addqtt(recipe);
    this.getCartProduct();

  }
}
