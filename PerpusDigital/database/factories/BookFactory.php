<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' =>fake()->name(),
            'isbn' => fake()->isbn13(),
            'deskripsi' => fake()->paragraph(),
            'tanggal_penerbitan' => fake()->dateTime(),
            'author_id' => Author::all()->random()->id,
        ];
    }
}
