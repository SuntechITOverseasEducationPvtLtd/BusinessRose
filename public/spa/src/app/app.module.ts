import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule }    from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

import { AppComponent } from './app.component';
import { HomeComponent } from './home';
import { DashboardComponent } from './dashboard';
import { RegistrationComponent } from './registration';
import { routing }        from './app.routing';
import { AuthenticationService, GlobalService, UserService, AlertService } from './services';
import { AuthGuard } from './guards';
import { DetailsComponent } from './details';
import { ShortlistsComponent } from './shortlists';
import { AlertComponent } from './directives/alert.component';
import { TitleCasePipe } from './app.titlecase.component';
import { CalculateAgePipe } from './app.agecalc.component';
import { KeysPipe } from './app.keyspipe.component';
import { InvitationsComponent } from './invitations';
import { AccountSettingsComponent } from './account-settings';
import { PurchaseHistoryComponent } from './purchase-history/purchase-history.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    DashboardComponent,
    RegistrationComponent,
    DetailsComponent,
    ShortlistsComponent,
    AlertComponent,
    TitleCasePipe,
	CalculateAgePipe,
	KeysPipe,
	InvitationsComponent,
	AccountSettingsComponent,
	PurchaseHistoryComponent
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
  AuthGuard,
  AlertService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
