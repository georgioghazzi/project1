import { Router } from '@angular/router';
import { TokenService } from './../Services/token.service';
import { JarvisService } from './../Services/jarvis.service';

import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {


public form = {
  email: null,
  name: null,
  password: null,
  password_confirm: null,
  address: null,
};


public error: {} ;

  constructor(private Jarvis: JarvisService,
    private Token: TokenService,
    private router: Router) { }

  onSubmit() {
    this.Jarvis.register(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }
  handleResponse(data) {
    this.Token.handle(data.access_token);
    this.router.navigateByUrl('/profile');

  }
  handleError(error) {
    this.error = error.error;
      }
   ngOnInit() {
  }

}
