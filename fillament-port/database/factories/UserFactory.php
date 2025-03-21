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
        $name = fake()->name();
        $nameEmail = str_replace(' ', '', $name);
        $entryDate = fake()->date();
        return [
            'name' => $name,
            'email' => $nameEmail . '@gmail.com',
            'no_ktp' => Str::random(20),
            'nisn' => Str::random(20),
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'date_of_birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'generation' => fake()->numberBetween(1, 10),
            'entry_date' => $entryDate,
            'graduate_date' => fake()->dateTimeBetween($entryDate, date('Y-m-d', strtotime($entryDate . ' +' . fake()->numberBetween(2, 10) . ' years'))),
            'status_graduate' => fake()->randomElement(['Lulus', 'Masa Belajar', 'DropOut', 'Tidak Lulus', 'Keluar']),
            'role' => fake()->randomElement(['Santri', 'Admin', 'Mentor', 'Ustadz', 'Leader']),
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
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
