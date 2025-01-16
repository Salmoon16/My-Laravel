<?php

namespace Database\Seeders;

use App\Models\Toko;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Pabrik;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pabrik::factory(5)->create();
        Toko::factory(10)->create();
        User::factory(50)->create();
    }
}
