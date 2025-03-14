<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('kelas_santri_id')->after('id')->references('id')->on('kelas_santris')->onDelete('set null');
            $table->foreign('department_id')->after('kelas_santri_id')->references('id')->on('departements')->onDelete('set null');
            $table->foreign('education_stage_id')->after('department_id')->references('id')->on('education_stages')->onDelete('set null');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('kelas_santri_id')->after('id')->references('id')->on('kelas_santris')->onDelete('set null');
        });

        Schema::table('kelas_santris', function (Blueprint $table) {
            $table->foreign('mentor_id')->after('id')->references('id')->on('teachers')->onDelete('set null');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('kelas_santri_id')->after('id')->references('id')->on('kelas_santris')->onDelete('cascade');
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('lesson_id')->after('santri_id')->references('id')->on('lessons')->onDelete('set null');
        });

        Schema::table('departements', function (Blueprint $table) {
            $table->foreign('leader_id')->after('id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('co_leader_id')->after('id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('activity_id')->after('santri_id')->references('id')->on('activities')->onDelete('cascade');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('attachment_santris', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('attachment_id')->after('santri_id')->references('id')->on('attachments')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
