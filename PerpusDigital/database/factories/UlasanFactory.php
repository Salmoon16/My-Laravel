<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating'=>fake()->numberBetween(1, 5),
            'komentar'=>fake()->paragraph(1),
            'gambar'=>fake()->imageUrl(200, 200, 'books'),
            'user_id'=>User::all()->random()->id,
            'book_id'=>Book::all()->random()->id,
        ];
    }
}
