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

  constructor(private Jarvis: JarvisService) { }

  onSubmit() {
    this.Jarvis.register(this.form).subscribe(
      data => console.log(data),
      error => this.handleError(error)
    );
  }
  handleError(error) {
    this.error = error.error;
      }
   ngOnInit() {
  }

}
