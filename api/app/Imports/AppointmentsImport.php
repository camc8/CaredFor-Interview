<?php

namespace App\Imports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AppointmentsImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $rows = 0;

    public function model(array $row)
    {
        return new Appointment([
            'appointment_external_id' => $row['appointment_id'],
            'appointment_date' => date("Y-m-d H:i:s", strtotime($row['appointment_date'] . ' ' . $row['appointment_time'])),
            'timezone' => $row['appointment_timezone'] ?? 'America/Chicago',
            'type' => $row['appointment_type'],
            'provider_external_id' => $row['provider_id'],
            'provider_name' => $row['provider_name'],
            'location_external_id' => $row['location_id'],
            'user_external_id' => $row['user_id'],
            'meeting_id' => $row['meeting_id'],
            'meeting_password' => $row['meeting_password']
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ","
        ];
    }
}
