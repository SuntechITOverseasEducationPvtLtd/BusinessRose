import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule }    from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { AppComponent } from './app.component';
import { HomeComponent } from './home';
import { DashboardComponent } from './dashboard';
import { RegistrationComponent } from './registration';
import { routing }        from './app.routing';
import { AuthenticationService, GlobalService, UserService } from './services';
import { AuthGuard } from './guards';
import { DetailsComponent } from './details';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    DashboardComponent,
    RegistrationComponent,
    DetailsComponent
  ],
  imports: [
    BrowserModule,
	ReactiveFormsModule,
	routing,
	HttpClientModule
  ],
  providers: [
  AuthenticationService,
  UserService,
  GlobalService,
  AuthGuard
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
