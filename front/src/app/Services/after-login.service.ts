import { RecipesService } from './recipes.service';
import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { TokenService } from './token.service';

@Injectable({
  providedIn: 'root'
})
export class AfterLoginService implements CanActivate{

  canActivate(route: ActivatedRouteSnapshot , state: RouterStateSnapshot): boolean |
  Observable<boolean> | Promise<boolean> {
    this.router.navigate(['/login']);
    return this.Token.loggedIn();
  }

  constructor(private Token: TokenService,
              private recipes: RecipesService,
              private router: Router) { }
}
