<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'date_of_birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'generation' => fake()->numberBetween(1, 10),
            'entry_date' => fake()->date(),
            'graduate_date' => fake()->optional()->date(),
            'status_graduate' => fake()->randomElement(['Graduated', 'Not Graduated']),
            // 'class_id' => (string) fake()->randomNumber(5, true),
            // 'departement_id' => (string) fake()->randomNumber(5, true),
            // 'education_stage_id' => (string) fake()->randomNumber(5, true),
            'role' => fake()->randomElement(['Admin', 'Student', 'Teacher']),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
