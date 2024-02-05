<?php

namespace App\Console\Commands;

use App\Imports\Appointments;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AppointmentsImport;

class CaredFor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caredfor:import {--test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the appointments CSV file provided in `./storage/app/appointments.csv`';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $test = $this->option('test');
        if ($test) {
            $array = Excel::toArray(new AppointmentsImport, 'appointments_test.csv');
            count($array) === 1 ? $this->info('Import test successful') : $this->error('Something went wrong!');
        } else {
            Excel::import(new AppointmentsImport, 'appointments.csv');
            $this->info('File imported successfully!');
        }
    }
}
