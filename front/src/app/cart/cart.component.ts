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
  constructor(private recipeService: RecipesService) { }

  ngOnInit() {
    this.getCartProduct();
    if(this.recipeService.totalValue === 0)
    {
      this.isDis = true;
    }
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
 
  isDisabled() : boolean{
    return this.isDis;
  }
}
