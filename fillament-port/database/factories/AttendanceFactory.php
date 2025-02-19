<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Activities;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'santri_id' => Str::random(20),
            'activity_id' => Str::random(20),
            'status' => fake()->randomElement(['Hadir', 'Tidak Hadir', 'Izin', 'Sakit']),
            'date' => fake()->date(),
        ];
    }
}
