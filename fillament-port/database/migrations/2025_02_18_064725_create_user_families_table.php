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
        Schema::create('user_families', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_job')->nullable();
            $table->date('father_birth')->nullable();
            $table->string('father_phone', 20)->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_job')->nullable();
            $table->date('mother_birth')->nullable();
            $table->string('mother_phone', 20)->nullable();
            // $table->morphs('familiable');
            $table->string('familiable_id')->nullable();
            $table->string('familiable_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_families');
    }
};
