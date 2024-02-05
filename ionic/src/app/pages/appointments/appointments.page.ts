import { Component, OnInit } from '@angular/core';
import { AppointmentService } from 'src/app/services/appointment.service';

@Component({
  selector: 'app-appointments',
  templateUrl: './appointments.page.html',
  styleUrls: ['./appointments.page.scss'],
})
export class AppointmentsPage implements OnInit {
  appointments: any[] = [];
  currentPage = 0;
  pageSize = 10;
  isMaxDataLoaded = false;
  constructor(private appointmentService: AppointmentService) {}

  ngOnInit() {
    this.loadMoreData(null);
  }

  loadMoreData(event) {
    if (this.isMaxDataLoaded) {
      event?.target.complete();
      return;
    }

    this.currentPage++; // Increment page for each request
    this.appointmentService
      .getAppointments(this.currentPage, this.pageSize)
      .subscribe((data) => {
        this.appointments = this.appointments.concat(
          data.data.map((appointment) => {
            appointment.time_formatted =
              this.appointmentService.formatTimeToLocal(
                appointment.appointment_date,
                appointment.timezone
              );
            return appointment;
          })
        );
        event?.target.complete();

        // Check if all data is loaded
        if (data.current_page === data.last_page) {
          this.isMaxDataLoaded = true;
          if (event) event.target.disabled = true; // Disable infinite scroll if no more data
        }
      });
  }
}
