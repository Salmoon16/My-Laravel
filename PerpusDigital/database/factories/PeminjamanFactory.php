<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_peminjaman'=>fake()->dateTimeBetween('-2 week', 'now'),
            'tanggal_pengembalian'=>fake()->dateTimeBetween('now', '+2 week'),
            'status_peminjaman'=>fake()->randomElement(['Dipinjam', 'Dikembalikan']),
            'user_id'=>User::all()->random()->id,
            'book_id'=>Book::all()->random()->id,
        ];
    }
}
