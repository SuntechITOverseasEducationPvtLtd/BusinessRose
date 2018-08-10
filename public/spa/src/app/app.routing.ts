import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './home';
import { DashboardComponent } from './dashboard';
import { RegistrationComponent } from './registration';
import { AuthGuard } from './guards';

const appRoutes: Routes = [
    { path: '', component: HomeComponent},
    //{ path: 'dashboard', component: DashboardComponent },
    { path: 'dashboard', component: DashboardComponent, canActivate: [AuthGuard] },
    { path: 'register', component: RegistrationComponent },

    // otherwise redirect to home
    { path: '**', redirectTo: '' }
];

export const routing = RouterModule.forRoot(appRoutes);