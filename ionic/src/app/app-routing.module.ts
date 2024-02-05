import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'appointments',
    pathMatch: 'full',
  },
  {
    path: 'appointments',
    loadChildren: () =>
      import('./pages/appointments/appointments.module').then(
        (m) => m.AppointmentsPageModule
      ),
  },
  {
    path: 'appointments/:id',
    loadChildren: () =>
      import('./pages/appointment-details/appointment-details.module').then(
        (m) => m.AppointmentDetailsPageModule
      ),
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
    HttpClientModule,
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
