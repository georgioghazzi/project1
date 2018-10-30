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
  constructor(private recipeService: RecipesService) { }

  ngOnInit() {
    this.getCartProduct();
    this.getTotal();
  }
  removeCartProduct(recipe: Recipes) {
    event.preventDefault();
    this.recipeService.removeLocalCartProduct(recipe);
        // Recalling
    this.getCartProduct();
      }
  getCartProduct() {
    this.cartRecipes = this.recipeService.getLocalCartRecipes();
     }
  getTotal() {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));

    recipes.forEach(recipe => {
      this.recipeService.totalValue += recipe.Price * 1;
    });

  }

}
