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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
