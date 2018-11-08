import { TokenService } from './token.service';
import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Router } from '@angular/router';
import { RecipesService } from './../Services/recipes.service';

@Injectable({
  providedIn: 'root'
})
export class EmptyCartService implements CanActivate {
  canActivate(route: ActivatedRouteSnapshot , state: RouterStateSnapshot) : boolean |
  Observable<boolean> | Promise<boolean> {

    if (this.recipes.isEmptyCart === true) {
      this.router.navigate(['/cart']);
      return false;
    }  else {

        return true;
      }
    }

  constructor(private Token : TokenService,private router: Router,
    private recipes: RecipesService) { }
}
