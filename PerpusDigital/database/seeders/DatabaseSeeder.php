<?php

namespace Database\Seeders;

use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Author;
use App\Models\Peminjaman;
use App\Models\Profil;
use App\Models\Ulasan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $profile = Profil::factory()->create();
        }

        $authors = Author::factory(50)->create();

        foreach ($authors as $author) {
            $books = Book::factory(3)->create();
        }

        foreach ($users->where('role', 'anggota') as $member) {
            $peminjamans = Book::inRandomOrder()->take(10)->get();
            foreach ($peminjamans as $book) {
                Peminjaman::factory()->create();
            }
        }

        foreach (Book::inRandomOrder()->take(10)->get() as $book) {
            $review = Ulasan::factory()->create();
        }
    }
}
