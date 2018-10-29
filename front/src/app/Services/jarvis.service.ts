import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JarvisService {

  private baseURL= "http://localhost:8000/api"
  constructor(private http: HttpClient) { }


  register(data){
    return this.http.post(`${this.baseURL}/register`, data);
  }

  login(data){
    return this.http.post(`${this.baseURL}/login`, data);
  }
}