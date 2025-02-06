<?php

namespace Database\Factories;

use App\Models\Anggota;
use App\Models\Penulis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pustakawan>
 */
class PustakawanFactory extends Factory
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
            'role'=>fake()->role('Pustakawan'),
            'penulsi_id'=>Penulis::all()->fake()->id,
            'anggota_id'=>Anggota::all()->fake()->id,
        ];
    }
}
