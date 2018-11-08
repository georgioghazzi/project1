import { AuthService } from './../Services/auth.service';
import { TokenService } from './../Services/token.service';
import { JarvisService } from './../Services/jarvis.service';

import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public form = {
    email: null,
    password: null
  };

  public error = null;
  constructor(private Jarvis: JarvisService,
              private Token: TokenService,
              private router: Router,
              private Auth: AuthService) { }

  onSubmit() {
    this.Jarvis.login(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }
  handleResponse(data) {
    this.Token.handle(data);
    this.Auth.changeAuthStatus(true);
    this.router.navigateByUrl('/profile');

  }

  handleError(error) {
    this.error = error.error.error;
      }

  ngOnInit() {
    
  }

}
