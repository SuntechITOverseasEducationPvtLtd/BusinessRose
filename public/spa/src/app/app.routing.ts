import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './home';
import { DashboardComponent } from './dashboard';
import { RegistrationComponent } from './registration';
import { DetailsComponent } from './details';
import { ShortlistsComponent } from './shortlists';
import { InvitationsComponent } from './invitations';
import { AccountSettingsComponent } from './account-settings';
import { PurchaseHistoryComponent } from './purchase-history';
import { AuthGuard } from './guards';

const appRoutes: Routes = [
    { path: '', component: HomeComponent},
    //{ path: 'dashboard', component: DashboardComponent },
    { path: 'dashboard', component: DashboardComponent, canActivate: [AuthGuard] },
    { path: 'details/:id', component: DetailsComponent, canActivate: [AuthGuard] },
    { path: 'shortlists', component: ShortlistsComponent, canActivate: [AuthGuard] },
    { path: 'register', component: RegistrationComponent },
    { path: 'invitations-received', component: InvitationsComponent, canActivate: [AuthGuard] },
    { path: 'invitations-sent', component: InvitationsComponent, canActivate: [AuthGuard] },
    { path: 'account-settings', component: AccountSettingsComponent, canActivate: [AuthGuard] },
    { path: 'purchase-history', component: PurchaseHistoryComponent, canActivate: [AuthGuard] },

    // otherwise redirect to home
    { path: '**', redirectTo: '' }
];

export const routing = RouterModule.forRoot(appRoutes);