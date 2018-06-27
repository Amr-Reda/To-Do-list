import { Component } from '@angular/core';
import { NgForm, NgModel } from '@angular/forms';

import { ApiService } from './api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'To-Do ';

  response: Array<string>;
  dataForm: object;
  name: any
  
  constructor(
    private api: ApiService,
  ) {
    this.dataForm = {};
    this.getTasks();
   }

  getTasks() {
    this.api.getReq('tasks').subscribe(
      res => {
        this.response = res.data;
      },
      err => {
      }
    )
  }

  delete(url: string) {
    this.api.deleteReq(url).subscribe(
      res => {
        this.getTasks();
      },
      err => {
      }
    )
    
  }

  create(form: NgForm): void {
    if (form.valid) {
      
      this.dataForm = { name: this.name };
     
      this.api.postReq('tasks', this.dataForm).subscribe(
        res => {
           this.getTasks();
        },
        err => {
        }
      )
    }
  }
  
}
