<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Peminjam;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Peminjam::factory(10)->create();
        Buku::factory(10)->create();

    }
}
