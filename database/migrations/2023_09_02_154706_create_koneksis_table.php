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
        Schema::create('koneksis', function (Blueprint $table) {
            $table->id();
            $table->uuid('koneksi_id')->unique();
            $table->string('host');
            $table->string('token');
            $table->string('npsn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koneksis');
    }
};
