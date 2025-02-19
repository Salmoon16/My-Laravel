<?php

namespace Database\Seeders;

use App\Models\Activities;
use App\Models\Assessment;
use App\Models\Attachment;
use App\Models\Attendance;
use App\Models\Departement;
use App\Models\FinancialRecord;
use App\Models\KelasSantri;
use App\Models\Lesson;
use App\Models\News;
use App\Models\Permission;
use App\Models\ProgramStage;
use App\Models\RaportSantri;
use App\Models\User;
use App\Models\UserFamily;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        UserFamily::factory(10)->create();
        KelasSantri::factory(10)->create();
        Lesson::factory(10)->create();
        Assessment::factory(10)->create();
        ProgramStage::factory(10)->create();
        RaportSantri::factory(10)->create();
        Departement::factory(10)->create();
        Activities::factory(10)->create();
        Attendance::factory(10)->create();
        Permission::factory(10)->create();
        FinancialRecord::factory(10)->create();
        Attachment::factory(10)->create();
        News::factory(10)->create();
    }
}
