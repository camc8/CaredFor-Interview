<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CaredFor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'caredfor:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the appointments CSV file provided in `storage/app/appointments.csv`';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
}
