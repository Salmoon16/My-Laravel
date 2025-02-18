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
        Schema::create('raport_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('users')->onDelete('cascade');
            $table->string('academic_year');
            $table->integer('overall_score');
            $table->text('strengths')->nullable();
            $table->text('weaknesses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raport_santris');
    }
};
