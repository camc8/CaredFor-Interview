import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { AppointmentService } from 'src/app/services/appointment.service';

@Component({
  selector: 'app-appointment-details',
  templateUrl: './appointment-details.page.html',
  styleUrls: ['./appointment-details.page.scss'],
})
export class AppointmentDetailsPage implements OnInit {
  appointment: any | null = null;

  constructor(
    private route: ActivatedRoute,
    private appointmentService: AppointmentService
  ) {}

  ngOnInit() {
    const id = this.route.snapshot.paramMap.get('id');
    this.appointmentService
      .getAppointmentDetails(id ?? '1')
      .subscribe((result) => {
        result.data.time_formatted = this.appointmentService.formatTimeToLocal(
          result.data.appointment_date,
          result.data.timezone
        );
        this.appointment = result.data;
      });
  }
}
