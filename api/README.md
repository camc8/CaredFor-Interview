# CaredFor Interview Coding

Run `composer install` to install vendor files

## Task

Create a console command called `caredfor:import` that takes the .csv file in `storage/app/appointments.csv`
and returns an appointment model saved to the sqlite database. The default appointment timezone is CST.

The Appointment model should look like

```php
[
'appointment_external_id' => '68590',
'appointment_date' => '2021-06-01 16:00:00',
'timezone' => 'America/Chicago',
'type' => 'Zoom Telehealth',
'provider_external_id' => '1196',
'provider_name' => 'Some Admin',
'location_external_id' => 'CRP_001',
'user_external_id' => 'USR_123',
'meeting_id' => '123456789',
'meeting_password' => 'abc123'
];
```

The command and model should have passing unit tests.

You are free to use the included maatwebsite/excel package to read in the csv, or anything you may be more comfortable
with. 

Create a public read endpoint to fetch the appointment list, with optional params to load 
the related user records for user and provider. This endpoint will be used to display the list of imported appointments
in the included ionic project.

Include instructions to get API up and running locally, I recommend using laravel homestead or laravel valet. 
