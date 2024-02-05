<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;

class FakeDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fake-database {quantity=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate placeholder data for the appointments table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Appointment::factory()->count($this->argument('quantity'))->create();
        $this->alert("Created " . $this->argument('quantity') . " fake rows");
    }
}
