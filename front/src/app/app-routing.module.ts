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
  {path: '' , component: HomeComponent , canActivate : [BeforeLoginService]},
  {path : 'cart', component: CartComponent , canActivate : [BeforeLoginService]},
  {path : 'profile' , component : ProfileComponent , canActivate: [AfterLoginService]}
  ];
@NgModule({
  imports: [
    CommonModule,
    RouterModule.forRoot(routes)
  ],
  exports: [ RouterModule ],
})
export class AppRoutingModule { }
