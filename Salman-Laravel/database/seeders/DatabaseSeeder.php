<?php

namespace Database\Seeders;

use App\Models\Negara;
use App\Models\User;
use App\Models\Kota;
use App\Models\Post;
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
        Kota::factory(100)->create();
        Post::factory(100)->create();
        User::factory(2000)->create();
    }
}
