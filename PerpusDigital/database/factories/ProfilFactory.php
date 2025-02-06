<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alamat'=>fake()->address(),
            'nomor_telpon'=>fake()->phoneNumber(),
            'foto_profil'=>fake()->imageUrl(200, 200, 'people'),
            'user_id'=>User::all()->random()->id,
        ];
    }
}
