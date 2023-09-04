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
        Schema::create('pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->uuid("pembelajaran_id");
            $table->foreignId('rombongan_belajar_id');
            $table->string("mata_pelajaran_id");
            $table->string("mata_pelajaran_id_str");
            $table->foreignId("ptk_terdaftar_id");
            $table->foreignId("ptk_id");
            $table->string("nama_mata_pelajaran");
            $table->string("induk_pembelajaran_id")->nullable();
            $table->string("jam_mengajar_per_minggu");
            $table->string("status_di_kurikulum");
            $table->string("status_di_kurikulum_str");
            $table->integer('semester_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelajarans');
    }
};
