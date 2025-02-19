<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFamily>
 */
class UserFamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_kk' => Str::random(20),
            'father_name' => fake()->name('male'),
            'father_job' => fake()->jobTitle(),
            'father_birth' => fake()->date(),
            'father_phone' => fake()->phoneNumber(),
            'mother_name' => fake()->name('female'),
            'mother_job' => fake()->jobTitle(),
            'mother_birth' => fake()->date(),
            'mother_phone' => fake()->phoneNumber(),
        ];
    }
}
