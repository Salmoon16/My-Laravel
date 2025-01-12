<?php

namespace Database\Seeders;

use App\Models\Negara;
use App\Models\Kota;
use App\Models\Pesantren;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Negara::factory(50)->create();
        Kota::factory(100)->create();
        Pesantren::factory(200)->create();
        User::factory(1000)->create();
    }
}
