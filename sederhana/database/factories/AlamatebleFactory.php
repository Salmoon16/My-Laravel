<?php

namespace Database\Factories;

use App\Models\alamat;
use App\Models\pondok;
use App\Models\kawasan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alamateble>
 */
class AlamatebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alamat_id'=>alamat::all()->random()->id,
            'alamateble_id'=>fake()->randomElement([
                pondok::all()->random()->id,
                kawasan::all()->random()->id,
            ]),
            'alamateble_type'=>fake()->randomElement([
                pondok::class,
                kawasan::class,
            ]),
        ];
    }
}
