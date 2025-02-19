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
            $table->foreign('class_id')->after('id')->reference('id')->on('kelas_santris')->onDelete('cascade');
            $table->foreign('departement_id')->after('class_id')->reference('id')->on('departements')->onDelete('cascade');
            $table->foreign('education_stage_id')->after('departement_id')->reference('id')->on('education_stages')->onDelete('cascade');
        });

        Schema::table('user_families', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('kelas_santris', function (Blueprint $table) {
            $table->foreign('mentor_id')->after('major')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->foreign('kelas_santri_id')->after('id')->reference('id')->on('kelas_santris')->onDelete('cascade');
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->after('santri_id')->reference('id')->on('lessons')->onDelete('cascade');
        });

        Schema::table('raport_santris', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('departements', function (Blueprint $table) {
            $table->foreign('leader_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
            $table->foreign('co_leader_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
            $table->foreign('activity_id')->after('santri_id')->reference('id')->on('activities')->onDelete('cascade');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('financial_records', function (Blueprint $table) {
            $table->foreign('accounting_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
        });

        Schema::table('attachment_santris', function (Blueprint $table) {
            $table->foreign('santri_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
            $table->foreign('attachment_id')->after('santri_id')->reference('id')->on('attachments')->onDelete('cascade');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('author_id')->after('id')->reference('id')->on('users')->onDelete('cascade');
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
