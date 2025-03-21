<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Negara;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kawasan;
use App\Models\Pesantren;
use App\Models\Alamatable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $negaras = Negara::factory(4)->create();

        foreach ($negaras as $negara) {
            $kotas = Kota::factory(8)->create(['negara_id'=>$negara->id]);
            foreach ($kotas as $kota) {
                $alamats = Alamat::factory(20)->create(['kota_id'=>$kota->id]);

                for ($i = 0; $i < count($alamats); $i++) {
                Pesantren::factory()->create();
                Kawasan::factory()->create();
                User::factory()->create();
                Alamatable::factory()->create();
                }
            }
    }
    }
}




