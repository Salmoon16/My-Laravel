<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'lesson_id' => Lesson::all()->random()->id,
            'score' => fake()->numberBetween(50, 100),
            'evaluation' => fake()->optional()->sentence(),
            'date' => fake()->date('Y-m-d'),
        ];
    }
}
