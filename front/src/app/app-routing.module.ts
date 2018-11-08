import { EmptycartloginService } from './Services/emptycartlogin.service';
import { EmptyCartService } from './Services/empty-cart.service';
import { CheckoutComponent } from './checkout/checkout/checkout.component';
import { CheckoutGuestComponent } from './checkout/checkout-guest/checkout-guest.component';
import { AfterLoginService } from './Services/after-login.service';
import { BeforeLoginService } from './Services/before-login.service';
import { ProfileComponent } from './profile/profile.component';
import { CartComponent } from './cart/cart.component';
import { RegisterComponent } from './register/register.component';
import { HomeComponent } from './home/home.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import {LoginComponent} from './login/login.component';



const routes: Routes = [
  { path: 'login', component: LoginComponent , canActivate : [BeforeLoginService]},
  { path: 'register', component: RegisterComponent , canActivate : [BeforeLoginService]},
  {path: '' , component: HomeComponent },
  {path : 'cart', component: CartComponent  },
  {path : 'profile' , component : ProfileComponent , canActivate: [AfterLoginService]},
  {path: 'checkout-guest', component: CheckoutGuestComponent , canActivate: [EmptyCartService]},
  {path: 'checkout', component: CheckoutComponent , canActivate: [EmptycartloginService]}
  ];
@NgModule({
  imports: [
    CommonModule,
    RouterModule.forRoot(routes)
  ],
  exports: [ RouterModule ],
})
export class AppRoutingModule { }
