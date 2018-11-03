import { Router } from '@angular/router';
import { JarvisService } from './../../Services/jarvis.service';

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
  error = null;
  constructor(private recipeService: RecipesService,
    private Jarvis: JarvisService , private router: Router) { }

    public form = {
      email: null,
      name: null,
      address: null,
      time: null,
      total: this.recipeService.getTotal(),
      cart: this.cartRecipes = this.recipeService.getLocalCartRecipes()
    };
  ngOnInit() {

    this.getCartProduct();
  }
 // Call To The Get Carts From LocalStorage in RecipeService
 getCartProduct() {
  this.cartRecipes = this.recipeService.getLocalCartRecipes();
   }

   // Submit The Data Via API To DB (needs fixing.)
  // Submit The Data Via API To DB (needs fixing.)
  onSubmit() {
    this.Jarvis.order(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
          );

  }

  handleResponse(data) {
    this.recipeService.success = 'Ordered!';
    this.recipeService.cleanLocalStorage();
    this.router.navigateByUrl('/');

  }

  handleError(error) {
    this.error = error.error.error;
      }

}
