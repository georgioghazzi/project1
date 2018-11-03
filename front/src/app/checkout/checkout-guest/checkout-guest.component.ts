import { JarvisService } from './../../Services/jarvis.service';

import { Recipes } from './../../recipes';
import { RecipesService } from './../../Services/recipes.service';
import { Component, OnInit } from '@angular/core';
import {  Router } from '@angular/router';
import { formatDate } from '@angular/common';

@Component({
  selector: 'app-checkout-guest',
  templateUrl: './checkout-guest.component.html',
  styleUrls: ['./checkout-guest.component.css']
})
export class CheckoutGuestComponent implements OnInit {
  cartRecipes: Recipes[];
  public error = null;
   constructor(private recipeService: RecipesService,
              private Jarvis: JarvisService, private router: Router
              ) { }
  public form = {
    email: null,
    name: null,
    address: null,
    time: null,
    date_ordered : formatDate(new Date(), 'dd/MM/yyyy', 'en'),
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
