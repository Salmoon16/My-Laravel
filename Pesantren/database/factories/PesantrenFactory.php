<?php

namespace Database\Factories;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pesantren>
 */
class PesantrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ini = fake()->unique()->company();
        $itu = str_replace(' ', '', $ini);
        $itu = strtolower($itu);
        return [
            'name'=>$ini,
            'jml_santri'=>fake()->randomDigit(),
            'web'=>$itu . '.com',
            'email'=>$itu . '.gmail.com',
            'phone'=>fake()->randomNumber(),
            'address'=>fake()->address(),
        ];
    }
}
