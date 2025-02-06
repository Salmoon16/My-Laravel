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
        Schema::create('alamatables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alamat_id')->references('id')->on('alamats')->onDelete('cascade');
            $table->foreignId('alamatable_id')->nullable();
            $table->string('alamatable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamatables');
    }
};
