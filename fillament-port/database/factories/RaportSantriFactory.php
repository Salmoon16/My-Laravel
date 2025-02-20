<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RaportSantri>
 */
class RaportSantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'academic_year' => fake()->year(),
            'overall_score' => fake()->randomFloat(2, 50, 100),
            'strengths' => fake()->paragraph(),
            'weaknesses' => fake()->paragraph(),
        ];
    }
}
