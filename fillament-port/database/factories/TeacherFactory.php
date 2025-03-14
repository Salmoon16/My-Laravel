<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $entryDate = fake()->date();
        $seed = fake()->unique()->uuid;
        $url = "https://picsum.photos/seed/$seed/200/300";

        return [
            'name' => $name,
            'nip' => Str::random(20),
            'no_ktp' => Str::random(20),
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'date_of_birth' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  'entry_date' => $entryDate,
            'graduate_date' => fake()->dateTimeBetween($entryDate, date('Y-m-d', strtotime($entryDate . ' +' . fake()->numberBetween(2, 10) . ' years'))),
            'profile' => $url
        ];
    }
}
