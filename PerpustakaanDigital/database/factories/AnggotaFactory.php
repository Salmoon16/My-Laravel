<?php

namespace Database\Factories;

use App\Models\Ulasan;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'alamat'=>fake()->address(),
            'nomor_telpon'=>fake()->phoneNumber(),
            'foto_profil'=>fake()->imageUrl(200, 200, 'people'),
            'role'=>fake()->role('Anggota'),
            'peminjaman_id'=>Peminjaman::all()->fake()->id,
            'ulasan_id'=>Ulasan::all()->fake()->id,
        ];
    }
}
