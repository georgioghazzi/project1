import { Recipes } from './../../recipes';
import { RecipesService } from './../../Services/recipes.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css']
})
export class CheckoutComponent implements OnInit {
  cartRecipes: Recipes[];
  constructor(private recipeService: RecipesService) { }

  ngOnInit() {
    this.getCartProduct();
  }
  getCartProduct() {
    this.cartRecipes = this.recipeService.getLocalCartRecipes();
     }

}
