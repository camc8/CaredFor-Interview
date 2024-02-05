<?php

namespace Tests\Unit;

use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentModelTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test to endure model rows can be inserted.
     */
    public function test_appointment_model_can_be_created(): void
    {
        $appointment = Appointment::factory()->create();
        $this->assertModelExists($appointment);
        $appointment->delete();
        $this->assertModelMissing($appointment);
    }
}
