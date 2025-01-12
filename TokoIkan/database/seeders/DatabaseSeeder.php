<?php

namespace Database\Seeders;

use App\Models\Negara;
use App\Models\Kota;
use App\Models\Pasar;
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
        Negara::factory(100)->create();
        Kota::factory(300)->create();
        Pasar::factory(500)->create();
        User::factory(700)->create();

    }
}
