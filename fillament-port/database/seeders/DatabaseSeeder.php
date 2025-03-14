<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Activities;
use App\Models\Assessment;
use App\Models\Attachment;
use App\Models\Attendance;
use App\Models\Permission;
use App\Models\UserFamily;
use App\Models\Departement;
use App\Models\KelasSantri;
use App\Models\EducationStage;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AttachmentSantri;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Salman',
            'email' => 'salman16@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('123')
        ]);

        $dataUser = User::factory(100)->create();
        $dataTeacher = Teacher::factory(100)->create();
        // $dataFamily = UserFamily::factory(10)->create();
        $dataKelas = KelasSantri::factory(10)->create();
        $dataLesson = Lesson::factory(10)->create();
        $dataAssessment = Assessment::factory(10)->create();
        $dataEducationStage = EducationStage::factory(10)->create();
        $dataDepartement = Departement::factory(10)->create();
        $dataActivities = Activities::factory(10)->create();
        $dataAttendance = Attendance::factory(10)->create();
        $dataPermission = Permission::factory(10)->create();
        $dataAttachment = Attachment::factory(10)->create();
        $dataAttachmentSantri = AttachmentSantri::factory(10)->create();

        foreach (range(1, 100) as $i) {
            UserFamily::factory()->create([
                'familiable_id' => $i % 2 == 0 ? User::all()->random()->id : Teacher::all()->random()->id,
                'familiable_type' => $i % 2 == 0 ? User::class : Teacher::class,
            ]);
        }

        foreach ($dataUser as $data) {
            $data->update([
                'kelas_santri_id' => KelasSantri::all()->random()->id,
                'department_id' => Departement::all()->random()->id,
                'education_stage_id' => EducationStage::all()->random()->id
            ]);
        }

        foreach ($dataTeacher as $data) {
            $data->update([
                'kelas_santri_id' => KelasSantri::all()->random()->id,
            ]);
        }

        // foreach ($dataFamily as $data) {
        //     $data->update([]);
        // }

        foreach ($dataKelas as $data) {
            $data->update([
                'mentor_id' => Teacher::all()->random()->id
            ]);
        }

        foreach ($dataLesson as $data) {
            $data->update([
                'kelas_santri_id' => KelasSantri::all()->random()->id
            ]);
        }
        foreach ($dataAssessment as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'lesson_id' => Lesson::all()->random()->id
            ]);
        }

        foreach ($dataDepartement as $data) {
            $data->update([
                'leader_id' => User::all()->random()->id,
                'co_leader_id' => User::all()->random()->id,
            ]);
        }

        foreach ($dataAttendance as $data) {
            $data->update([
                'activity_id' => Activities::all()->random()->id,
                'santri_id' => User::all()->random()->id,
            ]);
        }

        foreach ($dataAttachmentSantri as $data) {
            $data->update([
                'santri_id' => User::all()->random()->id,
                'attachment_id' => Attachment::all()->random()->id,
            ]);
        }
    }
}
