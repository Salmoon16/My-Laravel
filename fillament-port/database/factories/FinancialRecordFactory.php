<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinancialRecord>
 */
class FinancialRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => fake()->randomElement(['Pemasukan', 'Pengeluaran']),
            'description' => fake()->optional()->sentence(),
            'transaction_type' => fake()->randomElement(['Deposit', 'Withdrawal']),
            'amount' => fake()->randomFloat(2, 1000, 1000000),
            'transaction_date' => fake()->date(),
        ];
    }
}
