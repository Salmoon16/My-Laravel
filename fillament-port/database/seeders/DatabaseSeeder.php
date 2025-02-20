<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Activities;
use App\Models\Assessment;
use App\Models\Attachment;
use App\Models\AttachmentSantri;
use App\Models\Attendance;
use App\Models\Permission;
use App\Models\UserFamily;
use App\Models\Departement;
use App\Models\KelasSantri;
use App\Models\RaportSantri;
use App\Models\EducationStage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FinancialRecord;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataUser = User::factory(10)->create();
        $dataFamily = UserFamily::factory(10)->create();
        $dataKelas = KelasSantri::factory(10)->create();
        $dataLesson = Lesson::factory(10)->create();
        $dataAssessment = Assessment::factory(10)->create();
        $dataEducationStage = EducationStage::factory(10)->create();
        $dataRaportSantri = RaportSantri::factory(10)->create();
        $dataDepartement = Departement::factory(10)->create();
        $dataActivities = Activities::factory(10)->create();
        $dataAttendance = Attendance::factory(10)->create();
        $dataPermission = Permission::factory(10)->create();
        $dataFinancialRecord = FinancialRecord::factory(10)->create();
        $dataAttachment = Attachment::factory(10)->create();
        $dataAttachmentSantri = AttachmentSantri::factory(10)->create();
        $dataNews = News::factory(10)->create();

        foreach ($dataUser as $data) {
            $data->update([
                'kelas_santri_id'=>KelasSantri::,
                'department_id',
                'education_stage_id'
            ]);
        }

        foreach ($dataKelas as $data) {
            $data->update([
                'mentor_id'
            ]);
        }

        foreach ($dataLesson as $data) {
            $data->update([
                'kelas_santri_id'
            ]);
        }
        foreach ($dataAssessment as $data) {
            $data->update([
                'santri_id',
                'lesson_id'
            ]);
        }

        foreach ($dataRaportSantri as $data) {
            $data->update([
                'santri_id'
            ]);
        }

        foreach ($dataDepartement as $data) {
            $data->update([
                'leader_id',
                'co_leader_id'
            ]);
        }

        foreach ($dataAttendance as $data) {
            $data->update([
                'activity_id',
                'santri_id'
            ]);
        }

        foreach ($dataFinancialRecord as $data) {
            $data->update([
                'accounting_id'
            ]);
        }

        foreach ($dataAttachmentSantri as $data) {
            $data->update([
                'santri_id',
                'attachment_id',
            ]);
        }

        foreach ($dataNews as $data) {
            $data->update([
                'author_id',
            ]);
        }

    }
}
