import { JarvisService } from './../../Services/jarvis.service';

import { Recipes } from './../../recipes';
import { RecipesService } from './../../Services/recipes.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-checkout-guest',
  templateUrl: './checkout-guest.component.html',
  styleUrls: ['./checkout-guest.component.css']
})
export class CheckoutGuestComponent implements OnInit {
  cartRecipes: Recipes[];
   constructor(private recipeService: RecipesService,
              private Jarvis: JarvisService) { }
  public form = {
    email: null,
    name: null,
    address: null,
    time: null,
    total: this.recipeService.totalValue,
    cart: this.cartRecipes = this.recipeService.getLocalCartRecipes()
  };
  ngOnInit() {
      this.getCartProduct();
  }
  getCartProduct() {
    this.cartRecipes = this.recipeService.getLocalCartRecipes();
     }
  onSubmit() {
    this.Jarvis.order(this.form).subscribe(
      data => console.log(data),
      error => console.log(error)
    );
      this.recipeService.cleanLocalStorage();
  }


}
