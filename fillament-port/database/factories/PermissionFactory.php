<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(),
            'status' => fake()->randomElement(['Pending', 'Diterima', 'Ditolak']),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
        ];
    }
}
