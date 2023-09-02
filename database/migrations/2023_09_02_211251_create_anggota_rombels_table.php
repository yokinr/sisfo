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
        Schema::create('anggota_rombels', function (Blueprint $table) {
            $table->id();
            $table->uuid("anggota_rombel_id");
            $table->foreignId("rombongan_belajar_id");
            $table->string("peserta_didik_id");
            $table->string("jenis_pendaftaran_id");
            $table->string("jenis_pendaftaran_id_str");
            $table->integer('semester_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_rombels');
    }
};
