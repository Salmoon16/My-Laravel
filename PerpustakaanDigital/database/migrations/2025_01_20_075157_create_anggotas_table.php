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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->int('nomor_telpon');
            $table->string('foto_profil');
            $table->string('role');
            $table->foreignId('peminjaman_id')->references('id')->on('peminjamans')->onDelete('cascade');
            $table->foreignId('ulasan_id')->references('id')->on('ulasans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
