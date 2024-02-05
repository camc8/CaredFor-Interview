<?php

namespace Tests\Unit;

use Tests\TestCase;

class CaredForCommandTest extends TestCase
{
    /**
     * Test a console command.
     */
    public function test_caredfor_import_command(): void
    {
        $this->artisan('caredfor:import --test')
            ->expectsOutput('Import test successful')
            ->assertExitCode(0);
    }
}
