import { RecipesService } from './recipes.service';
import { TokenService } from './token.service';
import { Observable } from 'rxjs';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class EmptycartloginService implements CanActivate {

  canActivate(route: ActivatedRouteSnapshot , state: RouterStateSnapshot) : boolean |
  Observable<boolean> | Promise<boolean> {


  if (!this.Token.loggedIn()) {
    this.router.navigate(['/login']);
    return false;
  } else {
      if (this.recipes.isEmptyCart === true) {
        console.log(this.recipes.isEmptyCart);
        this.router.navigate(['/cart']);
        return false;
      }  else {
  
          return true;
        }
      }
      }
  constructor(private Token : TokenService,private router: Router,
    private recipes: RecipesService) { }
}
