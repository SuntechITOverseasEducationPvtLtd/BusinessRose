import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule }    from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { AppComponent } from './app.component';
import { HomeComponent } from './home';
import { routing }        from './app.routing';
import { AuthenticationService } from './services';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent
  ],
  imports: [
    BrowserModule,
	ReactiveFormsModule,
	routing,
	HttpClientModule
  ],
  providers: [
  AuthenticationService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
