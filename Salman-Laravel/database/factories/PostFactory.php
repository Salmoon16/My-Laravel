<?php

namespace Database\Factories;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nick = fake()->unique()->name();
        $name = str_replace(' ', '', $nick);
        $name = strtolower($name);
        return [
            'name' => $nick,
            'email' => $name . '@gmail.com',
            'kota_id' => Kota::all()->random()->id,
            'web' => $name . '.com',
            'address' => fake()->address(),
            'phone' => fake()->randomNumber(),
        ];
    }
}
