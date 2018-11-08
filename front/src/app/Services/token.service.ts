import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TokenService {
private iss = {
  login : 'http://localhost:8000/api/login',
  register : 'http://localhost:8000/api/register'
};

  constructor() { }
  handle(token) {
    token = JSON.stringify(token);
this.set(token);
console.log(this.isValid());
  }




  set(token) {
    localStorage.setItem('user', token);
  }


  get() {
    return localStorage.getItem('user');
  }
  remove() {
    localStorage.removeItem('user');
  }


  isValid() {
    const token = this.get();
    if ( this.get()) {
       if (token) {
        const payload = this.payload(token);
        if(payload){
         return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
        }
      }
    }
  }

  payload(token) {
    const payload = token.split('.')[1];
   return  this.decode(payload);

  }
  decode(payload) {
  return JSON.parse(atob(payload));
  }

  loggedIn() {
    return this.isValid();
  }
}
