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
        Schema::create('santriebles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained()->OnDelete('cascade');
            $table->foreignId('santrieble_id');
            $table->string('santrieble_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santriebles');
    }
};
