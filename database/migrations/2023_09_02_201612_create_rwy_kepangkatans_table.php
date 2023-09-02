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
        Schema::create('rwy_kepangkatans', function (Blueprint $table) {
            $table->id();
            $table->uuid("riwayat_kepangkatan_id");
            $table->foreignId("ptk_id");
            $table->string("nomor_sk");
            $table->string("tanggal_sk");
            $table->string("tmt_pangkat");
            $table->string("masa_kerja_gol_tahun");
            $table->string("masa_kerja_gol_bulan");
            $table->string("pangkat_golongan_id_str");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rwy_kepangkatans');
    }
};
