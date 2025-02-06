<?php

namespace Database\Seeders;

use App\Models\kota;
use App\Models\User;
use App\Models\alamat;
use App\Models\ekskul;
use App\Models\negara;
use App\Models\pondok;
use App\Models\santri;
use App\Models\kawasan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\kegiatan;
use App\Models\presiden;
use App\Models\alamateble;
use App\Models\santrieble;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $presidens = presiden::factory(2)->create();
       foreach ($presidens as $presiden) {
        $negaras = negara::factory(2)->create(['presiden_id'=>$presiden->id]);
        foreach ($negaras as $negara) {
        $kotas = kota::factory(2)->create(['negara_id'=>$negara->id]);
        foreach ($kotas as $kota) {
        $alamats = alamat::factory(2)->create(['kota_id'=>$kota->id]);
        for ($i = 0; $i < count($alamats); $i++) {
            pondok::factory()->create();
            kawasan::factory()->create();
            alamateble::factory()->create();
            }

            $santris = santri::factory(10)->create();
            for ($i = 0; $i < count($santris); $i++) {
                kegiatan::factory(10)->create();
                ekskul::factory(10)->create();
                santrieble::factory()->create();
                }
    }
}
       }
   
 }
}
