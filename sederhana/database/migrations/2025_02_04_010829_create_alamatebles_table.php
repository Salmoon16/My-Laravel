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
        Schema::create('alamatebles', function (Blueprint $table) {
      $table->id();
      $table->foreignId('alamat_id')->constrained('alamats')->OnDelete('cascade');
      $table->foreignId('alamateble_id')->nullable();
      $table->string('alamateble_type');
      $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamatebles');
    }
};
