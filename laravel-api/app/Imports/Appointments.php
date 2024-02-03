<?php

namespace App\Imports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\ToModel;

class Appointments implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Appointment([
            'appointment_external_id' => $row[0],
            'appointment_date' => $row[1],
            'timezone' => $row[2],
            'type' => $row[3],
            'provider_external_id' => $row[4],
            'provider_name' => $row[5],
            'location_external_id' => $row[6],
            'user_external_id' => $row[7],
            'meeting_id' => $row[8],
            'meeting_password' => $row[9]
        ]);
    }
}
