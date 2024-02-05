<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_external_id' => Str::random(6),
            'appointment_date' => '2021-06-01 16:00:00',
            'timezone' => 'America/Chicago',
            'type' => 'Zoom Telehealth',
            'provider_external_id' => Str::random(4),
            'provider_name' => fake()->name(),
            'location_external_id' => Str::random(6),
            'user_external_id' => Str::random(6),
            'meeting_id' => Str::random(9),
            'meeting_password' => Str::random(8),
        ];
    }
}
