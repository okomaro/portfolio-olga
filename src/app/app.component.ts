import { Component } from '@angular/core';

//external js function declaration
declare function getToday(): any;
declare function greetings(name: any): any;
declare function issueCollector(): any;


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Olga\'s portfolio';
  
  ngOnInit(): void {
    // call the externaljs functions
    getToday(); // without param
    greetings('rohol'); // with param
}
}
