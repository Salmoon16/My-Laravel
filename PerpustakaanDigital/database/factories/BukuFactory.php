<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul'=>fake()->title(),
            'ISBN'=>fake()->isbn10(),
            'deskripsi'=>fake()->paragraphs(2),
            'tanggal_penerbitan'=>fake()->dateTime(),
        ]; 
    }
}
