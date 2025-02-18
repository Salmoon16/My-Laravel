<?php

namespace Database\Factories;

use App\Models\KelasSantri;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'kelas_santri_id' => KelasSantri::all()->random()->id,
            'description' => fake()->text(),
        ];
    }
}
