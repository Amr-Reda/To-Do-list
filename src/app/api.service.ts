import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';

const api: string = "http://127.0.0.1:8000/api/";

@Injectable()

export class ApiService {

  constructor(private http: HttpClient) { }

  getReq(endPoint: string): Observable<any> {
    return this.http.get(api + endPoint);
  }

  postReq(endPoint: string, data: object): Observable<any> {
    return this.http.post(api + endPoint, data);
  }

  deleteReq(endpoint: string): Observable<any> {
    return this.http.delete( api + endpoint)
  } 
}
