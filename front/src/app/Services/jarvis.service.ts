import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JarvisService {

  private baseURL = 'http://localhost:8000/api';
  private orderURL = 'http://localhost:8000/api';
  constructor(private http: HttpClient) { }

  // LAZY LAZY LAZY
  register(data) {
    return this.http.post(`${this.baseURL}/register`, data);
  }

  login(data) {
    return this.http.post(`${this.baseURL}/login`, data);
  }
  order(data) {
    return this.http.post(`${this.orderURL}/order`, data);
  }

}
