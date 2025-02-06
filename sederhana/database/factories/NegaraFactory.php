<?php

namespace Database\Factories;

use App\Models\presiden;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\negara>
 */
class NegaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->country(),
            'presiden_id'=> presiden::all()->random()->id,
        ];
    }
}
