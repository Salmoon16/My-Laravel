<?php

namespace Database\Factories;

use App\Models\ekskul;
use App\Models\kegiatan;
use App\Models\santri;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\santrieble>
 */
class SantriebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'santri_id'=>santri::all()->random()->id,
            'santrieble_id'=>fake()->randomElement([
                kegiatan::all()->random()->id,
                ekskul::all()->random()->id,
            ]),
            'santrieble_type'=>fake()->randomElement([
                kegiatan::class,
                ekskul::class,
            ]),
        ];
    }
}
