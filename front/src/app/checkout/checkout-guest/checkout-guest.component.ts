import { Recipes } from './../../recipes';
import { RecipesService } from './../../Services/recipes.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-checkout-guest',
  templateUrl: './checkout-guest.component.html',
  styleUrls: ['./checkout-guest.component.css']
})
export class CheckoutGuestComponent implements OnInit {

  constructor(private recipeService: RecipesService) { }

  ngOnInit() {
      this.getTotal();
  }
  getTotal() {
    const recipes: Recipes[] = JSON.parse(localStorage.getItem('avct_item'));

    recipes.forEach(recipe => {
      this.recipeService.totalValue += recipe.Price * 1;
    });
}
