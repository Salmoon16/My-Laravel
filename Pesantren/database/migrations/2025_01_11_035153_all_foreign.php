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
        Schema::table("kotas", function (Blueprint $table) {
            $table->foreignId("negara_id")->after("id")->references("id")->on("negaras")->onDelete("cascade");
        });
        Schema::table("pesantrens", function (Blueprint $table) {
            $table->foreignId("kota_id")->after("id")->references("id")->on("kotas")->onDelete("cascade");
        });
        Schema::table("users", function (Blueprint $table) {
            $table->foreignId("pesantren_id")->after("id")->references("id")->on("pesantrens")->onDelete("cascade");
            $table->foreignId("kota_id")->after("pesantren_id")->references("id")->on("kotas")->onDelete("cascade");
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
