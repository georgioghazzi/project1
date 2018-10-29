import { Component, OnInit } from '@angular/core';
import { Recipes } from '../recipes';
import { RecipesService } from '../Services/recipes.service';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
cartRecipes: Recipes[];
totalValue = 0;
  constructor(private recipeService: RecipesService) { }

  ngOnInit() {
    this.getCartProduct();
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

}
