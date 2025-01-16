<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Alamat;
use App\Models\Kawasan;
use App\Models\Pesantren;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlamatTable>
 */
class AlamatTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alamat_id'=>Alamat::all()->random()->id,
            'alamatable_id'=>fake()->randomElement([
                Pesantren::all()->random()->id,
                Kawasan::all()->random()->id,
                User::all()->random()->id,
            ]),
            'alamatable_type' => fake ()->randomElement([
                Pesantren::class,
                Kawasan::class,
                User::class,
            ]),
        ];
    }
}
