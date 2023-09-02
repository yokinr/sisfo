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
        Schema::create('get_pesertadidiks', function (Blueprint $table) {
            $table->id();
            $table->string("registrasi_id");
            $table->string("jenis_pendaftaran_id");
            $table->string("jenis_pendaftaran_id_str");
            $table->string("nipd")->nullable();
            $table->string("tanggal_masuk_sekolah");
            $table->string("sekolah_asal")->nullable();
            $table->foreignId("peserta_didik_id");
            $table->string("nama")->nullable();
            $table->string("nisn")->nullable();
            $table->string("jenis_kelamin");
            $table->string("nik")->nullable();
            $table->string("tempat_lahir");
            $table->string("tanggal_lahir");
            $table->string("agama_id");
            $table->string("agama_id_str");
            $table->string("alamat_jalan")->nullable();
            $table->string("nomor_telepon_rumah")->nullable();
            $table->string("nomor_telepon_seluler")->nullable();
            $table->string("nama_ayah")->nullable();
            $table->string("pekerjaan_ayah_id")->nullable();
            $table->string("pekerjaan_ayah_id_str")->nullable();
            $table->string("nama_ibu")->nullable();
            $table->string("pekerjaan_ibu_id")->nullable();
            $table->string("pekerjaan_ibu_id_str")->nullable();
            $table->string("nama_wali")->nullable();
            $table->string("pekerjaan_wali_id")->nullable();
            $table->string("pekerjaan_wali_id_str")->nullable();
            $table->string("anak_keberapa")->nullable();
            $table->string("tinggi_badan")->nullable();
            $table->string("berat_badan")->nullable();
            $table->string("email")->nullable();
            $table->string("semester_id");
            $table->foreignId("anggota_rombel_id");
            $table->foreignId("rombongan_belajar_id");
            $table->string("tingkat_pendidikan_id");
            $table->string("nama_rombel");
            $table->string("kurikulum_id");
            $table->string("kurikulum_id_str");
            $table->string("kebutuhan_khusus")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_pesertadidiks');
    }
};
