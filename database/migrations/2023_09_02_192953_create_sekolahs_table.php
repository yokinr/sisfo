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
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->uuid("sekolah_id");
            $table->string("nama");
            $table->string("nss");
            $table->string("npsn");
            $table->string("bentuk_pendidikan_id");
            $table->string("bentuk_pendidikan_id_str");
            $table->string("status_sekolah");
            $table->string("status_sekolah_str");
            $table->string("alamat_jalan");
            $table->string("rt");
            $table->string("rw");
            $table->string("kode_wilayah");
            $table->string("kode_pos");
            $table->string("nomor_telepon");
            $table->string("nomor_fax");
            $table->string("email");
            $table->string("website");
            $table->string("is_sks");
            $table->string("lintang");
            $table->string("bujur");
            $table->string("dusun");
            $table->string("desa_kelurahan");
            $table->string("kecamatan");
            $table->string("kabupaten_kota");
            $table->string("provinsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
