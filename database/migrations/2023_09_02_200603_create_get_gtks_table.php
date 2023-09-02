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
        Schema::create('get_gtks', function (Blueprint $table) {
            $table->id();
            $table->string("tahun_ajaran_id");
            $table->string("ptk_terdaftar_id");
            $table->uuid("ptk_id");
            $table->string("ptk_induk");
            $table->string("tanggal_surat_tugas");
            $table->string("nama");
            $table->string("jenis_kelamin");
            $table->string("tempat_lahir");
            $table->string("tanggal_lahir");
            $table->string("agama_id");
            $table->string("agama_id_str");
            $table->string("nuptk")->nullable();
            $table->string("nik")->nullable();
            $table->string("jenis_ptk_id");
            $table->string("jenis_ptk_id_str");
            $table->string("status_kepegawaian_id");
            $table->string("status_kepegawaian_id_str");
            $table->string("nip")->nullable();
            $table->string("pendidikan_terakhir");
            $table->string("bidang_studi_terakhir");
            $table->string("pangkat_golongan_terakhir");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_gtks');
    }
};
