import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import * as moment from 'moment-timezone';

export interface ApiResult {
  page: number;
  results: any[];
  total_pages: number;
  total_results: number;
}

@Injectable({
  providedIn: 'root',
})
export class AppointmentService {
  constructor(private http: HttpClient) {}

  getAppointments(page = 1, per_page = 10): Observable<any> {
    return this.http.get(
      `${environment.baseUrl}/appointments/paginate/${per_page}?page=${page}`
    );
  }

  getAppointmentDetails(id: string): Observable<any> {
    return this.http.get(`${environment.baseUrl}/appointments/${id}`);
  }

  formatTimeToLocal(time, timezone) {
    return (
      moment(time)
        .tz(timezone || 'America/Chicago')
        .local(true)
        .format('MMMM Do YYYY, h:mm:ssa ') +
      moment.tz(moment.tz.guess()).zoneAbbr()
    );
  }
}
